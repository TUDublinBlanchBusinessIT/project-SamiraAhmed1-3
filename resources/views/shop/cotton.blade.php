@extends('layouts.app')

@section('content')
<div style="background-color: #f5f5dc; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <h1 class="text-center mb-4" style="font-family: 'Dancing Script', cursive; color: black; font-size: 3rem;">
            🌾 Cotton Collection
        </h1>

        <div class="row">
            @forelse($products as $product) <!-- Using $products here -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($product->image)
                            <a href="#" data-toggle="modal" data-target="#cottonModal{{ $product->id }}">
                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                     class="card-img-top"
                                     alt="{{ $product->name }}"
                                     style="height: 250px; object-fit: cover;">
                            </a>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Material:</strong> {{ $product->material }}</p>
                            <p class="card-text"><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success btn-block">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Modal for Cotton Product -->
                <div class="modal fade" id="cottonModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="cottonModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content bg-light">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">{{ $product->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                     class="img-fluid"
                                     alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No cotton products available right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
