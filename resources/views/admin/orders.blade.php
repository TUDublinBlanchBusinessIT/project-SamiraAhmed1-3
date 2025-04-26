@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>All Orders</h2>
    @foreach($orders as $order)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Order #{{ $order->id }}</strong> | Customer: {{ $order->customer->firstname }} {{ $order->customer->surname }} | Total: €{{ number_format($order->total, 2) }}
            </div>
            <div class="card-body">
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name }} - {{ $item->quantity }} × €{{ number_format($item->price, 2) }}</li>
                    @endforeach
                </ul>
                <p>Status: {{ $order->status }}</p>
                
                <!-- Mark as shipped button -->
                @if($order->status !== 'Shipped')
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-sm" onclick="return confirm('Mark this order as shipped?')">
                            📦 Mark as Shipped
                        </button>
                    </form>
                @else
                    <span class="badge badge-success">Shipped</span>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
