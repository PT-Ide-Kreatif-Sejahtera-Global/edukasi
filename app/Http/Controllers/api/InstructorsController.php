<?php

namespace App\Http\Controllers\api;

use Storage;
use App\Models\User;
use App\Models\instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            return DB::transaction(function () use ($request) {
                $foto = null;
                if ($request->hasFile('foto')) {
                    $foto = time() . '.' . $request->file('foto')->getClientOriginalExtension();
                    $request->file('foto')->storeAs('public/users/', $foto);
                }

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'Instructor',
                    'foto' => $foto,
                ]);

                $instructor = Instructor::create(['user_id' => $user->id,
                    'bio' => $request->bio,
                    'rating' => 0,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Instructor created successfully',
                    'data' => [
                        'user' => $user,
                        'instructor' => $instructor,
                    ]
                ], 201);
            });
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create instructor: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::find($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ], 404);
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $instructor->user_id . ',id',
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'sometimes|required|string',
            'rating' => 'sometimes|required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $instructor->user;

        if ($request->hasFile('foto')) {
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $user->foto;
        }

        try {
            DB::transaction(function () use ($request, $instructor, $user, $foto) {
                $user->update([
                    'name' => $request->name ?? $user->name,
                    'email' => $request->email ?? $user->email,
                    'password' => $request->password ? bcrypt($request->password) : $user->password,
                    'foto' => $foto,
                    'updated_at' => now(),
                ]);

                $instructor->update([
                    'bio' => $request->bio ?? $instructor->bio,
                    'rating' => $request->rating ?? $instructor->rating,
                    'updated_at' => now(),
                ]);

                if ($request->hasFile('foto')) {
                    $folderPath = "public/users/";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Instructor updated successfully',
                'data' => $instructor
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update instructor',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructor::find($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ], 404);
        }

        $user = $instructor->user;

        try {
            \DB::transaction(function () use ($instructor, $user) {
                // Hapus foto jika ada
                if ($user->foto) {
                    Storage::disk('public')->delete('users/' . $user->foto);
                }

                // Hapus instructor
                $instructor->delete();

                // Hapus user terkait
                $user->delete();
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Instructor and related user deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete instructor: ' . $e->getMessage()
            ], 500);
        }
    }

}
