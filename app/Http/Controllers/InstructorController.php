<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Enrollments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function index()
    {
        $data = [
            'users' => DB::table('users')
                ->join('instructors', 'users.id', '=', 'instructors.user_id')
                ->where('users.role', 'Instructor')
                ->select('users.*', 'instructors.bio', 'instructors.rating') // Tambahkan kolom yang dibutuhkan
                ->get(),
        ];
        return view('admin.instructor.index', $data);
    }
    function deleteuser($id)
    {
        $query = DB::table('users')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect('/instructor')->with('Success', 'Data instructor berhasil dihapus');
        } else {
            return redirect('/instructor')->with('Error', 'Data instructor gagal dihapus');
        }
    }
    public function tambah()
    {
        // Ambil data dari tabel users dengan role "Instructor" dan gabungkan dengan tabel instructors
        $data = [
            'users' => DB::table('users')
                ->join('instructors', 'users.id', '=', 'instructors.user_id')
                ->where('users.role', 'Instructor')
                ->select('users.*', 'instructors.bio', 'instructors.rating') // Tambahkan kolom yang dibutuhkan
                ->get(),
        ];

        return view('admin.instructor.tambah', $data);
    }

    public function submitinstructor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required',
        ]);

        $foto = null; // Initialize foto variable

        if ($request->hasFile('foto')) {
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
        }

        try {
            DB::transaction(function () use ($request, $foto) {
                // Create new user with role 'Instructor'
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'Instructor',
                    'foto' => $foto,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Create instructor data
                Instructor::create([
                    'user_id' => $user->id,
                    'bio' => $request->bio,
                    'rating' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Save photo to the specified folder
                if ($request->hasFile('foto')) {
                    $folderPath = "public/users/";
                    if (!Storage::exists($folderPath)) {
                        Storage::makeDirectory($folderPath);
                    }
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
            });

            // Redirect to instructors page if successful
            return redirect()->route('instructor')->with('success', 'Instructor berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error adding instructor: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan instructor: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
