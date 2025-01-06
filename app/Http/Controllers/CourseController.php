<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = DB::table('courses')
            ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
            ->join('users', 'instructors.user_id', '=', 'users.id') // Join to get the instructor's name
            ->select(
                'courses.*',
                'users.name as instructor_name', // Get the name from the users table
                DB::raw("CASE WHEN courses.is_locked = 1 THEN 'Locked' WHEN courses.is_locked = 2 THEN 'Unlocked' END as lock_status")
            )
            ->paginate(10);

        return Inertia::render('Admin/Courses/Index', ['courses' => $courses]);
    }

    // Show the form for creating a new course
    public function tambah()
    {
        $instructors = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.id', 'users.name as instructor_name')
            ->get();

        return Inertia::render('Admin/Courses/Create', ['instructors' => $instructors]);
    }

    // Store a newly created course in storage
    public function submit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'is_locked' => 'required|boolean',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif', // Image validation
        ]);

        // Retrieve data from the request
        $instructor_id = $request->instructor_id;
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $total_price = $request->total_price;
        $is_locked = $request->is_locked;

        // Sanitize the title to create a valid filename
        $sanitizedTitle = preg_replace('/[^A-Za-z0-9_\-]/', '_', $title);
        $foto = $sanitizedTitle . '.' . $request->file('foto')->getClientOriginalExtension();

        try {
            // Insert the new course into the database
            DB::table('courses')->insert([
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked,
                'foto' => $foto,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Handle file upload
            if ($request->hasFile('foto')) {
                $folderPath = "public/course"; // Define the folder path
                if (!Storage::exists($folderPath)) {
                    Storage::makeDirectory($folderPath);
                }
                $request->file('foto')->storeAs($folderPath, $foto);
            }

            return redirect('/course')->with('success', 'Data course berhasil disimpan.');
        } catch (Exception $e) {
            // Handle database-related errors
            Log::error('Error while saving course: ' . $e->getMessage(), [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked,
                'foto' => $foto,
                'request_data' => $request->all(),
            ]);
            return redirect('/tambahcourse')->with('danger', 'Data course gagal disimpan:');
        }
    }


    // Show the form for editing the specified course
    public function edit($id)
    {
        // Retrieve the course data based on ID
        $course = DB::table('courses')->where('id', $id)->first();
        $instructors = DB::table('instructors')
            ->join('users', 'instructors.user_id', '=', 'users.id')
            ->select('instructors.id', 'users.name as instructor_name')
            ->get();

        return Inertia::render('Admin/Courses/Edit', ['course' => $course, 'instructors' => $instructors]);
    }

    // Update the specified course in storage
    public function update(
        Request $request,
        $id
    ) {
        $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'is_locked' => 'required|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Retrieve data from the request
        $instructor_id = $request->instructor_id;
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $total_price = $request->total_price;
        $is_locked = $request->is_locked;

        // Retrieve the existing course data
        $course = DB::table('courses')->where('id', $id)->first();
        $foto = $course->foto; // Default to existing photo

        try {
            // Check if a new file has been uploaded
            if ($request->hasFile('foto')) {
                // Generate a new filename based on the title
                $foto = preg_replace('/[^A-Za-z0-9_\-]/', '_', $title) . '.' . $request->file('foto')->getClientOriginalExtension();

                // Handle file upload
                $folderPath = "public/course"; // Define the folder path
                if (!Storage::exists($folderPath)) {
                    Storage::makeDirectory($folderPath);
                }
                $request->file('foto')->storeAs($folderPath, $foto);
            }

            // Prepare the data to be updated
            $data = [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked,
                'foto' => $foto, // Use the new or existing photo
                'updated_at' => now(),
            ];

            // Update the course in the database
            DB::table('courses')->where('id', $id)->update($data);

            return redirect()->route('course')->with('success', 'Instructor berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('editcourse')->with('danger', 'Gagal memperbarui instructor: ' . $e->getMessage());
        }
    }


    // Remove the specified course from storage
    public function delete($id)
    {
        // Delete the course from the database
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
