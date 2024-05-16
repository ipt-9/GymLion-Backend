<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     *
     * This code has been partially copied from the Twitter Project, but modified to fit our needs
     *
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return [
                'token' => $request->user()->createToken('auth_token')
            ];
        } else {
            return response()->json(['errors' => ['general' => 'Email or password is wrong']], 422);
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

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
    public function signup(StoreUserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->save();
        return response()->json(['message' => 'User created successfully'],201);
    }
}
