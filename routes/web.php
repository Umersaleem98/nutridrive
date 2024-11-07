<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [HomeController::class, 'Shop'])->name('shop');
Route::get('/shop_single', [HomeController::class, 'Singleshop'])->name('shop_single');
Route::get('/about', [HomeController::class, 'About'])->name('about');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'Cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'Checkout'])->name('checkout');