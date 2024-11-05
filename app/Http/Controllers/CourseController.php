<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\course_category;
use App\Models\course_contents;
use App\Models\course_section;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $data = [
            'courses' => DB::table('courses')
                ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
                ->join('users', 'instructors.user_id', '=', 'users.id') // join untuk mendapatkan nama user
                ->select(
                    'courses.*',
                    'users.name as instructor_name', // mengambil nama dari tabel users
                )
                ->get(),
        ];

        return view('admin.course.index', $data);
    }

    public function tambah()
    {
        $data = array(
            'courses' => DB::table('courses')
                ->get(),
            'instructors' => DB::table('instructors')
                ->join('users', 'instructors.user_id', '=', 'users.id')
                ->select('instructors.id', 'users.name as instructor_name')
                ->get(),
        );

        return view('admin.course.tambah', $data);
    }

    // Menyimpan kursus baru (Admin atau Instruktur)
    public function submit(Request $request)
    {
        $instructor_id = $request->instructor_id;
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $total_price = $request->total_price;
        $is_locked = $request->is_locked; // Menangkap nilai is_locked

        try {
            $data = [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked, // Menyimpan nilai is_locked
            ];
            $simpan = DB::table('courses')->insert($data);
            if ($simpan) {
                return redirect('/course')->with('success', 'Data course berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahcourse')->with('danger', 'Data course gagal disimpan: ' . $e->getMessage());
        }
    }



    // Method untuk menampilkan detail kursus
    public function show($id)
    {
        $course = Course::with('instructor', 'category', 'sections', 'registrations')
            ->findOrFail($id);
        return view('course.show', compact('course'));
    }

    // Method untuk menampilkan form edit kursus (hanya untuk Admin dan Instruktur)
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = course_category::all();

        if (Auth::user()->role == 'Admin' || (Auth::user()->role == 'Instructor' && $course->instructor_id == Auth::id())) {
            return view('course.edit', compact('course', 'categories'));
        }

        return redirect()->route('course.index');
    }

    // Menyimpan perubahan kursus yang di-edit (Admin atau Instruktur)
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:course_categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|string',
        ]);

        $course->update($request->only(['name', 'category_id', 'description', 'price', 'duration']));

        return redirect()->route('course.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    // Menghapus kursus (hanya untuk Admin)
    public function delete($id)
    {
        if (Auth::user()->role == 'Admin') {
            $course = Course::findOrFail($id);
            $course->delete();
            return redirect()->route('course.index')->with('success', 'Kursus berhasil dihapus.');
        }
        return redirect()->route('course.index');
    }
}
