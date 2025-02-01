<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = instructor::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Instructors retrieved successfully',
            'data' => $instructors
        ], 200);
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
    public function update(Request $request, instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(instructor $instructor)
    {
        //
    }
}
