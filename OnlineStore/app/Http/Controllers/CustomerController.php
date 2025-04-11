<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Show the form to create a new customer
    public function create()
    {
        return view('customers.new'); // This will render the 'new.blade.php' view
    }

    // Store the new customer in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'firstname' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new customer record
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password); // Hash the password
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();

        // Redirect to the login page after successful customer creation
        return redirect()->route('customer.login-new')->with('success', 'Account created successfully! Please login.');
    }
}
