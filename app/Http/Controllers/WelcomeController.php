<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $instructors = DB::table('users')
            ->join('instructors', 'users.id', '=', 'instructors.user_id')
            ->where('users.role', 'Instructor')
            ->select('users.*', 'instructors.bio', 'instructors.rating')
            ->limit(4)->get();

        $courses = DB::table('courses')->limit(4)->get();

        return Inertia::render('Welcome', [
            'courses' => $courses,
            'instructors' => $instructors,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function showInstructor()
    {
        $instructors = DB::table('users')
            ->join('instructors', 'users.id', '=', 'instructors.user_id')
            ->where('users.role', 'Instructor')
            ->select('users.*', 'instructors.bio', 'instructors.rating')
            ->paginate(12);

        return Inertia::render('Instructor', ['instructors' => $instructors]);
    }

    public function showCourse()
    {
        $courses = DB::table('courses')->paginate(12);
        return Inertia::render('Course', ['courses' => $courses]);
    }

    public function detailCourse($id)
    {
        // Retrieve the course data based on ID
        $course = DB::table('courses')->where('id', $id)->first();
        $instructors = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.id', 'users.name as instructor_name')
            ->get();

        return Inertia::render('CourseDetail', ['course' => $course, 'instructors' => $instructors]);
    }
}
