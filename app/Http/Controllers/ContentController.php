<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\course_category;
use App\Models\course_section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $data = array(
            'content' => DB::table('course_contents')
                ->join('courses', 'course_contents.course_id', '=', 'courses.id')
                ->join('course_categories', 'course_contents.course_category_id', '=', 'course_categories.id')
                ->join('course_sections', 'course_contents.section_id', '=', 'course_sections.id')
                ->select(
                    'course_contents.*',
                    'courses.title as course_title',
                    'course_categories.category_name as category_name',
                    'course_sections.section as section'
                )
                ->get(),
        );
        return view('admin.content.index', $data);
    }
    public function tambah()
    {
        $data = [
            'courses' => DB::table('courses')->get(),
            'course_categories' => DB::table('course_categories')->get(),
            'course_sections' => DB::table('course_sections')->get(),
        ];
        return view('admin.content.tambah', $data);
    }

    public function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|exists:courses,id',
            'kategori' => 'required|exists:course_categories,id',
            'section' => 'required|exists:course_sections,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'durasi' => 'required|integer|min:1',
        ]);

        try {
            // Menyimpan data ke database
            $data = [
                'course_id' => $request->judul,
                'course_category_id' => $request->kategori,
                'section_id' => $request->section,
                'title' => $request->title,
                'url' => $request->url,
                'duration' => $request->durasi,
            ];
            $simpan = DB::table('course_contents')->insert($data);

            if ($simpan) {
                return redirect()->route('content')->with('success', 'Content berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('tambahcontent')->with('danger', 'Data gagal disimpan: ' . $e->getMessage());
        }
    }
}
