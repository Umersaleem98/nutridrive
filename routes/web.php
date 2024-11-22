<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthDashboartController;
use App\Http\Controllers\UserDashboartController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;

// Auth Routes 
Route::get('userlogin', [AuthController::class, 'showLogin'])->name('login');
Route::post('userlogin', [AuthController::class, 'login']);
Route::get('userregister', [AuthController::class, 'showRegister'])->name('register');
Route::post('userregister', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $products = Product::paginate(9); // Fetch 9 products per page
        return view('index', ['products' => $products]);
    });
});
Route::get('/', function () {
    $products = Product::paginate(9); // Fetch 9 products per page
    return view('index', ['products' => $products]);
});

Route::post('userlogout', [AuthController::class, 'logout'])->name('logout');

// Pages routes 
Route::get('store', [HomeController::class, 'storepage'])->name('store');
// Route::get('storesingle', [HomeController::class, 'single_storepage'])->name('store.single');
Route::get('storesingle/{id}', [HomeController::class, 'single_storepage'])->name('storesingle');
Route::get('about', [HomeController::class, 'aboutpage'])->name('about');
Route::get('contact', [HomeController::class, 'contactpage'])->name('contact');
Route::get('cart', [HomeController::class, 'cartpage'])->name('cart');
Route::get('cart_remove/{id}', [HomeController::class, 'cartremove']);
Route::post('cart_delete_selected', [HomeController::class, 'deleteSelected'])->name('cart.deleteSelected');

Route::post('add-to-cart/{productId}', [HomeController::class, 'addToCart'])->name('add.to.cart');

Route::get('checkout', [HomeController::class, 'checkoutpage'])->name('checkout');

// Dashboard Routes 

// Route::get('login', [AuthDashboartController::class, 'loginpage']);
Route::get('/login', [AuthDashboartController::class, 'showLoginForm']);
Route::post('/login', [AuthDashboartController::class, 'login']);
Route::get('/logout', [AuthDashboartController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('admin');

// Dashboard Products routes 

Route::get('products_list', [DashboardProductController::class, 'show']);
// Route::get('products', [DashboardProductController::class, 'show']);
Route::get('/create', [DashboardProductController::class, 'index']);
Route::post('/store', [DashboardProductController::class, 'store']);
Route::get('/edit/{id}', [DashboardProductController::class, 'edit']);
Route::post('/update/{id}', [DashboardProductController::class, 'update']);
Route::get('/delete/{id}', [DashboardProductController::class, 'destroy']);

// Dashboard Category routes 

Route::get('category_list', [DashboardCategoryController::class, 'index']);
Route::get('category', [DashboardCategoryController::class, 'create']);
Route::post('store_category', [DashboardCategoryController::class, 'store']);
Route::get('categories_edit/{id}', [DashboardCategoryController::class, 'edit']);
Route::post('update_category/{id}', [DashboardCategoryController::class, 'update']);
Route::get('categories_delete/{id}', [DashboardCategoryController::class, 'destroy']);

// Dashboard User Routes 

Route::get('user_list', [UserDashboartController::class, 'index']);
Route::get('add_user', [UserDashboartController::class, 'create']);
Route::post('add_user', [UserDashboartController::class, 'store']);
Route::get('edit_user/{id}', [UserDashboartController::class, 'edit']);
Route::post('update/{id}', [UserDashboartController::class, 'update']);
Route::get('delete_user/{id}', [UserDashboartController::class, 'delete']);