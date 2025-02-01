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
        $request->validate([
            'user_id' => 'required|integer',
            'bio' => 'required|string',
            'rating' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Store the uploaded photo in the storage/instructor directory
        $path = $request->file('foto')->store('users', 'public');
        $path = str_replace('users/', '', $path);

        $instructor = Instructor::create([
            'user_id' => $request->get('user_id'),
            'bio' => $request->get('bio'),
            'rating' => $request->get('rating'),
            'foto' => $path
        ]);

        $instructor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor created successfully',
            'data' => $instructor
        ], 201);
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
