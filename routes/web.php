<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/store', [HomeController::class, 'Store'])->name('store');
Route::get('/about', [HomeController::class, 'About'])->name('about');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'Cart'])->name('cart');