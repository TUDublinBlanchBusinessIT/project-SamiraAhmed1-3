<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            return redirect()->intended($this->redirectTo());
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function redirectTo()
    {
        return '/admin/dashboard';
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/admin/login');
    }
}
