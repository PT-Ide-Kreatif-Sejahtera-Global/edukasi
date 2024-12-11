<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;
use Exception;
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required',
        ]);

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
                    'rating' => 0,
                    'foto' => $foto, // Ensure foto is included here
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
        } catch (Exception $e) {
            Log::error('Error adding instructor: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan instructor: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        // Find the instructor by user ID
        $user = User::with('instructor')->findOrFail($id); // Eager load the instructor relationship
        return view('admin.instructor.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Exclude current user's email from unique validation
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required',
        ]);

        // Find the user and instructor
        $user = User::findOrFail($id);
        $instructor = $user->instructor;

        // Handle photo upload
        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if ($user->foto && $user->foto !== 'default.jpg') {
                Storage::disk('public')->delete("users/{$user->foto}");
            }
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('public/users', $foto);
        } else {
            $foto = $user->foto; // Keep the old photo if no new one is uploaded
        }

        // Update user and instructor data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $foto,
        ]);

        $instructor->update([
            'bio' => $request->bio,
            'foto' => $foto, // Update the instructor's photo if changed
        ]);

        return redirect()->route('instructor')->with('success', 'Instructor berhasil diperbarui.');
    }


    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
