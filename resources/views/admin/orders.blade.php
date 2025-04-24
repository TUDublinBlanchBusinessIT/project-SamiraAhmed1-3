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
            </div>
        </div>
    @endforeach
</div>
@endsection
