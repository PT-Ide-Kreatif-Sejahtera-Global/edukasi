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
        // Validasi input dari user
        $request->validate([
            'judul' => 'required|exists:courses,id',
            'kategori' => 'required|exists:course_categories,id',
            'section' => 'required|exists:course_sections,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'durasi' => 'required|integer|min:1',
        ]);

        try {
            // Data yang akan disimpan ke database
            $data = [
                'course_id' => $request->judul,
                'course_category_id' => $request->kategori,
                'section_id' => $request->section,
                'title' => $request->title,
                'url' => $request->url,
                'duration' => $request->durasi,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Menyimpan data konten baru ke tabel 'contents'
            DB::table('course_contents')->insert($data);

            // Redirect ke halaman content jika berhasil
            return redirect()->route('content')->with('success', 'Konten berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan, tampilkan pesan error
            return redirect()->route('tambahcontent')->with('danger', 'Data gagal disimpan: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        DB::table('course_contents')->where('id', $id)->delete();
        return redirect('/content')->with('success', 'Data courses berhasil dihapus.');
    }
    
    public function edit($id)
    {
        // Ambil data content berdasarkan id
        $content = DB::table('course_contents')->where('id', $id)->first();

        // Ambil data lainnya (courses, categories, sections) untuk dropdown
        $courses = DB::table('courses')->get();
        $categories = DB::table('course_categories')->get();
        $sections = DB::table('course_sections')->get();

        // Tampilkan form edit dengan data yang ada
        return view('admin.content.edit', compact('content', 'courses', 'categories', 'sections'));
    }

    public function update(Request $request, $id)
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
            // Update data di database
            $data = [
                'course_id' => $request->judul,
                'course_category_id' => $request->kategori,
                'section_id' => $request->section,
                'title' => $request->title,
                'url' => $request->url,
                'duration' => $request->durasi,
            ];

            DB::table('course_contents')->where('id', $id)->update($data);

            return redirect()->route('content')->with('success', 'Content berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('editcontent', ['id' => $id])->with('danger', 'Data gagal diperbarui: ' . $e->getMessage());
        }
    }
}
