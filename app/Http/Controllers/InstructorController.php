<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;

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

        try {
            DB::transaction(function () use ($request) {
                // Upload file foto jika ada
                $folderPath = "public/users";
                $fotoPath = null;
                
                // Tambahkan user baru dengan role 'Instructor'
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'Instructor',
                    'foto' => $folderPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Tambahkan data Instructor
                Instructor::create([
                    'user_id' => $user->id,
                    'bio' => $request->bio,
                    'rating' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });

            // Redirect ke halaman instructur jika berhasil
            return redirect()->route('instructors.index')->with('success', 'Instructor berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika gagal, redirect kembali dengan pesan error
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan instructor: ' . $e->getMessage()]);
        }
    }
    
}
