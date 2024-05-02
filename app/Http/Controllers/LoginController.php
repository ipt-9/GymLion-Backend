<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     *
     * This code has been copied from the Twitter Project
     *
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return [
                'token' => $request->user()->createToken('auth_token')->plainTextToken
            ];
        } else {
            return response()->json(['errors' => ['general' => 'E-Mail oder Passwort falsch.']], 422);
        }
    }
    public function checkAuth(Request $request)
    {
        return [
            'data' => UserResource::make($request->user())
        ];
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }
}
