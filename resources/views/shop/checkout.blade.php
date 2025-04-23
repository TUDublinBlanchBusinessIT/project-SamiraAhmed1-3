@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #f5f5dc; border-radius: 10px; padding: 2rem;">
    <h2 class="mb-4 text-center">🧾 Checkout</h2>

    @if(count($cart) > 0)
        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <p class="text-center">You're about to place an order for <strong>{{ count($cart) }}</strong> item(s).</p>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Place Order</button>
            </div>
        </form>
    @else
        <p class="text-center">Your cart is empty.</p>
    @endif
</div>
@endsection
