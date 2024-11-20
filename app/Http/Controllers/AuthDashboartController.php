<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthDashboartController extends Controller
{
    public function showLoginForm()
    {
        return view('adminauth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
        // Check the role of the authenticated user
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->intended('/dashboard'); // Redirect admin to admin dashboard
        }

        // Redirect other users to a different dashboard
        return redirect()->intended('dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
