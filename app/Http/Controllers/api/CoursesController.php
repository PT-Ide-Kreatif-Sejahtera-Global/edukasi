<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = course::all();
        return response()->json([
            'success' => true,
            'message' => 'Courses retrieved successfully',
            'data' => $courses
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'instructor_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_locked' => 'required|boolean',
            'total_price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $path = $request->file('foto') ? $request->file('foto')->store('courses', 'public') : null;
        $path = $path ? str_replace('courses/', '', $path) : null;

        $course = course::create([
            'instructor_id' => $request->instructor_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'foto' => $path,
            'is_locked' => $request->is_locked,
            'total_price' => $request->total_price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course = course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $validator = \Validator::make($request->all(), [
            'instructor_id' => 'nullable|integer|exists:users,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_locked' => 'nullable|boolean',
            'total_price' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('courses', 'public');
            $path = str_replace('courses/', '', $path);
            $course->foto = $path;
        }

        $course->instructor_id = $request->instructor_id ?? $course->instructor_id;
        $course->title = $request->title ?? $course->title;
        $course->description = $request->description ?? $course->description;
        $course->price = $request->price ?? $course->price;
        $course->is_locked = $request->is_locked ?? $course->is_locked;
        $course->total_price = $request->total_price ?? $course->total_price;

        $course->save();

        return response()->json([
            'success' => true,
            'message' => 'Course updated successfully',
            'data' => $course
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course, $id)
    {
        $course = course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        if ($course->foto) {
            \Storage::disk('public')->delete('courses/' . $course->foto);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ], 200);
    }
}
