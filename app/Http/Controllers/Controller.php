<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\discuss;
use App\Models\discuss_comment;
use App\Models\Enrollments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function welcome()
    {
        // Fetch all teachers from the database
        $teachers = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.bio', 'users.name', 'users.foto')
            ->get();
        $courses = Course::with('instructor.user')->get();

        // Return the welcome view with the teachers data
        return view('welcome', compact('teachers', 'courses')); // Assuming your welcome view is named 'welcome.blade.php'
    }
    //detail course
    public function detail($id)
    {
        $course = Course::with(['contents.category', 'instructor.user', 'contents.section', 'discuss.user'])->findOrFail($id);

        $discussComments = Discuss::where('course_id', $id)->get();

        // Cek apakah user telah mendaftar pada course ini
        $enrollment = Enrollments::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        // Status apakah course ini terkunci untuk user yang belum membeli
        $isLocked = !$enrollment;

        return view('customer.course.index', compact('course', 'isLocked', 'discussComments'));
    }

    //discuss
    public function storeDiscuss(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // Simpan komentar ke database
        Discuss::create([
            'user_id' => auth()->id(),
            'course_id' => $id,
            'content' => $request->content,
        ]);

        // Kembali ke halaman yang sama dengan pesan sukses
        return redirect()->route('detail', ['id' => $id])->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function storeComment(Request $request, $DiscussId)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // Simpan komentar ke database
        discuss_comment::create([
            'user_id' => auth()->id(),
            'discuss_id' => $DiscussId,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function show($id)
    {
        $course = Course::with(['discuss', 'contents.section', 'contents.category', 'instructor.user'])->findOrFail($id);
        $discussComments = Discuss::where('course_id', $id)->get();

        return view('detail', compact('course', 'discussComments'));
    }
}
