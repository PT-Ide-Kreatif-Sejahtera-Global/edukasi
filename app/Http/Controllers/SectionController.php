<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $data = array(
            'sections' => DB::table('course_sections')
                ->get(),
        );
        return view('admin.sections.index', $data);
    }
    public function tambah()
    {
        $data = array(
            'users' => DB::table('course_sections')
                ->get(),
        );
        return view('admin.sections.tambah', $data);
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
                'section'           => $name,
            ];
            $simpan     = DB::table('course_sections')->insert($data);
            if ($simpan) {
                // if ($request->hasFile('foto')) {
                //     $folderPath = "public/users";
                //     $request->file('foto')->storeAs($folderPath, $foto);
                // }
                return redirect('/section')->with('Success', 'Data User berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahsection')->with('danger', 'Data User gagal disimpan.');
        }
    }
}
