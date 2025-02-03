<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully',
            'data' => $users
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('users', 'public');
            $path = str_replace('users/', '', $path);
        } else {
            $path = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'foto' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
            'role' => 'sometimes|string|max:255',
            'password' => 'sometimes|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Delete the old photo
            if ($user->foto) {
                \Storage::disk('public')->delete('users/' . $user->foto);
            }
            $path = $request->file('foto')->store('users', 'public');
            $path = str_replace('users/', '', $path);
            $user->foto = $path;
        }

        $user->name = $request->get('name', $user->name);
        $user->email = $request->get('email', $user->email);
        $user->role = $request->get('role', $user->role);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        if ($user->foto) {
            \Storage::disk('public')->delete('users/' . $user->foto);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User and associated photo deleted successfully'
        ], 200);
    }
}
