<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        // Directly creating the user without validation
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
    
        Auth::login($user);
    
        // Create a cart for the user
        Cart::create([
            'user_id' => $user->id,
        ]);
    
        // Flash success message
        session()->flash('success', 'You are registered successfully!');
    
        return redirect('/index');
    }
    
    

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
