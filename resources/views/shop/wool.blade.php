@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">🧶 Wool Collection</h1>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    @if($product->image)
                        <a href="#">
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                        </a>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"><strong>Material:</strong> {{ $product->material }}</p>
                        <p class="card-text"><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No wool products available right now.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
