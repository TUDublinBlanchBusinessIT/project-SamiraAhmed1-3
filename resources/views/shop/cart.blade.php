@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #f5f5dc; border-radius: 10px; padding: 2rem;">
    <h2 class="mb-4 text-center">🛒 Your Shopping Cart</h2>

    @if(count($cart) > 0)
        <table class="table table-bordered bg-white">
            <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price (€)</th>
                    <th>Quantity</th>
                    <th>Total (€)</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/images/' . $item['image']) }}" alt="{{ $item['name'] }}" width="70">
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                    <td><strong>€{{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-center">
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <p class="text-center">Your cart is empty.</p>
    @endif
</div>
@endsection
