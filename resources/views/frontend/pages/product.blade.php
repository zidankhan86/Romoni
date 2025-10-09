@extends('frontend.layout.app')

@section('content')
    @push('styles')
        <style>
            .breadcrumb {
                background-color: #fff;
                border-radius: 12px;
                padding: 1rem 1.5rem;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            .breadcrumb-item a {
                color: #2D5F4F;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .title  {
                color: #2D5F4F;
                font-family: 'Playfair Display', serif;
                font-weight: 700;
                font-size: 3rem;
                text-align: center;
                margin-bottom: 60px;
                letter-spacing: -0.5px;
            }

            .breadcrumb-item a:hover {
                color: #D4A5A5;
            }

            .breadcrumb-item.active {
                color: #6B5B4F;
            }

            .search-container {
                max-width: 600px;
                margin: 0 auto;
            }

            .search-container .form-control {
                border: 2px solid #E8DFD0;
                border-radius: 50px;
                padding: 0.75rem 1.5rem;
                background-color: #fff;
                transition: all 0.3s ease;
            }

            .search-container .form-control:focus {
                border-color: #D4A5A5;
                box-shadow: 0 0 0 3px rgba(212, 165, 165, 0.1);
                outline: none;
            }

            .search-container .btn {
                border-radius: 50px;
                padding: 0.75rem 2rem;
                background-color: #2D5F4F;
                border: none;
                color: #fff;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .search-container .btn:hover {
                background-color: #1F4538;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
            }

            .filter-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
                padding: 2rem 0;
            }

            .filter-btn {
                border: 2px solid #E8DFD0;
                background: #fff;
                color: #6B5B4F;
                padding: 0.65rem 1.75rem;
                border-radius: 50px;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
                text-decoration: none;
            }

            .filter-btn:hover {
                background: #D4A5A5;
                border-color: #D4A5A5;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(212, 165, 165, 0.3);
            }

            .filter-btn.btn-dark {
                background: #2D5F4F;
                border-color: #2D5F4F;
                color: #fff;
            }

            .filter-btn.btn-dark:hover {
                background: #1F4538;
                border-color: #1F4538;
            }

            .trending-services {
                padding: 3rem 0;
            }

            .trending-services h3 {
                color: #2D5F4F;
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 3rem;
            }

            .trending-services .service-card {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                border: none;
                border-radius: 16px;
                overflow: hidden;
                background: #fff;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .trending-services .service-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            }

            .trending-services .service-card .card-img-top {
                height: 200px;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .trending-services .service-card:hover .card-img-top {
                transform: scale(1.05);
            }

            .trending-services .card-body {
                flex: 1;
                display: flex;
                flex-direction: column;
                padding: 1.5rem;
            }

            .trending-services .card-subtitle {
                color: #D4A5A5;
                font-size: 0.75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 0.5rem;
            }

            .trending-services .card-title {
                font-size: 1.1rem;
                font-weight: 700;
                margin-bottom: 0.75rem;
                color: #2D2D2D;
            }

            .trending-services .card-title a {
                color: #2D2D2D;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .trending-services .card-title a:hover {
                color: #2D5F4F;
            }

            .trending-services .card-body small {
                color: #8B7E74;
                font-size: 0.85rem;
            }

            .trending-services .card-body h5 {
                color: #2D5F4F;
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .trending-services .btn-purple {
                background-color: #2D5F4F;
                color: #fff;
                border-radius: 12px;
                border: none;
                padding: 0.75rem 1.5rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
            }

            .trending-services .btn-purple:hover {
                background-color: #1F4538;
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
            }

            .trending-services .no-products {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 200px;
                text-align: center;
                width: 100%;
            }

            .trending-services .no-products .alert {
                background-color: #FFF8E7;
                border: 2px solid #F5E6C8;
                color: #8B7E74;
                border-radius: 12px;
                padding: 1.5rem 2rem;
                font-weight: 600;
            }

            @media (min-width: 768px) {
                .trending-services .row-cols-md-4 .col {
                    display: flex;
                    justify-content: center;
                }
            }

            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;600;700&display=swap');
        </style>
    @endpush


    <section class="mt-5">
        <div class="container px-4 px-lg-5">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light p-2 rounded">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>

            <h2 class="text-center title fw-bold mb-4">Our Services</h2>

            <div class="mb-4 search-container">
                <form method="GET" action="{{ route('product.page') }}" class="d-flex justify-content-center">
                    <input type="text" class="form-control me-2" name="query" placeholder="Search for Services..."
                        value="{{ request('query') }}">
                    <button type="submit" class="btn">
                        <i class="bi-search"></i> Search
                    </button>
                </form>
            </div>

            <div class="py-3">
                <div class="filter-container">
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

            <div class="trending-services py-5">
                <div class="container">
                    <h3 class="text-center mb-4">
                        {{ request('category') ? ucfirst(str_replace('-', ' ', request('category'))) : 'All Services' }}
                    </h3>

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
                                        <h6 class="card-subtitle mb-1">
                                            {{ $item->category->name ?? 'Uncategorized' }}
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a>
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
