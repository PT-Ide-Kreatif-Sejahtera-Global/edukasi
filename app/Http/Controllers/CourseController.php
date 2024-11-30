<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                    DB::raw("CASE WHEN courses.is_locked = 1 THEN 'Locked' WHEN courses.is_locked = 2 THEN 'Unlocked' END as lock_status")
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
        // Validate the incoming request data
        $request->validate([
            'instructor_id' => 'required|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|max:8',
            'total_price' => 'required|numeric',
            'is_locked' => 'required|boolean',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Retrieve data from the request
        $instructor_id = $request->instructor_id;
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $total_price = $request->total_price;
        $is_locked = $request->is_locked;

        // Initialize the foto variable
        $fotoPath = null;

        try {
            // Create a new course instance
            $course = new Course(); // Assuming you have a Course model
            $course->instructor_id = $instructor_id;
            $course->title = $title;
            $course->description = $description;
            $course->price = $price;
            $course->total_price = $total_price;
            $course->is_locked = $is_locked;

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Generate a unique filename
                $fotoName = $title . '.' . $request->file('foto')->getClientOriginalExtension();
                $folderPath = 'public/course'; // Define the folder path
                $fotoPath = $request->file('foto')->storeAs($folderPath, $fotoName); // Store the file

                // Save the file path to the database
                $course->foto = $fotoPath; // Store the path in the database
            }

            // Save the course to the database
            $course->save();

            return redirect('/course')->with('success', 'Data course berhasil disimpan.');
        } catch (QueryException $e) {
            // Handle database-related errors
            Log::error('Error while saving course: ' . $e->getMessage(), [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked,
                'foto' => $fotoPath,
                'request_data' => $request->all(),
            ]);
            return redirect('/tambahcourse')->with('danger', 'Data course gagal disimpan:');
        }
    }




    public function edit($id)
    {
        // Ambil data course berdasarkan ID
        $course = DB::table('courses')->find($id);

        return view('admin.course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $instructor_id = $request->instructor_id;
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $total_price = $request->total_price;
        $is_locked = $request->is_locked; // Menangkap nilai is_locked

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('foto')) {
            $foto = $title . '.' . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = null;
        }

        try {
            // Data yang akan di-update
            $data = [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'is_locked' => $is_locked, // Menyimpan nilai is_locked
            ];

            // Jika ada foto baru, tambahkan ke data untuk di-update
            if ($foto) {
                $data['foto'] = $foto;
            }

            // Update data di database
            $update = DB::table('courses')->where('id', $id)->update($data);

            if ($update) {
                // Jika ada foto baru, simpan di folder
                if ($request->hasFile('foto')) {
                    $folderPath = "public/course";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return redirect('/course')->with('success', 'Data course berhasil diperbarui.');
            }
        } catch (Exception $e) {
            return redirect('/editcourse/' . $id)->with('danger', 'Data course gagal diperbarui: ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
