<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function showNewLoginForm()
    {
        return view('auth.customer_login'); // Show the login form
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/customer/dashboard'); // Redirect to customer dashboard
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/customer/login-new');  // Redirect to customer login page after logout
    }
}
