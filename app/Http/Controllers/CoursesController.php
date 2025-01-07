<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

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

        $enrollments = $enrollments->map(function ($enrollment) {
            return [
                'course_id' => $enrollment->course_id,
                'course_title' => $enrollment->course_title,
                'instructor_name' => $enrollment->instructor_name,
                'total_students' => $enrollment->total_students,
            ];
        });

        return Inertia::render('Instructor/Courses/MyCourse', ['enrollments' => $enrollments]);
    }


    // Menampilkan semua murid dari course tertentu
    public function courseStudents($courseId)
    {
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('enrollments.course_id', $courseId)
            ->select('users.name', 'users.email')
            ->paginate(10);

        // Mendapatkan detail kursus untuk header
        $course = DB::table('courses')
            ->where('id', $courseId)
            ->select('title')
            ->first();

        return Inertia::render('Instructor/Courses/Students', ['students' => $students, 'course' => $course]);
    }
}
