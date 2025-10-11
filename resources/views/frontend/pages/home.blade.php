@extends('frontend.layout.app')

@section('content')
    {{-- hero --}}

    @include('frontend.components.fixed.hero')

    @push('styles')
        <style>
            /* Complete redesign with modern, elegant aesthetic */

            :root {
                --color-cream: #F5F1E8;
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

            /* Hero Section - Elegant and Spacious */
            .hero-section {
                background: linear-gradient(135deg, var(--color-white) 0%, var(--color-cream) 100%);
                padding: 100px 0 80px;
                text-align: center;
            }

            .hero-title {
                font-family: 'Playfair Display', Georgia, serif;
                color: var(--color-charcoal);
                font-size: 3.5rem;
                font-weight: 600;
                letter-spacing: -0.02em;
                line-height: 1.2;
                margin-bottom: 2rem;
            }

            .feature-icons {
                display: flex;
                justify-content: center;
                gap: 60px;
                margin-top: 60px;
                flex-wrap: wrap;
            }

            .feature-icons .icon-box {
                text-align: center;
                max-width: 280px;
                padding: 0 15px;
            }

            .feature-icons .icon-box i {
                font-size: 2.5rem;
                color: var(--color-green);
                margin-bottom: 20px;
                display: block;
            }

            .feature-icons .icon-box p {
                font-size: 0.95rem;
                color: var(--color-gray);
                line-height: 1.7;
                margin: 0;
            }

            /* Services Section - Modern Grid */
            .services-section {
                background-color: var(--color-white);
                padding: 80px 0;
            }

            .services-section h2 {
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 2.5rem;
                font-weight: 600;
                color: var(--color-charcoal);
                margin-bottom: 50px;
                letter-spacing: -0.01em;
            }

            .services-section .service-card {
                width: 100%;
                margin: 0 auto;
                overflow: hidden;
                border-radius: 16px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            }

            .services-section .service-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.5) 100%);
                z-index: 1;
                transition: opacity 0.4s ease;
            }

            .services-section .service-card:hover::before {
                opacity: 0.8;
            }

            .services-section .service-card img {
                width: 100%;
                object-fit: cover;
                display: block;
                transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .services-section .service-card img.first-service {
                height: 400px;
            }

            .services-section .service-card img.other-service {
                height: 280px;
            }

            .services-section .service-card:hover img {
                transform: scale(1.08);
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

            .trending-services .card-body {
                flex: 1;
                display: flex;
                flex-direction: column;
                padding: 24px;
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

            /* Testimonials Section - Elegant Cards */
            .testimonials-section {
                background: linear-gradient(135deg, var(--color-white) 0%, #FAF8F3 100%);
                padding: 80px 0;
            }

            .testimonials-section h2 {
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 2.5rem;
                font-weight: 600;
                color: var(--color-charcoal);
                margin-bottom: 60px;
                letter-spacing: -0.01em;
            }

            .testimonials-section .card {
                border: none;
                border-radius: 16px;
                padding: 32px;
                background: var(--color-white);
                box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
                transition: all 0.3s ease;
                height: 100%;
                min-height: 320px;
            }

            .testimonials-section .card:hover {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                transform: translateY(-4px);
            }

            .testimonials-section .card-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: var(--color-charcoal);
                margin-bottom: 8px;
            }

            .testimonials-section .badge {
                background-color: var(--color-rose) !important;
                color: var(--color-white);
                font-size: 0.7rem;
                font-weight: 600;
                letter-spacing: 0.05em;
                padding: 6px 12px;
                border-radius: 20px;
            }

            .testimonials-section .text-warning i {
                color: #F4A261;
                font-size: 0.9rem;
            }

            .testimonials-section .text-muted {
                color: var(--color-gray) !important;
                font-size: 0.85rem;
            }

            .testimonials-section p {
                color: var(--color-gray);
                line-height: 1.7;
                font-size: 0.95rem;
                margin-top: 16px;
            }

            .testimonials-section .rounded-circle {
                border: 3px solid var(--color-light-gray);
            }

            .testimonials-section .btn-outline-secondary {
                border: 2px solid var(--color-charcoal);
                color: var(--color-charcoal);
                background: transparent;
                width: 48px;
                height: 48px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .testimonials-section .btn-outline-secondary:hover {
                background-color: var(--color-charcoal);
                color: var(--color-white);
                border-color: var(--color-charcoal);
                transform: scale(1.1);
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

            @media (max-width: 576px) {
                .hero-section {
                    padding: 60px 0 50px;
                }

                .hero-title {
                    font-size: 2rem;
                }

                .feature-icons {
                    gap: 30px;
                    margin-top: 40px;
                }

                .services-section,
                .trending-services,
                .testimonials-section {
                    padding: 60px 0;
                }
            }
        </style>
    @endpush

    <section class="">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="container">
                    <h1 class="hero-title">The Future Of Beauty</h1>
                    <div class="feature-icons">
                        <div class="icon-box">
                            <i class="fas fa-home"></i>
                            <p>Ultimate Convenience, book anywhere within 5 minutes, and the same day, and next day</p>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-users"></i>
                            <p>Accessible luxury services at affordable prices provided by homecomers with years of
                                expertise</p>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-gem"></i>
                            <p>Premium quality & hygiene services, oils, creams, and branded products</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="services-section">
                <div class="container">
                    <h2 class="text-center">Our Services</h2>
                    <div class="row g-4">

                        <!-- Body Care (First - Large) -->
                        <div class="col-12">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/6620920/pexels-photo-6620920.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=159&w=826"
                                    alt="Body Care" class="img-fluid first-service">
                                <h5 class="card-title-overlay">Body Care</h5>
                            </div>
                        </div>

                        <!-- Other Services (Smaller) -->
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/4150799/pexels-photo-4150799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Makeover" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Makeover</h5>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/3765119/pexels-photo-3765119.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Bridal" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Bridal</h5>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/4492045/pexels-photo-4492045.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Packages" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Packages</h5>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/5069389/pexels-photo-5069389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Hair Removal" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Hair Removal</h5>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/3993449/pexels-photo-3993449.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Hairstyle" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Hairstyle</h5>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-6">
                            <div class="service-card position-relative">
                                <img src="https://images.pexels.com/photos/5732996/pexels-photo-5732996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                    alt="Henna Art" class="img-fluid other-service">
                                <h5 class="card-title-overlay">Henna Art</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Trending Services -->
            <section class="trending-services">
                <div class="container">
                    <h2 class="text-center">Trending Services</h2>
                    <div class="row row-cols-1 row-cols-md-4 g-4">

                        @forelse ($products as $item)
                            <!-- Service Card -->
                            <div class="col">
                                <div class="card h-100 service-card">
                                    <a href="{{ route('product.details', $item->slug) }}"><img src="{{ url($item->image) }}"
                                            class="card-img-top quick-view-btn" alt="{{ $item->name }}"
                                            style="cursor: pointer;" data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-price="{{ number_format($item->price, 2) }}"
                                            data-image="{{ url($item->image) }}" data-description="{{ $item->description }}"
                                            title="Quick View of {{ $item->name }}"></a>

                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-subtitle">{{ $item->category->name }}</h6>
                                        <h5 class="card-title"><a href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a></h5>
                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <small style="color: var(--color-gray);"><i class="fas fa-clock"></i> {{ $item->time }}</small>
                                        </div>
                                        <h5 class="text-dark">৳ {{ number_format($item->price, 2) }}</h5>
                                        <a href="{{ route('cart.add', $item->id) }}"
                                            class="btn btn-purple mt-auto w-100">Add to Cart</a>
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

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 testimonials-section">
        <div class="container">
            <h2 class="text-center">What Our Customers Are Saying</h2>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">

                    @php
                        $chunks = $testimonials->chunk(3); // 3 testimonials per slide
                    @endphp

                    @foreach ($chunks as $key => $chunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $testimonial)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title">{{ $testimonial->name }}</h5>
                                                @if ($testimonial->is_verified)
                                                    <span class="badge rounded-pill">
                                                        <i class="bi bi-check-circle me-1"></i>VERIFIED
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="text-warning mt-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                @endfor
                                            </div>

                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($testimonial->created_at)->format('d M, Y') }}</small>
                                            <p>{{ $testimonial->review }}</p>

                                            <div class="mt-auto d-flex align-items-center">
                                                <img src="{{ $testimonial->image ? asset('uploads/testimonials/' . $testimonial->image) : 'https://via.placeholder.com/40' }}"
                                                    alt="User" class="rounded-circle me-2"
                                                    style="width: 40px; height: 40px;">
                                                <small class="text-muted">{{ $testimonial->service ?? '' }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Controls -->
                <div class="text-center mt-4">
                    <button class="btn btn-outline-secondary mx-2" type="button"
                        data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button"
                        data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carouselElement = document.getElementById('testimonialCarousel');
                const carousel = new bootstrap.Carousel(carouselElement, {
                    interval: 5000,
                    ride: 'carousel'
                });
            });
        </script>
    @endpush
@endsection
