<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function show()
    {
        $contact = Contact::all();
        return view('admin.Contactus.index', compact('contact'));
    }

    public function deleteMessage($id)
{
    $message = Contact::findOrFail($id);
    $message->delete();
    return redirect()->back()->with('success', 'Message deleted successfully');
}
}
