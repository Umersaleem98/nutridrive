<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Auth Routes 
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/', function () {
    return view('dashboard');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Pages routes 

Route::get('store', [HomeController::class, 'storepage'])->name('store');
// Route::get('storesingle', [HomeController::class, 'single_storepage'])->name('store.single');
Route::get('storesingle/{id}', [HomeController::class, 'single_storepage'])->name('storesingle');

Route::get('about', [HomeController::class, 'aboutpage'])->name('about');
Route::get('contact', [HomeController::class, 'contactpage'])->name('contact');
Route::get('cart', [HomeController::class, 'cartpage'])->name('cart');
Route::get('checkout', [HomeController::class, 'checkoutpage'])->name('checkout');
