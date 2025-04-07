@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Customer</h1>
        
        <!-- Display validation errors if any -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Customer Registration Form -->
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf  <!-- CSRF token for security -->
            
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" required>
            </div>

            <div class="form-group">
                <label for="surname">Last Name</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Customer</button>
        </form>
    </div>
@endsection
