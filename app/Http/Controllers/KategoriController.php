<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data = array(
            'pembeli' => DB::table('course_categories')
                ->get(),
        );
        return view('admin.kategori.index', $data);
    }
    public function tambah()
    {
        $data = array(
            'users' => DB::table('course_categories')
                ->get(),
        );
        return view('admin.kategori.tambah', $data);
    }
    public function submit(Request $request)
    {
        $name            = $request->name;
        // if ($request->hasFile('foto')) {
        //     $foto       = $name . "." . $request->file('foto')->getClientOriginalExtension();
        // } else {
        //     $foto       = null;
        // }

        try {
            $data = [
                'category_name'           => $name,
            ];
            $simpan     = DB::table('course_categories')->insert($data);
            if ($simpan) {
                // if ($request->hasFile('foto')) {
                //     $folderPath = "public/users";
                //     $request->file('foto')->storeAs($folderPath, $foto);
                // }
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
        $kategori = DB::table('course_categories')->where('id', $id)->first();

        // Tampilkan form edit dengan data yang ada
        return view('admin.kategori.edit', compact('kategori'));
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
