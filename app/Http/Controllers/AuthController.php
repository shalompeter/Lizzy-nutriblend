<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show the signup form
    public function loginForm()
    {
        return view('login');
    }

    public function registerForm()
    {
        return view('register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::attempt($request->only('email', 'password'));

        // Redirect after registration
        return redirect()->route('dashboard'); // Change this to your desired route
    }


    // Handle user login
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to dashboard or home
            return redirect()->route('dashboard'); // Change this to your desired route
        }

        // If login fails, show an error
        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect to login page after logout
    }

    // Handle already registered
    public function alreadyRegistered()
    {
        return redirect()->route('login')->with('status', 'You are already registered, please log in.');
    }
}

