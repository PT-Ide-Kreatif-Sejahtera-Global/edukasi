<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($courseId)
    {
        $course = Course::with(['instructor.user'])->findOrFail($courseId); // Ambil instructor dan user
        $user = auth()->user(); // User yang login saat ini

        return view('customer.course.index', [
            'course' => $course,
            'user' => $user,
        ]);
    }
    public function submit(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'bintang' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        // Simpan review ke database
        Review::create([
            'course_id' => $request->course_id,
            'user_id' => auth()->id(),
            'instructor_id' => $request->instructor_id,
            'bintang' => $request->bintang,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return redirect()->back()->with('error', 'Review tidak ditemukan.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }


}
