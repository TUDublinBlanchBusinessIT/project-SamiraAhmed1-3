<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\CustomerLoginController;  // Customer Login Controller
use App\Http\Controllers\UserController;  // Admin Login Controller
use App\Http\Controllers\Auth\UserLoginController; // Admin login controller

use Illuminate\Support\Facades\Route;

// Customer registration routes
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');

// Customer login routes
Route::prefix('customer')->name('customer.')->group(function () {
    // Show the customer login form
    Route::get('/login-new', [CustomerLoginController::class, 'showNewLoginForm'])->name('login-new'); 

    // Handle customer login request
    Route::post('/login', [CustomerLoginController::class, 'login'])->name('login');  

    // Handle customer logout
    Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('logout');
});

// Customer dashboard route (protected by 'auth:customer' middleware)
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');  // Create this view for the customer dashboard
})->middleware('auth:customer');

// Admin login routes
Route::get('admin/login', [UserLoginController::class, 'showLoginForm'])->name('admin.login');  // GET request to show the admin login form
Route::post('admin/login', [UserLoginController::class, 'login'])->name('admin.login.post');  // POST request to handle admin login
Route::post('admin/logout', [UserLoginController::class, 'logout'])->name('admin.logout');  // Handle admin logout

// Home route (accessible for logged-in users)
Route::get('/', function () {
    return view('welcome');
});

// Default authentication routes (for user login/registration)
Auth::routes();  // This will automatically handle registration and login for default users (admins)

// Authenticated home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Shop route for customers to browse products
Route::get('/shop', [ShoppingController::class, 'index'])->name('shop');  // The shop route is for customers
