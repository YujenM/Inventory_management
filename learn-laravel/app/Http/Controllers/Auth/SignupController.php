<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    /**
     * Handle user signup.
     */
    public function signup(Request $request): JsonResponse
    {
        // Validate request data
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|unique:users,user_email',
            'user_password' => 'required|string|min:6',
        ]);

        // Check if user already exists
        $existingUser = User::where('user_email', $request->user_email)->first();
        if ($existingUser) {
            return response()->json([
                'message' => 'User already exists',
                'status' => 'error'
            ], 409);
        }

        // Create new user
        $newUser = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'status' => 'success',
            'data' => [
                'user_id' => $newUser->user_id,
                'user_name' => $newUser->user_name,
                'user_email' => $newUser->user_email,
            ]
        ], 201);
    }
}
