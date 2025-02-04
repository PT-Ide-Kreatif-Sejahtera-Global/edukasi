<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\cupon;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment()
    {
        // Join the necessary tables: users, courses, and coupons
        $payments = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->leftJoin('cupons', 'enrollments.coupon_id', '=', 'cupons.id')  // Use left join in case some payments don't have a coupon
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
            ->first();

        if ($existingEnrollment) {
            return redirect()->route('paymentCourse', ['id' => $existingEnrollment->course_id]);
        }

        $course = course::findOrFail($id);
        $coupons = Cupon::all();
        return view('customer.payment.index', compact('course', 'coupons'));
    }

    public function submit(Request $request, $id)
    {
        // Validasi metode pembayaran
        // $request->validate([
        //     'payment_method' => 'required',
        // ]);

        // Ambil kursus berdasarkan ID
        $course = Course::findOrFail($id);
        $discountAmount = 0;
        $couponId = null;
        $udemyCoupon = 0;

        // Periksa apakah kupon disertakan
        if ($request->filled('coupon_id')) {
            $coupon = Cupon::find($request->id);

            // Terapkan kupon jika ada
            if ($coupon) {
                $couponId = $coupon->id;
                $udemyCoupon = 1;

                // Hitung diskon berdasarkan tipe
                if ($coupon->discount_type === 'percentage') {
                    $discountAmount = ($course->price * $coupon->discount_value) / 100;
                } else if ($coupon->discount_type === 'nominal') {
                    $discountAmount = $coupon->discount_value;
                }
            }
        }

        // Hitung harga total setelah diskon
        $totalPrice = max(round($course->price - $discountAmount), 0);

        // Simpan data pendaftaran
        $enrollment = Enrollments::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'coupon_id' => $couponId,
            'enrollment_date' => now(),
            'payment_status' => 'pending',
            'discount_amount' => $discountAmount,
            'total_price' => $totalPrice,
            'udemy_coupon' => $udemyCoupon,
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalPrice
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $enrollment->snap_token = $snapToken;

        $enrollment->save();
        
        // Proses pembayaran (simulasikan berhasil untuk sekarang)
        $paymentSuccess = true;

        if ($paymentSuccess) {
            return redirect()->route('paymentCourse', ['id' => $course->id])
                ->with('success', 'Pembayaran berhasil, akses materi telah dibuka.');
        }

        // Jika pembayaran gagal, redirect kembali dengan pesan error
        return back()->with('error', 'Pembayaran gagal, silakan coba lagi.');
    }

    public function paymentlist()
    {
        $payments = Enrollments::where('user_id', auth()->id())->get();
        return view('customer.payment.paymentList', compact('payments'));
    }

    public function paymentCourse($id)
    {
        $course = Enrollments::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->with('course') // Ambil data courses juga
        ->get();

        return view('customer.payment.payment', compact('course'));

    }

    public function paymentSuccess($id)
    {
        $enrollment = Enrollments::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->firstOrFail();

        // Update payment status to success
        $enrollment->payment_status = 'success';
        $enrollment->save();

        return redirect()->route('detail', ['id' => $enrollment->course_id])
            ->with('success', 'Pembayaran berhasil, akses materi telah dibuka.');
    }
}
