<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;
use Inertia\Inertia;

class InstructorController extends Controller
{
    // Display a listing of the instructors
    public function index()
    {
        // Use query builder to retrieve users with their instructors' data
        $users = DB::table('users')
            ->join('instructors', 'users.id', '=', 'instructors.user_id')
            ->where('users.role', 'Instructor')
            ->select('users.*', 'instructors.bio', 'instructors.rating')
            ->paginate(10);

        // return view('admin.instructor.index', ['users' => $users]);
        return Inertia::render('Admin/Instructor/Index', ['users' => $users]);
    }

    // Show the form for creating a new instructor
    public function create()
    {
        return Inertia::render('Admin/Instructor/Create'); // Return the create view
    }

    // Store a newly created instructor in storage
    public function submitinstructor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required',
        ], [
            'name.required' => 'Nama instruktur harus diisi.',
            'name.string' => 'Nama instruktur harus berupa teks.',
            'name.max' => 'Nama instruktur tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus terdiri dari minimal 6 karakter.',
            'foto.required' => 'Foto harus diunggah.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Foto tidak boleh lebih dari 2MB.',
            'bio.required' => 'Bio instruktur harus diisi.',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
        }

        try {
            DB::transaction(function () use ($request, $foto) {
                // Create new user with role 'Instructor'
                $userId = DB::table('users')->insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'Instructor',
                    'foto' => $foto,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Create instructor data
                DB::table('instructors')->insert([
                    'user_id' => $userId,
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

            return redirect()->route('instructor')->with('success', 'Instructor berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error adding instructor: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan instructor: ' . $e->getMessage()]);
        }
    }


    // Show the form for editing the specified instructor
    public function edit($id)
    {
        // Find the instructor by user ID
        $user = DB::table('users')
            ->join('instructors', 'users.id', '=', 'instructors.user_id')
            ->where('users.id', $id)
            ->select('users.*', 'instructors.bio', 'instructors.rating')
            ->first(); // Get the first result

        return Inertia::render('Admin/Instructor/Edit', ['user' => $user]);
    }

    // Update the specified instructor in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Exclude current user's email from unique validation
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required',
        ]);

        // Find the user and instructor
        $user = DB::table('users')->where('id', $id)->first();
        $instructor = DB::table('instructors')->where('user_id', $id)->first();

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
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $foto,
            'updated_at' => now(),
        ]);

        DB::table('instructors')->where('user_id', $id)->update([
            'bio' => $request->bio,
            'foto' => $foto, // Update the instructor's photo if changed
            'updated_at' => now(),
        ]);

        return redirect()->route('instructor')->with('success', 'Instructor berhasil diperbarui.');
    }

    // Remove the specified instructor from storage
    public function destroy($id)
    {
        // Find the user by ID
        $user = DB::table('users')->where('id', $id)->first();

        // Delete the instructor record if it exists
        if ($user) {
            DB::table('instructors')->where('user_id', $id)->delete(); // Delete the instructor record
            DB::table('users')->where('id', $id)->delete(); // Delete the user record
        }
        return redirect()->route('instructor.index')->with('success', 'Data instructor berhasil dihapus');
    }
}
