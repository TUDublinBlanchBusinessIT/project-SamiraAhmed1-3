<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    // Show the customer login form
    public function showLoginForm()
    {
        return view('auth.customer_login'); // Show the login form for customers
    }

    // Handle customer login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');
        
        // Attempt to log the customer in using the 'customer' guard
        if (Auth::guard('customer')->attempt($credentials)) {
            // Redirect to the customer dashboard if login is successful
            return redirect()->intended('/shop'); // Redirect to customer dashboard
        }

        // Return error if login fails
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle customer logout
    public function logout()
    {
        // Log the customer out using the 'customer' guard
        Auth::guard('customer')->logout();
        // Redirect to the customer login page after logout
        return redirect('/customer/login');
    }
}
