<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login api
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $user = \App\Models\User::where('email', $request->username)->first();
        } else {
            $user = \App\Models\User::where('username', $request->username)->first();
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => "error",
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => "success",
            'token' => $token,
            'user' => $user,
        ], 200);
    }

    // logout api
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => "success",
            'message' => 'Logged out',
        ], 200);
    }
}
