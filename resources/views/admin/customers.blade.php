@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Registered Customers</h2>

    <!-- Back to Dashboard Button -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-3">🏠 Back to Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th> <!-- New column for delete button -->
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->firstname }} {{ $customer->surname }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑️ Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Auto-hide the success alert after 2 seconds -->
<script>
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        }
    }, 2000);
</script>
@endsection
