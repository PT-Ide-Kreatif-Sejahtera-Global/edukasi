<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select(
                'courses.*',
                'users.name as instructor_name',
                DB::raw("CASE WHEN courses.is_locked = 1 THEN 'Locked' WHEN courses.is_locked = 2 THEN 'Unlocked' END as lock_status")
            )
            ->get();

        return Inertia::render('Courses/Index', ['courses' => $courses]);
    }

    public function create()
    {
        $instructors = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.id', 'users.name as instructor_name')
            ->get();

        return Inertia::render('Courses/Create', ['instructors' => $instructors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|max:8',
            'total_price' => 'required|numeric',
            'is_locked' => 'required|boolean',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $course = new Course();
            $course->instructor_id = $request->instructor_id;
            $course->title = $request->title;
            $course->description = $request->description;
            $course->price = $request->price;
            $course->total_price = $request->total_price;
            $course->is_locked = $request->is_locked;

            if ($request->hasFile('foto')) {
                $fotoName = $request->title . '.' . $request->file('foto')->getClientOriginalExtension();
                $folderPath = 'public/course';
                $course->foto = $request->file('foto')->storeAs($folderPath, $fotoName);
            }

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Data course berhasil disimpan.');
        } catch (QueryException $e) {
            Log::error('Error while saving course: ' . $e->getMessage(), $request->all());
            return redirect()->back()->with('danger', 'Data course gagal disimpan.');
        }
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $instructors = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.id', 'users.name as instructor_name')
            ->get();

        return Inertia::render('Courses/Edit', ['course' => $course, 'instructors' => $instructors]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|max:8',
            'total_price' => 'required|numeric',
            'is_locked' => 'required|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $course = Course::findOrFail($id);
            $course->instructor_id = $request->instructor_id;
            $course->title = $request->title;
            $course->description = $request->description;
            $course->price = $request->price;
            $course->total_price = $request->total_price;
            $course->is_locked = $request->is_locked;

            if ($request->hasFile('foto')) {
                if ($course->foto) {
                    Storage::disk('public')->delete($course->foto);
                }
                $fotoName = $request->title . '.' . $request->file('foto')->getClientOriginalExtension();
                $folderPath = 'public/course';
                $course->foto = $request->file('foto')->storeAs($folderPath, $fotoName);
            }

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Data course berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Data course gagal diperbarui: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->foto) {
            Storage::disk('public')->delete($course->foto);
        }
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Data courses berhasil dihapus.');
    }
}
