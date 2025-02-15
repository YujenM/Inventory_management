<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GetUser extends Controller
{
    public function getUser(Request $request)
    {
        // Retrieve the authenticated user from the JWT token
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized access. Invalid or missing token.'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'user_id' => $user->user_id, // Return only the user_id
            'user' => $user
        ]);
    }
}
