<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HomeController;

// Customer registration
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');

Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerLoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('logout');
});

// Customer dashboard
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->middleware('auth:customer');

// Admin login/logout
Route::get('admin/login', [UserLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [UserLoginController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [UserLoginController::class, 'logout'])->name('admin.logout');

// Default routes
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Customer shopping
Route::get('/shop', [ShoppingController::class, 'index'])
    ->middleware('auth:customer')
    ->name('shop');

// ➕ Wool category page
Route::get('/shop/wool', [ShoppingController::class, 'wool'])
    ->middleware('auth:customer')
    ->name('shop.wool');
