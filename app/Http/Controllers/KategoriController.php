<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = DB::table('course_categories')->paginate(10);
        return Inertia::render('Admin/CourseCategory/Index', ['categories' => $categories]);
    }
    public function tambah()
    {
        return Inertia::render('Admin/CourseCategory/Create');
    }
    public function submit(Request $request)
    {
        $name            = $request->name;
        try {
            $data = [
                'category_name'           => $name,
            ];
            $simpan     = DB::table('course_categories')->insert($data);
            if ($simpan) {
                return redirect('/kategori')->with('Success', 'Data User berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambah')->with('danger', 'Data User gagal disimpan.');
        }
    }
    public function delete($id)
    {
        DB::table('course_categories')->where('id', $id)->delete();
        return redirect('/kategori')->with('success', 'Data course berhasil dihapus.');
    }
    public function edit($id)
    {
        // Ambil data kategori berdasarkan id
        $category = DB::table('course_categories')->where('id', $id)->first();

        // Tampilkan form edit dengan data yang ada
        return Inertia::render('Admin/CourseCategory/Index', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;

        try {
            // Update data di database
            $data = [
                'category_name' => $name,
            ];

            DB::table('course_categories')->where('id', $id)->update($data);

            return redirect('/kategori')->with('success', 'Data kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect('/edit/' . $id)->with('danger', 'Data kategori gagal diperbarui.');
        }
    }
}
