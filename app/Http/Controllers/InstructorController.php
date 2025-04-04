<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function index()
    {
        $data = [
            'users' => DB::table('users')
                ->join('instructors', 'users.id', '=', 'instructors.user_id')
                ->where('users.role', 'Instructor')
                ->select('users.*', 'instructors.id', 'instructors.bio', 'instructors.rating')
                ->get(),
        ];

        return view('admin.instructor.index', $data);
    }

    function deleteuser($id)
    {
        $query = DB::table('instructors')
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

            // Set success session
            session()->flash('success', 'Instructor berhasil ditambahkan.');
            return redirect()->route('instructor');
        } catch (\Exception $e) {
            // Set error session jika gagal
            session()->flash('error', 'Gagal menambahkan instructor: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    
    public function edit($id)
    {
        $instructor = Instructor::with('user')->findOrFail($id);
        
        return view('admin.instructor.edit', compact('instructor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable',
            'password' => 'nullable|min:6',
            'foto' => 'nullable|max:2048',
            'bio' => 'required',
        ]);

        $instructor = Instructor::findOrFail($id);
        $user = $instructor->user;

        if ($request->hasFile('foto')) {
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $user->foto;
        }

        try {
            DB::transaction(function () use ($request, $instructor, $user, $foto) {

                // Update data user
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password ? bcrypt($request->password) : $user->password,
                    'foto' => $foto,
                    'updated_at' => now(),
                ]);

                // Update data instructor
                $instructor->update([
                    'bio' => $request->bio,
                    'updated_at' => now(),
                ]);

                // Simpan foto jika ada
                if ($request->hasFile('foto')) {
                    $folderPath = "public/users/";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
            });

            return redirect()->route('instructor')->with('success', 'Instructor berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal memperbarui instructor: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
