<?php

namespace App\Http\Controllers;

use App\Models\course_category;
use App\Models\course_contents;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function index()
    {
        $data = review::with(['course', 'user'])->get();
        return view('admin.rating.index', compact('data'));
    }
}
