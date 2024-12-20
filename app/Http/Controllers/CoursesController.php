<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function myCourses()
    {
        $enrollments = DB::table('enrollments')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->join('users as instructors_users', 'instructors.user_id', '=', 'instructors_users.id')
            ->select(
                'enrollments.course_id',
                'courses.title as course_title',
                'instructors_users.name as instructor_name',
                DB::raw('COUNT(enrollments.user_id) as total_students')
            )
            ->groupBy('enrollments.course_id', 'courses.title', 'instructors_users.name')
            ->get();

        return view('instructor.courses.index', compact('enrollments'));
    }

    // Menampilkan semua murid dari course tertentu
    public function courseStudents($courseId)
    {
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('enrollments.course_id', $courseId)
            ->select('users.name', 'users.email')
            ->get();

        // Mendapatkan detail kursus untuk header
        $course = DB::table('courses')
            ->where('id', $courseId)
            ->select('title')
            ->first();

        return view('instructor.courses.students', compact('course', 'students'));
    }
}
