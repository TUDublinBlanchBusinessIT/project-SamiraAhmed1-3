@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Registered Customers</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->firstname }} {{ $customer->surname }}</td>
                    <td>{{ $customer->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
