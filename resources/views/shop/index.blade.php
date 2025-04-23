@extends('layouts.app')

@section('content')
<div style="background-color: #f5f5dc; min-height: 100vh; padding: 2rem 0;">
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
        @if(session('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($product->image)
                            <a href="#" data-toggle="modal" data-target="#imageModal{{ $product->id }}">
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

                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success btn-block">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imageModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $product->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content bg-light">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">{{ $product->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="{{ asset('storage/images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Fade out alert script -->
<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        }
    }, 2000);
</script>
@endsection
