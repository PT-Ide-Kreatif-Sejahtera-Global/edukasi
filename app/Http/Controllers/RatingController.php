<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RatingController extends Controller
{
    public function index()
    {
        // $data = array(
        //     'pembeli' => DB::table('reservasi')
        //         ->join('users', 'reservasi.id_user', '=', 'users.id')
        //         ->join('meja', 'reservasi.id_meja', '=', 'meja.id_meja')
        //         ->orderBy('id_reservasi', 'DESC')
        //         ->get(),
        // );
        $reviews = DB::table('reviews')
            ->join('courses', 'reviews.course_id', '=', 'courses.id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('reviews.course_id', 'courses.title as course_title', 'users.name as user_name', DB::raw('COUNT(reviews.user_id) as total_reviews'))
            ->paginate('10');

        return Inertia::render('Admin/Rating/Index', ['reviews' => $reviews]);
    }
}
