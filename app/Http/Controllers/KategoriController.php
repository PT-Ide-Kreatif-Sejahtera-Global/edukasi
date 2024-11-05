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
}
