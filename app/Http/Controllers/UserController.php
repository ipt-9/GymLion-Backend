<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);


        // Create a new user instance
        $user = new User();
        // $user->firstname = $request->input('firstname');
        // $user->lastname = $request->input('lastname');
        // $user->email = $request->input('email');
        // $user->password = bcrypt($request->input('password'));
        // $user->updated_at = now();
        // $user->created_at = now();
        $user->fill($request->validated());
        $user->save();
        return response()->json(['message' => 'User created successfully'],201);
    }
}
