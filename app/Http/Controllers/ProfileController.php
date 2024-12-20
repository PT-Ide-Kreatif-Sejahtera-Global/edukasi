<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Atau gunakan logika untuk mengambil user yang diinginkan
        return view('admin.profile', compact('user'));
    }
    public function user()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Data yang akan diupdate
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika ada input password, update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Update foto jika ada file foto yang diupload
        // Cek dan update foto jika ada file yang diunggah
        if ($request->hasFile('foto')) {
            // Set nama file baru
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();

            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/users/' . $user->foto);
            }

            // Simpan foto baru ke folder 'public/users'
            $folderPath = "public/users/";
            $request->file('foto')->storeAs($folderPath, $foto);

            // Update nama file foto di database
            $user->foto = $foto;
        }

        // Update data user
        $user->update($data);

        return redirect()->route('home')->with('status', 'Profil berhasil diperbarui.');
    }
    public function updateuser(Request $request)
    {
        $user = auth()->user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Data yang akan diupdate
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika ada input password, update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Update foto jika ada file foto yang diupload
        // Cek dan update foto jika ada file yang diunggah
        if ($request->hasFile('foto')) {
            // Set nama file baru
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();

            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/users/' . $user->foto);
            }

            // Simpan foto baru ke folder 'public/users'
            $folderPath = "public/users/";
            $request->file('foto')->storeAs($folderPath, $foto);

            // Update nama file foto di database
            $user->foto = $foto;
        }

        // Update data user
        $user->update($data);

        return redirect()->route('welcome')->with('status', 'Profil berhasil diperbarui.');
    }
}
