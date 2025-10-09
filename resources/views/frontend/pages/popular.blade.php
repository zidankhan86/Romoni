@extends('frontend.layout.app')

@push('styles')
@endpush
<style>
            /* Complete redesign with modern, elegant aesthetic */

            :root {

                --color-rose: #D4A5A5;
                --color-rose-dark: #B88B8B;
                --color-green: #2D5F4F;
                --color-green-dark: #1F4438;
                --color-charcoal: #2C2C2C;
                --color-gray: #6B6B6B;
                --color-light-gray: #E8E4DC;
                --color-white: #FFFFFF;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                background-color: var(--color-cream);
                color: var(--color-charcoal);
                line-height: 1.6;
            }

            .services-section .card-title-overlay {
                position: absolute;
                bottom: 30px;
                left: 30px;
                color: var(--color-white);
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 1.8rem;
                font-weight: 600;
                text-shadow: 2px 2px 12px rgba(0, 0, 0, 0.4);
                z-index: 2;
                letter-spacing: -0.01em;
            }

            /* Trending Services - Refined Cards */
            .trending-services {
                background-color: var(--color-cream);
                padding: 80px 0;
            }

            .trending-services h2 {
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 2.5rem;
                font-weight: 600;
                color: var(--color-green);
                margin-bottom: 50px;
                letter-spacing: -0.01em;
            }

            .trending-services .service-card {
                width: 100%;
                max-width: 320px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                background: var(--color-white);
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
                transition: all 0.3s ease;
                border: none;
            }

            .trending-services .service-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
            }

            .trending-services .service-card .card-img-top {
                height: 240px;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .trending-services .service-card:hover .card-img-top {
                transform: scale(1.05);
            }


            .trending-services .card-subtitle {
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                color: var(--color-rose);
                font-weight: 600;
                margin-bottom: 8px;
            }

            .trending-services .card-title {
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--color-charcoal);
                margin-bottom: 12px;
                line-height: 1.4;
            }

            .trending-services .card-title a {
                color: inherit;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .trending-services .card-title a:hover {
                color: var(--color-green);
            }

            .trending-services .text-dark {
                color: var(--color-charcoal) !important;
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 16px;
            }

            .trending-services .btn-purple {
                background-color: var(--color-green);
                color: var(--color-white);
                border: none;
                border-radius: 8px;
                padding: 12px 24px;
                font-weight: 600;
                font-size: 0.9rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                transition: all 0.3s ease;
            }

            .trending-services .btn-purple:hover {
                background-color: var(--color-green-dark);
                color: var(--color-white);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
            }

            .trending-services .btn-outline-purple {
                border: 2px solid var(--color-green);
                color: var(--color-green);
                background: transparent;
                border-radius: 8px;
                padding: 14px 40px;
                font-weight: 600;
                font-size: 0.9rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                transition: all 0.3s ease;
            }

            .trending-services .btn-outline-purple:hover {
                background-color: var(--color-green);
                color: var(--color-white);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
            }



            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.5rem;
                }

                .feature-icons {
                    gap: 40px;
                }

                .services-section h2,
                .trending-services h2,
                .testimonials-section h2 {
                    font-size: 2rem;
                }

                .services-section .service-card img.first-service {
                    height: 300px;
                }

                .services-section .service-card img.other-service {
                    height: 220px;
                }

                .services-section .card-title-overlay {
                    font-size: 1.4rem;
                    bottom: 20px;
                    left: 20px;
                }
            }


        </style>
@section('content')
    <!-- Trending Services -->
    <section class="trending-services">

        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light p-2 rounded">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Popular</li>
                </ol>
            </nav>
            <h2 class="text-center">Popular Services</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">

                @forelse ($products as $item)
                    <!-- Service Card -->
                    <div class="col">
                        <div class="card h-100 service-card">
                            <a href="{{ route('product.details', $item->slug) }}"><img src="{{ url($item->image) }}"
                                    class="card-img-top quick-view-btn" alt="{{ $item->name }}" style="cursor: pointer;"
                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                    data-price="{{ number_format($item->price, 2) }}" data-image="{{ url($item->image) }}"
                                    data-description="{{ $item->description }}"
                                    title="Quick View of {{ $item->name }}"></a>

                            <div class="card-body d-flex flex-column">
                                <h6 class="card-subtitle">{{ $item->category->name }}</h6>
                                <h5 class="card-title"><a
                                        href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a></h5>
                                <div class="d-flex justify-content-between mt-2 mb-2">
                                    <small style="color: var(--color-gray);"><i class="fas fa-clock"></i>
                                        {{ $item->time }} min</small>
                                </div>
                                <h5 class="text-dark">৳ {{ number_format($item->price, 2) }}</h5>
                                <a href="{{ route('cart.add', $item->id) }}" class="btn btn-purple mt-auto w-100">Add to
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="{{route('product.page')}}" class="btn btn-outline-purple">View All Services</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
