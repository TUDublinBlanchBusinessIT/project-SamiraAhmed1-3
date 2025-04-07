<?php
use App\Http\Controllers\CustomerController;

Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');

Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');

Route::get('/', function () {
    return view('welcome');
});


