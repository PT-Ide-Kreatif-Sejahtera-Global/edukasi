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
            'coupon_code' => 'required|string|max:255|unique:cupons,coupon_code', // Memastikan kode kupon unik
            'description' => 'required|string|max:500',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric|min:0',
            'valid_form' => 'required|date',
            'valid_until' => 'required|date|after:valid_form',
            'usage_limit' => 'required|integer|min:1',
            'total_usage' => 'required|integer|min:0',
        ]);

        try {
            // Data yang akan disimpan ke database
            $data = [
                'coupon_code' => $request->coupon_code,
                'description' => $request->description,
                'discount_type' => $request->discount_type,
                'discount_value' => $request->discount_value,
                'valid_form' => $request->valid_form,
                'valid_until' => $request->valid_until,
                'usage_limit' => $request->usage_limit,
                'total_usage' => $request->total_usage,
            ];

            // Menyimpan data kupon baru ke tabel 'cupons'
            $simpan = DB::table('cupons')->insert($data);

            // Cek jika data berhasil disimpan
            if ($simpan) {
                return redirect()->route('coupon')->with('success', 'Kupon berhasil ditambahkan.');
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan, tampilkan pesan error
            return redirect()->route('tambahcoupon')->with('danger', 'Data gagal disimpan: ' . $e->getMessage());
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
