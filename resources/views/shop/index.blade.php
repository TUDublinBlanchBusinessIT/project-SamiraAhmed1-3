@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h1 style="font-family: 'Dancing Script', cursive; color: black; font-size: 3rem;">
        🧶 Knit & Knot
    </h1>

    <div class="mx-auto" style="max-width: 1000px;">
        <img src="{{ asset('storage/images/banner.png') }}"
             alt="Knit & Knot Banner"
             class="img-fluid rounded shadow"
             style="width: 65%; height: auto; border-radius: 12px;">
    </div>
</div>


    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                    @if($product->image)
    <a href="#">
        <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
    </a>
@else
    <a href="#">
        <img src="{{ asset('images/default_yarn.png') }}" class="card-img-top" alt="No Image" style="height: 250px; object-fit: cover;">
    </a>
@endif


                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Material:</strong> {{ $product->material }}</p>
                            <p class="card-text"><strong>Weight:</strong> {{ $product->weight ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Color:</strong> {{ $product->color ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Length:</strong> {{ $product->length ? $product->length . 'm' : 'N/A' }}</p>
                            <p class="card-text"><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
                            <p class="card-text">{{ $product->description }}</p>

                            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
