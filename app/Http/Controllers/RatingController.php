<?php

namespace App\Http\Controllers;

use App\Models\review;

class RatingController extends Controller
{
    public function index()
    {
        $data = review::with(['course', 'user'])->get();
        return view('admin.rating.index', compact('data'));
    }
}
