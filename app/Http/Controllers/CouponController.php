<?php

namespace App\Http\Controllers;

use App\Models\cupon;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = DB::table('cupons')->paginate(10);
        return Inertia::render('Admin/Coupon/Index', ['coupons' => $coupons]);
    }
    public function tambah()
    {
        return Inertia::render('Admin/Coupon/Create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'cupon_code' => 'required|string|max:255|unique:cupons,cupon_code',
            'description' => 'required|string|max:500',
            'discount_type' => 'required|in:percentage,flat', // Assuming discount types are 'percentage' or 'flat'
            'discount_value' => 'required|numeric|min:0|max:100', // Ensure discount value is a positive number and does not exceed 100
            'valid_form' => 'required|date|after_or_equal:today', // Valid from today or later
            'valid_until' => 'required|date|after:valid_form', // Valid until after valid_from
            'usage_limit' => 'nullable|integer|min:0', // Optional, but if provided, must be a non-negative integer
            'total_usage' => 'nullable|integer|min:0', // Optional, but if provided, must be a non-negative integer
        ], [
            'cupon_code.required' => 'Kode kupon harus diisi.',
            'cupon_code.string' => 'Kode kupon harus berupa teks.',
            'cupon_code.max' => 'Kode kupon tidak boleh lebih dari 255 karakter.',
            'cupon_code.unique' => 'Kode kupon ini sudah terdaftar.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'discount_type.required' => 'Tipe diskon harus dipilih.',
            'discount_type.in' => 'Tipe diskon tidak valid.',
            'discount_value.required' => 'Nilai diskon harus diisi.',
            'discount_value.numeric' => 'Nilai diskon harus berupa angka.',
            'discount_value.min' => 'Nilai diskon tidak boleh negatif.',
            'discount_value.max' => 'Nilai diskon tidak boleh lebih dari 100.', // Custom error message for max value
            'valid_form.required' => 'Tanggal mulai berlaku harus diisi.',
            'valid_form.date' => 'Tanggal mulai berlaku tidak valid.',
            'valid_form.after_or_equal' => 'Tanggal mulai berlaku harus hari ini atau setelahnya.',
            'valid_until.required' => 'Tanggal berakhir harus diisi.',
            'valid_until.date' => 'Tanggal berakhir tidak valid.',
            'valid_until.after' => 'Tanggal berakhir harus setelah tanggal mulai berlaku.',
            'usage_limit.integer' => 'Batas penggunaan harus berupa angka.',
            'usage_limit.min' => 'Batas penggunaan tidak boleh negatif.',
            'total_usage.integer' => 'Total penggunaan harus berupa angka.',
            'total_usage.min' => 'Total penggunaan tidak boleh negatif.',
        ]);

        try {
            $data = [
                'cupon_code' => $request->cupon_code,
                'description' => $request->description,
                'discount_type' => $request->discount_type,
                'discount_value' => $request->discount_value,
                'valid_form' => $request->valid_form,
                'valid_until' => $request->valid_until,
                'usage_limit' => $request->usage_limit,
                'total_usage' => $request->total_usage ?? 0, // Default to 0 if not provided
            ];

            $simpan = DB::table('cupons')->insert($data); // Ensure the table name is correct
            if ($simpan) {
                return redirect('/coupon')->with('success', 'Data coupon berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahcoupon')->with('danger', 'Data coupon gagal disimpan: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $coupon = DB::table('cupons')->find($id);
        return Inertia::render('Admin/Coupon/Edit', ['coupon' => $coupon]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cupon_code' => 'required|string|max:250|unique:cupons,cupon_code,' . $id, // Ensure uniqueness, ignoring the current coupon
            'description' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric|min:0|max:100', // Ensure discount value is a positive number and does not exceed 100
            'valid_form' => 'required|date|after_or_equal:today', // Valid from today or later
            'valid_until' => 'required|date|after:valid_form', // Valid until after valid_from
            'usage_limit' => 'required|integer|min:0', // Optional, but if provided, must be a non-negative integer
            'total_usage' => 'required|integer|min:0', // Optional, but if provided, must be a non-negative integer
        ], [
            'cupon_code.required' => 'Kode kupon harus diisi.',
            'cupon_code.string' => 'Kode kupon harus berupa teks.',
            'cupon_code.max' => 'Kode kupon tidak boleh lebih dari 250 karakter.',
            'cupon_code.unique' => 'Kode kupon ini sudah terdaftar.', // Custom error message for uniqueness
            'description.required' => 'Deskripsi harus diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',
            'discount_type.required' => 'Tipe diskon harus dipilih.',
            'discount_type.in' => 'Tipe diskon tidak valid.',
            'discount_value.required' => 'Nilai diskon harus diisi.',
            'discount_value.numeric' => 'Nilai diskon harus berupa angka.',
            'discount_value.min' => 'Nilai diskon tidak boleh negatif.',
            'discount_value.max' => 'Nilai diskon tidak boleh lebih dari 100.', // Custom error message for max value
            'valid_form.required' => 'Tanggal mulai berlaku harus diisi.',
            'valid_form.date' => 'Tanggal mulai berlaku tidak valid.',
            'valid_form.after_or_equal' => 'Tanggal mulai berlaku harus hari ini atau setelahnya.',
            'valid_until.required' => 'Tanggal berakhir harus diisi.',
            'valid_until.date' => 'Tanggal berakhir tidak valid.',
            'valid_until.after' => 'Tanggal berakhir harus setelah tanggal mulai berlaku.',
            'usage_limit.required' => 'Batas penggunaan harus diisi.',
            'usage_limit.integer' => 'Batas penggunaan harus berupa angka.',
            'usage_limit.min' => 'Batas penggunaan tidak boleh negatif.',
            'total_usage.required' => 'Total penggunaan harus diisi.',
            'total_usage.integer' => 'Total penggunaan harus berupa angka.',
            'total_usage.min' => 'Total penggunaan tidak boleh negatif.',
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
            DB::table('cupons')->where('id', $id)->update($data); // Ensure the table name is correct
            return redirect('/coupon')->with('success', 'Data coupon berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Data coupon gagal diupdate: ' . $e->getMessage());
        }
    }
}
