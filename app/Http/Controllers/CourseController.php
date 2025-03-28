<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $instructor_id = $request->instructor_id;

        $title = $request->title;

        $description = $request->description;

        $price = $request->price;

        $total_price = $request->total_price;

        $embedded_video = $request->embedded_video;

        $url = $request->url;

        $is_locked = $request->is_locked;

        if ($request->hasFile('foto')) {

            $foto = $title . '.' . $request->file('foto')->getClientOriginalExtension();
        } else {

            $foto = null;
        }

        try {
            // Log the incoming request data for debugging
            \Log::info('Submit Course Data:', $request->all());

            $data = [
                'instructor_id' => $instructor_id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'total_price' => $total_price,
                'embedded_video' => $embedded_video,
                'url' => $url,
                'is_locked' => $is_locked,
                'foto' => $foto,
            ];

            // Log the data being inserted
            \Log::info('Data to be inserted:', $data);

            $simpan = DB::table('courses')->insert($data);
            if ($simpan) {
                if ($request->hasFile('foto')) {
                    $folderPath = "public/course";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return redirect('/tambahcourse')->with('success', 'Data course berhasil disimpan.');
            }
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error saving course:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect('/tambahcourse')->with('danger', 'Data course gagal disimpan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Ambil data course berdasarkan ID
        $course = DB::table('courses')->find($id);

        $instructors = instructor::with('user')->get();

        return view('admin.course.edit', compact('course', 'instructors'));
    }

    public function update(Request $request, $id)
    {
        $instructor_id = $request->instructor_id;

        $title = $request->title;

        $description = $request->description;

        $price = $request->price;

        $total_price = $request->total_price;

        $embedded_video = $request->embedded_video;

        $url = $request->url;

        $is_locked = $request->is_locked;

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
                'embedded_video' => $embedded_video,
                'url' => $url,
                'is_locked' => $is_locked,
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
        } catch (\Exception $e) {
            return redirect('/editcourse/' . $id)->with('danger', 'Data course gagal diperbarui: ' . $e->getMessage());
        }
    }
    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect('/course')->with('success', 'Data courses berhasil dihapus.');
    }
}
