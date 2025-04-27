<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController; // Ensure this is imported

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

// Customer shopping routes
Route::get('/shop', [ShoppingController::class, 'index'])->middleware('auth:customer')->name('shop');
Route::get('/shop/wool', [ShoppingController::class, 'wool'])->middleware('auth:customer')->name('shop.wool');
Route::get('/shop/cotton', [ShoppingController::class, 'cotton'])->middleware('auth:customer')->name('shop.cotton');
Route::get('/shop/acrylic', [ShoppingController::class, 'acrylic'])->middleware('auth:customer')->name('shop.acrylic');
Route::get('/shop/knitting-needles', [ShoppingController::class, 'knittingNeedles'])->middleware('auth:customer')->name('shop.knittingNeedles');
Route::get('/add-to-cart/{id}', [ShoppingController::class, 'addToCart'])->middleware('auth:customer')->name('cart.add');
Route::get('/cart', [ShoppingController::class, 'cart'])->middleware('auth:customer')->name('cart.index');
Route::get('/checkout', [ShoppingController::class, 'checkout'])->middleware('auth:customer')->name('checkout.index');
Route::post('/checkout', [ShoppingController::class, 'placeOrder'])->middleware('auth:customer')->name('checkout.place');

// 🛠️ Admin-only routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/customers', [UserController::class, 'viewCustomers'])->name('admin.customers');
    Route::get('/admin/orders', [UserController::class, 'viewOrders'])->name('admin.orders');
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // 🗑️ Delete customer route
    Route::delete('/admin/customers/{id}', [UserController::class, 'deleteCustomer'])->name('admin.customers.delete');
    
    // PUT route for updating order status
    Route::put('/admin/orders/{id}', [UserController::class, 'updateOrder'])->name('admin.orders.update');
});
