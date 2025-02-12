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
            'rating' => 'required|numeric'
        ]);

        $instructor = Instructor::create([
            'user_id' => $request->user_id,
            'bio' => $request->bio,
            'rating' => $request->rating
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor created successfully',
            'data' => $instructor
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::where('user_id', $id)->first();

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ], 404);
        }

        $validator = \Validator::make($request->all(), [
            'bio' => 'string',
            'rating' => 'numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $instructor->bio = $request->bio;
        $instructor->rating = $request->rating;

        $instructor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor updated successfully',
            'data' => $instructor
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructor = instructor::find($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ], 404);
        }

        if ($instructor->foto) {
            // Delete the photo from storage
            \Storage::disk('public')->delete('users/' . $instructor->foto);
        }

        // Delete the instructor
        $instructor->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor deleted successfully'
        ], 200);
    }
}
