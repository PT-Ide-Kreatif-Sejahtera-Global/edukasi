<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\cupon;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\CoreApi;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function payment()
    {
        // Join the necessary tables: users, courses, and coupons
        $payments = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->leftJoin('cupons', 'enrollments.coupon_id', '=', 'cupons.id')
            ->select(
                'enrollments.*', 
                'users.name as user_name', 
                'courses.title as course_title', 
                'cupons.cupon_code as coupon_code', 
                'enrollments.enrollment_date', 
                'enrollments.discount_amount', 
                'enrollments.total_price'
            )
            ->get();

        // Pass the payments to the view
        return view('admin.pembayaran.index', compact('payments'));
    }
    
    public function index($id)
    {
        // Cek apakah user sudah terdaftar di kursus ini
        $existingEnrollment = Enrollments::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->where('payment_status', 'pending')
            ->first();

        // dd($existingEnrollment);

        if ($existingEnrollment) {
            return redirect()->route('paymentCourse', ['order_id' => $existingEnrollment->order_id]);
        }

        $course = course::findOrFail($id);
        $coupons = Cupon::all();
        return view('customer.payment.index', compact('course', 'coupons'));
    }

    public function submit(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $discountAmount = 0;
        $couponId = null;
        $udemyCoupon = 0;

        // Gunakan UUID agar order_id unik
        $orderId = 'ORDER-' . Str::uuid();

        DB::beginTransaction(); // Mulai transaksi database

        try {
            // Periksa apakah kupon disertakan
            if ($request->filled('coupon_id')) {
                $coupon = Cupon::find($request->coupon_id);
                if ($coupon) {
                    $couponId = $coupon->id;
                    $udemyCoupon = 1;
                    $discountAmount = ($coupon->discount_type === 'percentage')
                        ? ($course->price * $coupon->discount_value) / 100
                        : $coupon->discount_value;

                    // Update total_usage kupon
                    $coupon->increment('total_usage');
                    $coupon->decrement('usage_limit');

                }
            }

            // Hitung harga total setelah diskon
            $totalPrice = max(round($course->price - $discountAmount), 0);

            // Simpan data pendaftaran
            $enrollment = Enrollments::create([
                'user_id' => auth()->id(),
                'order_id' => $orderId,
                'course_id' => $course->id,
                'coupon_id' => $couponId,
                'enrollment_date' => now(),
                'payment_status' => 'pending',
                'discount_amount' => $discountAmount,
                'total_price' => $totalPrice,
                'udemy_coupon' => $udemyCoupon,
            ]);

            // Set konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            // Gunakan CoreAPI charge agar transaksi langsung masuk ke dashboard Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $totalPrice
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                ]
            ];

            $snapToken = Snap::getSnapToken($params);
            $enrollment->snap_token = $snapToken;
            $enrollment->save();

            DB::commit(); // Commit transaksi jika tidak ada error

            return redirect()->route('paymentCourse', ['id' => $course->id])
                ->with('success', 'Silakan lakukan pembayaran melalui Midtrans.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika ada error
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }


    public function paymentlist()
    {
        $payments = Enrollments::where('user_id', auth()->id())->get();
        return view('customer.payment.paymentList', compact('payments'));
    }

    public function paymentCourse($order_id)
    {
        $enrollment = Enrollments::where('user_id', auth()->id())
            ->where('order_id', $order_id)
            ->with('course') 
        ->get();

        return view('customer.payment.payment', compact('enrollment'));

    }

    public function paymentSuccess($order_id)
    {
        $enrollment = Enrollments::where('user_id', auth()->id())
            ->where('order_id', $order_id)
            ->firstOrFail();

        // Update payment status to success
        $enrollment->payment_status = 'success';
        $enrollment->save();

        return redirect()->route('detail', ['id' => $enrollment->course_id])
            ->with('success', 'Pembayaran berhasil, akses materi telah dibuka.');
    }

    public function cancelPayment($order_id)
    {
        $payment = Enrollments::where('order_id', $order_id)->firstOrFail();

        if ($payment->payment_status == 'pending') {
            // Set Midtrans server key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = false;

            try {
                $response = \Midtrans\Transaction::cancel($payment->order_id);

                // Jika berhasil dibatalkan, update status di database
                if ($response->status_code == 200 || $response->status_code == 412) {
                    $payment->update(['payment_status' => 'canceled']);
                    return back()->with('success', 'Payment has been canceled.');
                }
            } catch (\Exception $e) {
                $payment->update(['payment_status' => 'canceled']);
                return back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
        return back()->with('error', 'Payment cannot be canceled.');
    }
}
