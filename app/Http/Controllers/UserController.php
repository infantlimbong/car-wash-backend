<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => 'Successfully fetched all users',
            'data' => $users
        ], 200);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'role' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $validated = $validator->validated();

        // Membuat hash untuk pasword agar tidak dapat dibaca
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        return response()->json([
            'message' => 'User successfully created',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return response()->json([
            'message' => 'Successfully fetched user',
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string',
            'role' => 'sometimes|required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $validated = $validator->validated();

        if (!empty($validated['password'])) {
            // Membuat hash untuk pasword agar tidak dapat dibaca
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Jika field password kosong, maka password tidak akan diubah
            unset($validated['password']);
        }

        $user->update($validated);
        return response()->json([
            'message' => 'User successfully updated',
            'data' => $user
        ], 200);
    }


    // Menampilkan data/profil user yang login
    public function authenticatedUser(Request $request)
    {
        return response()->json(['message' => 'Successfully retrieved authenticated user', 'data' => $request->user()], 200);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'User successfully deleted'
        ], 200);
    }
}
