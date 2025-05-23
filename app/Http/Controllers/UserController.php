<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;

class UserController extends Controller
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
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function viewCustomers()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }

    public function viewOrders()
    {
        $orders = Order::with(['customer', 'items.product'])->get();
        return view('admin.orders', compact('orders'));
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers')->with('success', 'Customer deleted successfully!');
    }

    public function updateOrder($id)
    {
        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if ($order) {
            // Update the status to 'Shipped'
            $order->status = 'Shipped';
            $order->save();
        }

        // Redirect back to the orders page with a success message
        return redirect()->route('admin.orders')->with('status', 'Order marked as shipped!');
    }
}
