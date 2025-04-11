<?php

namespace App\Http\Controllers\Auth;

use App\Models\User; // Admin User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin_login'); // Show the admin login form
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard'); // Redirect to the admin dashboard
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/admin/login'); // Redirect to admin login page after logout
    }
}
