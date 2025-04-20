<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Show the registration form for a new customer.
     */
    public function create()
    {
        return view('auth.register'); // Make sure your file is at: resources/views/auth/register.blade.php
    }

    /**
     * Handle storing a new customer.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Customer::create([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('customer.login')->with('success', 'Account created successfully! Please login.');
    }
}
