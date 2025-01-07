<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SectionController extends Controller
{
    public function index()
    {
        $sections = DB::table('course_sections')->paginate(10);
        return Inertia::render('Admin/CourseSection/Index', ['sections' => $sections]);
    }
    public function tambah()
    {
        return Inertia::render('Admin/CourseSection/Create');
    }
    public function submit(Request $request)
    {
        $name            = $request->name;

        try {
            $data = [
                'section'           => $name,
            ];
            $simpan     = DB::table('course_sections')->insert($data);
            if ($simpan) {
                return redirect('/section')->with('Success', 'Data User berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahsection')->with('danger', 'Data User gagal disimpan.');
        }
    }
    public function delete($id)
    {
        DB::table('course_sections')->where('id', $id)->delete();
        return redirect('/section')->with('success', 'Data courses berhasil dihapus.');
    }
    public function edit($id)
    {
        // Ambil data kategori berdasarkan id
        $section = DB::table('course_sections')->where('id', $id)->first();

        // Tampilkan form edit dengan data yang ada
        return Inertia::render('Admin/CourseSection/Edit', ['section' => $section]);
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
                'section' => $name,
            ];

            DB::table('course_sections')->where('id', $id)->update($data);

            return redirect('/section')->with('success', 'Data kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect('/edit/' . $id)->with('danger', 'Data kategori gagal diperbarui.');
        }
    }
}
