@extends('layouts.app')

@section('content')
<div style="background-color: #f5f5dc; min-height: 100vh; padding: 2rem 0;">

    <!-- Header Section with a more subtle banner -->
    <div class="text-center mb-4">
        <h1 style="font-family: 'Dancing Script', cursive; color: black; font-size: 2.5rem; margin-bottom: 1rem;">
            🧶 Welcome to our Shop
        </h1>

        <!-- Banner Image Container with Motto Text Overlay -->
        <div class="mx-auto" style="max-width: 1200px; position: relative; overflow: hidden;">

            <!-- Banner Image (Landscape Style) -->
            <img src="{{ asset('storage/images/banner.png') }}"
                 alt="Knit & Knot Banner"
                 class="img-fluid rounded shadow"
                 style="width: 100%; height: 350px; object-fit: cover; border-radius: 12px;">

            <!-- Motto Text Overlay on top of the banner image -->
            <div class="banner-overlay"
                 style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); color: white; display: flex; justify-content: center; align-items: center; font-size: 2.5rem; font-weight: bold; z-index: 1; font-family: 'Playfair Display', serif; letter-spacing: 2px;">
                <p>Crafting the Future, One Yarn at a Time</p>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Product Carousel -->
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($products->chunk(3) as $chunkIndex => $chunk) <!-- Group products in chunks of 3 for each carousel slide -->
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-lg h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease;">
                                        @if($product->image)
                                            <a href="#" data-toggle="modal" data-target="#imageModal{{ $product->id }}">
                                                <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                                            </a>
                                        @else
                                            <a href="#">
                                                <img src="{{ asset('images/default_yarn.png') }}" class="card-img-top" alt="No Image" style="height: 250px; object-fit: cover;">
                                            </a>
                                        @endif

                                        <div class="card-body" style="background-color: #fff5e6; padding: 20px;">
                                            <h5 class="card-title" style="font-size: 1.2rem; font-weight: bold;">{{ $product->name }}</h5>
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
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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

<!-- Smooth Scroll for Better User Experience -->
<script>
    document.querySelector('html').style.scrollBehavior = 'smooth';
</script>

@endsection
