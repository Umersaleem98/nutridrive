<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('index');
    }
   
    public function Store()
    {
        return view('pages.shop');
    }
    public function About()
    {
        return view('pages.about');
    }

    public function Contact()
    {
        return view('pages.contact');
    }
    
    public function Cart()
    {
        return view('pages.cart');
    }
}
