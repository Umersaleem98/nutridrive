<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact'); // Ensure your Blade file is named `contact.blade.php`
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'c_fname' => 'required|string|max:255',
            'c_lname' => 'required|string|max:255',
            'c_email' => 'required|email|max:255',
            'c_subject' => 'nullable|string|max:255',
            'c_message' => 'required|string',
        ]);
    
        // Save the data to the database
        Contact::create([
            'first_name' => $request->input('c_fname'),
            'last_name' => $request->input('c_lname'),
            'email' => $request->input('c_email'),
            'subject' => $request->input('c_subject'),
            'message' => $request->input('c_message'),
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
