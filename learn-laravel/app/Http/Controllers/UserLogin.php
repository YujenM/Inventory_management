<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLogin extends Controller
{
    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required|string|min:6',
        ]);

        $user = User::where('user_email', $request->user_email)->first();

        if (!$user || !Hash::check($request->user_password, $user->user_password)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
        }

        // Generate JWT token
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User login successful',
            'token' => $token, // JWT token
            'user_id' => $user->id, // User ID for reference
            'user' => $user,
        ]);
    }




    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name' => 'string|max:255',
            'user_email' => 'email|unique:users,user_email,' . $user->id,
            'user_password' => 'nullable|string|min:6'
        ]);

        // Update user details
        $user->update([
            'user_name' => $request->user_name ?? $user->user_name,
            'user_email' => $request->user_email ?? $user->user_email,
            'user_password' => $request->user_password ? Hash::make($request->user_password) : $user->user_password,
        ]);

        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
