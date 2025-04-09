<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/shop', [ShoppingController::class, 'index'])->name('shop');
