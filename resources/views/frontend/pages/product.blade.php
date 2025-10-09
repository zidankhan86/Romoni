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

            /* Center the "No products found" message */
            .trending-services .no-products {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 150px;
                /* Adjust this value if needed */
                text-align: center;
                width: 100%;
            }

            /* Responsive: center cards in row */
            @media (min-width: 768px) {
                .trending-services .row-cols-md-4 .col {
                    display: flex;
                    justify-content: center;
                }
            }
        </style>
        <style>
            .filter-btn {
                border: none;
                outline: none;
                background: #f3f3f3;
                color: #555;
                padding: 8px 20px;
                border-radius: 50px;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin: 5px;
                transition: all 0.3s ease;
            }

            .filter-btn.active {
                background: #9b6cb8;
                /* purple shade */
                color: #fff;
            }

            .filter-btn:hover {
                background: #b78fd0;
                color: #fff;
            }


            .filter-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
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

            <!-- 🧩 Category Filter -->
            <div class="py-3">
                <div class="filter-container d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('product.page') }}"
                        class="filter-btn btn {{ request('category') ? 'btn-outline-dark' : 'btn-dark' }}">
                        All
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('product.page', ['category' => $cat->slug]) }}"
                            class="filter-btn btn {{ request('category') == $cat->slug ? 'btn-dark' : 'btn-outline-dark' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- 🛍️ Product List -->
            <div class="trending-services py-5">
                <div class="container">
                    <h3 class="text-center mb-4" style="color: #6a0dad;">
                        {{ request('category') ? ucfirst(str_replace('-', ' ', request('category'))) : 'All Services' }}
                    </h3>

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @forelse ($products as $item)
                            <div class="col">
                                <div class="card h-100 service-card shadow-sm">
                                    <img src="{{ url($item->image) }}" class="card-img-top quick-view-btn"
                                        alt="{{ $item->name }}" style="cursor: pointer;" data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}" data-price="{{ number_format($item->price, 2) }}"
                                        data-image="{{ url($item->image) }}" data-description="{{ $item->description }}"
                                        title="Quick View of {{ $item->name }}">

                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-subtitle mb-1 text-muted">
                                            {{ $item->category->name ?? 'Uncategorized' }}
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="{{ route('product.details', $item->slug) }}" class="text-decoration-none text-dark">{{ $item->name }}</a>
                                        </h5>
                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <small><i class="fas fa-clock"></i> {{ $item->time }} min</small>
                                            <small><i class="fas fa-user"></i> 17,892 orders</small>
                                        </div>
                                        <h5 class="text-dark mb-3">৳ {{ number_format($item->price, 2) }}</h5>
                                        <a href="{{ route('cart.add', $item->id) }}" class="btn btn-purple mt-auto w-100">
                                            ADD TO CART
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 no-products">
                                <div class="alert alert-warning mx-auto" style="max-width: 400px;">
                                    No services found.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </section>



    @push('scripts')
    @endpush
@endsection
