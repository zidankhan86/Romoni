@extends('frontend.layout.app')

@section('content')

@push('styles')

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }




        .feature-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }

        .feature-icons .icon-box {
            text-align: center;
        }

        .feature-icons .icon-box i {
            font-size: 2rem;
            color: #800080;
            margin-bottom: 10px;
        }

        /* Services Section */
        .services-section .service-card {
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease;
            position: relative;
            /* For overlay title */
        }

        .services-section .service-card img {
            width: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .services-section .service-card img.first-service {
            height: 159px;
            /* First image larger */
        }

        .services-section .service-card img.other-service {
            height: 136px;
            /* Other images smaller */
        }

        .services-section .service-card:hover {
            transform: scale(1.02);
        }

        /* Overlay card title */
        .services-section .card-title-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            text-align: center;
            pointer-events: none;
            /* Prevent blocking clicks */
        }

        .services-section .card-body {
            padding: 0.5rem 0;
        }

        .services-section .card-title {
            font-size: 1rem;
            margin: 0;
            color: #800080;
        }

        /* Trending Services Section */
        .trending-services .service-card {
            width: 100%;
            max-width: 280px;
            height: 450px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .trending-services .service-card .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .trending-services .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .trending-services .btn-purple {
            background-color: #6a0dad;
            color: #fff;
            border-radius: 5px;
        }

        .trending-services .btn-purple:hover {
            background-color: #4b0082;
            color: #fff;
        }

        .trending-services .btn-outline-purple {
            border: 2px solid #6a0dad;
            color: #6a0dad;
            border-radius: 5px;
            padding: 0.5rem 1.5rem;
        }

        .trending-services .btn-outline-purple:hover {
            background-color: #6a0dad;
            color: #fff;
        }

        .trending-services .bg-pink {
            background-color: #ff69b4;
            color: #fff;
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
        }

        @media (min-width: 768px) {
            .trending-services .row-cols-md-4 .col {
                display: flex;
                justify-content: center;
            }
        }
    </style>

@endpush



<section class="mt-5">
    <div class="container px-4 px-lg-5">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
        </nav>

        <h2 class="text-center fw-bold mb-4">Our Services</h2>

        <!-- Search Bar -->
        <div class="mb-4">
            <form method="GET" action="{{ route('product.page') }}" class="d-flex justify-content-center">
                <input type="text" class="form-control me-2 w-50 shadow-sm" name="query"
                    placeholder="Search for Services..." value="{{ request('query') }}">
                <button type="submit" class="btn btn-dark">
                    <i class="bi-search"></i> Search
                </button>
            </form>
        </div>

        <!-- Services Section -->
        <section class="trending-services py-5">
            <div class="container">
                <h2 class="text-center mb-4" style="color: #6a0dad;">All Services</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">

                    @forelse ($products as $item)
                        <div class="col">
                            <div class="card h-100 service-card">
                                <img src="{{ url($item->image) }}" class="card-img-top quick-view-btn"
                                    alt="{{ $item->name }}" style="cursor: pointer;" data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}" data-price="{{ number_format($item->price, 2) }}"
                                    data-image="{{ url($item->image) }}" data-description="{{ $item->description }}"
                                    title="Quick View of {{ $item->name }}">

                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-subtitle mb-1 text-muted">{{ $item->category->name }}</h6>
                                    <h5 class="card-title"><a href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a></h5>
                                    <div class="d-flex justify-content-between mt-2 mb-2">
                                        <small><i class="fas fa-clock"></i> {{ $item->time }} min</small>
                                        <small><i class="fas fa-user"></i> 17,892 orders</small>
                                    </div>
                                    <h5 class="text-dark mb-3">৳ {{ number_format($item->price, 2) }}</h5>
                                    <a href="{{ route('cart.add', $item->id) }}" class="btn btn-purple mt-auto w-100">ADD TO CART</a>
                                </div>
                            </div>
                        </div>
                    @empty

                            <div class="alert alert-warning" style="text-align: ">
                                No services found.
                            </div>

                    @endforelse

                </div>
            </div>
        </section>

    </div>
</section>


@push('scripts')

@endpush


@endsection
