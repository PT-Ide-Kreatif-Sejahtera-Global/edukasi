<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Enrollments;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollments::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Enrollments retrieved successfully',
            'data' => $enrollments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollments $enrollments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollments $enrollments)
    {
        //
    }
}
