<?php

namespace App\Http\Controllers;

use App\Models\cupon;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Cupon::all(); // Mengambil semua data kupon dari database
        return view('admin.coupon.index', compact('coupons'));
    }
    public function tambah()
    {
        return view('admin.coupon.tambah'); // Halaman form tambah coupon
    }

    public function submit(Request $request)
    {
        $cupon_code = $request->cupon_code;
        $description = $request->description;
        $discount_type = $request->discount_type;
        $discount_value = $request->discount_value;
        $valid_form = $request->valid_form;
        $valid_until = $request->valid_until;
        $usage_limit = $request->usage_limit;
        $total_usage = $request->total_usage;

        // if ($request->hasFile('foto')) {
        //     $foto = $cupon_code . '.' . $request->file('foto')->getClientOriginalExtension();
        // } else {
        //     $foto = null;
        // }

        try {
            $data = [
                'cupon_code' => $cupon_code,
                'description' => $description,
                'discount_type' => $discount_type,
                'discount_value' => $discount_value,
                'valid_form' => $valid_form,
                'valid_until' => $valid_until,
                'usage_limit' => $usage_limit,
                'total_usage' => $total_usage,
                // 'foto' => $foto,
            ];
            $simpan = DB::table('cupons')->insert($data);
            if ($simpan) {
                // if ($request->hasFile('foto')) {
                //     $folderPath = "public/menu/";
                //     $request->file('foto')->storeAs($folderPath, $foto);
                // }
                return redirect('/coupon')->with('success', 'Data coupon berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahcoupon')->with('danger', 'Data coupon gagal disimpan.');
        }
    }

    public function edit($id)
    {
        $coupon = DB::table('cupons')->find($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cupon_code' => 'required|string|max:250',
            'description' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
            'valid_form' => 'required|date',
            'valid_until' => 'required|date',
            'usage_limit' => 'required|integer',
            'total_usage' => 'required|integer',
        ]);

        $data = [
            'cupon_code' => $request->cupon_code,
            'description' => $request->description,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'valid_form' => $request->valid_form,
            'valid_until' => $request->valid_until,
            'usage_limit' => $request->usage_limit,
            'total_usage' => $request->total_usage,
        ];

        try {
            DB::table('cupons')->where('id', $id)->update($data);
            return redirect('/coupon')->with('success', 'Data coupon berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Data coupon gagal diupdate: ' . $e->getMessage());
        }
    }
}
