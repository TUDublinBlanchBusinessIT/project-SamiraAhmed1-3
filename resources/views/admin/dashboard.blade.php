@extends('layouts.app')

@section('content')
<div class="container">
    <h1>👤 Admin Dashboard</h1>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="{{ route('admin.customers') }}" class="btn btn-outline-primary btn-lg btn-block">
                View All Customers
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.orders') }}" class="btn btn-outline-success btn-lg btn-block">
                View All Orders
            </a>
        </div>
    </div>
</div>
@endsection
