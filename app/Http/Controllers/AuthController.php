<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }



    public function login(Request $request)
{
    // Validate the login credentials
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt login
    if (Auth::attempt($credentials)) {
        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Redirect to intended URL or fallback to home
        return redirect()->intended('/')->with('success', 'You are now logged in!');
    }

    // If authentication fails
    return back()->withErrors([
        'email' => 'Invalid credentials. Please try again.',
    ])->withInput();
}


    // Handle Login
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('/');
    //     }

    //     return back()->withErrors(['email' => 'Invalid credentials']);
    // }

    // Show Registration Form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    
        Auth::login($user);
    
        return redirect('index');
    }
    

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
