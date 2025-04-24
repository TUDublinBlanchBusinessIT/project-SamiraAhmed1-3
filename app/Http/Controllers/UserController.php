<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;

class UserController extends Controller
{
    // Show the user login form
    public function showLoginForm()
    {
        return view('auth.admin_login'); // Ensure you have the correct path to your view
    }

    // Handle user login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in using the 'web' guard (for admins)
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            // Redirect to the admin dashboard or intended page
            return redirect('/admin/dashboard'); // Ensure /admin/dashboard exists
        }

        // Return error if login fails
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle user logout
    public function logout()
    {
        Auth::guard('web')->logout(); // Log out the user (admin)
        return redirect('/admin/login'); // Redirect to the admin login page
    }

    // Admin: View all customers
    public function viewCustomers()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }

    // Admin: View all orders with relationships
    public function viewOrders()
    {
        $orders = Order::with(['customer', 'items.product'])->get();
        return view('admin.orders', compact('orders'));
    }
}
