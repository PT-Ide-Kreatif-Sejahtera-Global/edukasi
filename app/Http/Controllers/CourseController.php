<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        // $data = array(
        //     // 'pembeli' => DB::table('reservasi')
        //     //     ->join('users', 'reservasi.id_user', '=', 'users.id')
        //     //     ->join('meja', 'reservasi.id_meja', '=', 'meja.id_meja')
        //     //     ->orderBy('id_reservasi', 'DESC')
        //     //     ->get(),
        // );
        return view('admin.course.index');
    }
}
