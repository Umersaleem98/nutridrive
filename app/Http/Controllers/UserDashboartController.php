<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDashboartController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }
    
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'nullable|string|max:15',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|string|in:admin,user',
    ]);

    // Create a new user
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    // Redirect or return a response
    return redirect()->back()->with('success', 'User created successfully!');
}

public function edit($id)
{
    $user = User::findOrFail($id); // Find user by ID or fail
    return view('admin.users.edit', compact('user'));
}



public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id, // Ignore unique check for current user
        'phone' => 'nullable|string|max:15',
        'role' => 'required|in:admin,user',
    ]);

    $user = User::find($id);
    $user->update($validated);

    return redirect()->back()->with('success', 'User created successfully!');
}


public function delete($id)
{
    $category = User::find($id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}
}
