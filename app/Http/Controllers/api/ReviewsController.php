<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = review::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Reviews retrieved successfully',
            'data' => $reviews
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'user_id' => 'required|integer',
            'instructor_id' => 'required|integer',
            'bintang' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $review = review::create([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'instructor_id' => $request->instructor_id,
            'bintang' => $request->bintang,
            'komentar' => $request->komentar,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Review created successfully',
            'data' => $review
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $review = review::find($id);

        if (!$review) {
            return response()->json([
                'status' => 'error',
                'message' => 'Review not found'
            ], 404);
        }

        $validator = \Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'user_id' => 'required|integer',
            'instructor_id' => 'required|integer',
            'bintang' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $review->update([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'instructor_id' => $request->instructor_id,
            'bintang' => $request->bintang,
            'komentar' => $request->komentar,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Review updated successfully',
            'data' => $review
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = review::find($id);

        if (!$review) {
            return response()->json([
                'status' => 'error',
                'message' => 'Review not found'
            ], 404);
        }

        $review->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Review deleted successfully'
        ], 200);
    }
}
