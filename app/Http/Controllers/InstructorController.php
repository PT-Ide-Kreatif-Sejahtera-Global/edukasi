<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'Instructor')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.instructor.index', compact('users'));
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
        $data = array(
            'users' => DB::table('users')
                ->get(),
        );
        return view('admin.instructor.tambah', $data);
    }
    public function submitinstructor(Request $request)
    {
        $name            = $request->name;
        $email            = $request->email;
        $password         = $request->password;
        $total_progress         = $request->total_progress;
        if ($request->hasFile('foto')) {
            $foto       = $name . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto       = null;
        }

        try {
            $data = [
                'name'           => $name,
                'email'          => $email,
                'role'          => 'Instructor',
                'total_progress'          => $total_progress,
                'foto'           => $foto,
                'password'       => bcrypt($password),
            ];
            $simpan     = DB::table('users')->insert($data);
            if ($simpan) {
                if ($request->hasFile('foto')) {
                    $folderPath = "public/users";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return redirect('/instructor')->with('Success', 'Data User berhasil disimpan.');
            }
        } catch (\Exception $e) {
            return redirect('/tambahinstructor')->with('danger', 'Data User gagal disimpan.');
        }
    }
}
