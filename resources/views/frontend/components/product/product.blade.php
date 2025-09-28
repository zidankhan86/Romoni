@push('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .categories-section {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .categories-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .categories-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .category-card {
            width: 120px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-sizing: border-box;
        }

        .category-card img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .category-card p {
            margin: 10px 0 0;
            font-size: 14px;
            color: #e63946;
        }
    </style>


    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .categories-section {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .categories-section h2 {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .categories-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-between;
        }

        .category-card {
            width: 16%;
            /* Ensures that 6 items fit side by side */
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
        }

        .category-card i {
            font-size: 1.4rem;
            /* Smaller icon size */
            margin-bottom: 6px;
        }

        .category-card p {
            margin-top: 6px;
            font-size: 12px;
            color: #e63946;
        }

        /* Responsive grid */
        @media (max-width: 300px) {
            .category-card {
                width: 38%;
                /* Stack the cards on small screens */
            }
        }

        @media (max-width: 350px) {
            .category-card {
                width: 30%;
                /* Adjust to 3 cards per row on medium screens */
            }
        }
    </style>

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Hero Section */
        .hero-section {
            background-color: #f8f9fa;
            padding: 60px 0;
            text-align: center;
        }

        .hero-title {
            color: #800080;
            font-size: 2.5rem;
            font-weight: bold;
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
    <style>
        .carousel-item .card {
            min-height: 300px;
            /* Fixed min height for cards */
        }

        .text-warning i {
            color: #ffc107;
            /* Gold stars */
        }

        .btn-primary:hover {
            background-color: #6a006a;
            border-color: #6a006a;
        }
    </style>
@endpush


<div class="mb-5 text-center">
    <section class="categories-section">
        <h1 class="text-center mb-4">Popular Services</h1>
        <div class="categories-grid">
            @forelse ($categories as $category)
                <div class="category-card">
                    <a href="{{ route('home', ['category' => $category->slug]) }}" class="text-decoration-none">
                        <i class="{{ $category->icon }} fs-1 text-dark"></i>
                        <p class="mt-2" style="color: black">{{ Str::limit($category->name, 15) }}</p>
                    </a>

                </div>
            @empty
                <h3 class="text-center">No Category Found</h3>
            @endforelse
        </div>
    </section>
</div>

<!-- Ad Banner -->
{{-- <div class="mb-5 text-center">
    <a href="{{ route('banner.click') }}">
        <img src="{{ asset('image.png') }}" alt="Ad Banner" class="img-fluid rounded shadow-sm"
            style="max-height: 300px;">
    </a>
</div> --}}
<section class="">
    <div class="container px-4 px-lg-5">
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
        <section class="services-section py-5">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Our Services</h2>
                <div class="row g-4">

                    <!-- Body Care (First - Large) -->
                    <div class="col-12">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/6620920/pexels-photo-6620920.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=159&w=826"
                                alt="Body Care" class="img-fluid rounded first-service">
                            <h5 class="card-title-overlay">Body Care</h5>
                        </div>
                    </div>

                    <!-- Other Services (Smaller) -->
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/4150799/pexels-photo-4150799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Makeover" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Makeover</h5>
                        </div>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/3765119/pexels-photo-3765119.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Bridal" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Bridal</h5>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/4492045/pexels-photo-4492045.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Packages" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Packages</h5>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/5069389/pexels-photo-5069389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Hair Removal" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Hair Removal</h5>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/3993449/pexels-photo-3993449.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Hairstyle" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Hairstyle</h5>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-6">
                        <div class="service-card position-relative">
                            <img src="https://images.pexels.com/photos/5732996/pexels-photo-5732996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=136&w=398"
                                alt="Henna Art" class="img-fluid rounded other-service">
                            <h5 class="card-title-overlay">Henna Art</h5>
                        </div>
                    </div>

                </div>
            </div>
        </section>






        <section class="trending-services py-5">
            <div class="container">
                <h2 class="text-center mb-4" style="color: #6a0dad;">Trending Services</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">

                    @forelse ($products as $item)
                        <!-- Service Card 1 -->
                        <div class="col">
                            <div class="card h-100 service-card">
                                <img src="{{ url($item->image) }}" class="card-img-top quick-view-btn"
                                    alt="{{ $item->name }}" style="cursor: pointer;" data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}" data-price="{{ number_format($item->price, 2) }}"
                                    data-image="{{ url($item->image) }}" data-description="{{ $item->description }}"
                                    title="Quick View of {{ $item->name }}">

                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-subtitle mb-1 text-muted">MANICURE AND PEDICURE</h6>
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <div class="d-flex justify-content-between mt-2 mb-2">
                                        <small><i class="fas fa-clock"></i> 85 min</small>
                                        <small><i class="fas fa-user"></i> 17,892 orders</small>
                                    </div>
                                    <h5 class="text-dark mb-3">৳ {{ number_format($item->price, 2) }}</h5>
                                    <a href="{{ route('cart.add', $item->id) }}" class="btn btn-purple mt-auto w-100">ADD TO CART</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <!-- View All Button -->
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-outline-purple">VIEW ALL SERVICES</a>
                </div>
            </div>
        </section>



        <!-- Product Grid -->
        {{-- <div class="row gx-4 gx-lg-5 mt-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @forelse ($products as $item)
                <div class="col mb-5">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Product image-->
                        <div class="product-image-container position-relative">
                            <a href="{{ route('product.details', $item->slug) }}">
                                <img class="card-img-top" src="{{ url($item->image) }}"
                                    alt="{{ $item->name }}" />
                            </a>
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <button class="btn btn-dark btn-sm quick-view-btn rounded-pill px-3 shadow-sm"
                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                    data-price="{{ number_format($item->price, 2) }}"
                                    data-image="{{ url('/public/uploads/', $item->image) }}"
                                    data-description="{{ $item->description }}" title="Quick View"
                                    aria-label="Quick view of {{ $item->name }}"
                                    style="display: inline-flex; align-items: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </button>

                            </div>
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4 text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder text-truncate" title="{{ $item->name }}">{{ $item->name }}</h5>
                            <!-- Product price-->
                            <p class="text-success fs-5 mb-1">BDT {{ number_format($item->price, 2) }}</p>
                        </div>
                        <!-- Product actions-->
                        <div class="text-center">
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-dark btn-sm flex-grow-1 me-2"
                                        href="{{ route('cart.add', $item->id) }}">
                                        <i class="bi bi-cart-check-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center text-danger">No Data Found</h3>
            @endforelse
        </div> --}}


    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #800080; font-weight: bold;">What Our Customers Are Saying</h2>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- First slide with 3 cards -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Afrin Khan</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">13 SEP, 2024</small>
                                <p class="mt-2">I had an excellent experience with Romoni's full body waxing service.
                                    The results were outstanding, and Tumpa Apu was incredibly kind and made me feel at
                                    ease throughout the process. I will definitely return for their services. A special
                                    thanks to Shaila Apu for recommending Romoni to me, much appreciated!</p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Full Body Waxing(with Bikini Wax)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Sania Ahmed</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">17 SEP, 2024</small>
                                <p class="mt-2">I took full body waxing service. Tumpa did it very well. She is so
                                    humble and well behaved also expert in her work. Thanks for this very good service.
                                </p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Full Body Waxing(No Bikini Wax)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Nisha Tushi</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">19 SEP, 2024</small>
                                <p class="mt-2">This is my 3rd time service that I'm taking from Romoni. I took milk
                                    protein facial for my ammu. Lucky apu provided the service. Apu ato shundor koreche.
                                    Thank you Romoni and lucky apu ❤️</p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Milk Protein Facial</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second slide with next 3 cards -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">John Doe</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">20 SEP, 2024</small>
                                <p class="mt-2">Excellent service and very professional staff. Highly recommended!
                                </p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Facial Treatment</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Jane Smith</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">21 SEP, 2024</small>
                                <p class="mt-2">The best beauty experience I've had. Will come back soon.</p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Hair Styling</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow-sm rounded-3 p-3" style="height: 100%;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Alice Johnson</h5>
                                    <span class="badge bg-secondary rounded-pill"><i
                                            class="bi bi-check-circle me-1"></i>VERIFIED</span>
                                </div>
                                <div class="text-warning mt-1">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <small class="text-muted">22 SEP, 2024</small>
                                <p class="mt-2">Amazing results and friendly service. Thank you!</p>
                                <div class="mt-auto d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="User"
                                        class="rounded-circle me-2" style="width: 40px; height: 40px;">
                                    <small class="text-muted">Makeover Package</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary rounded-pill px-4"
                    style="background-color: #800080; border-color: #800080;">VIEW ALL REVIEWS</a>
                <button class="btn btn-outline-secondary mx-2 rounded-circle" type="button"
                    data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-outline-secondary rounded-circle" type="button"
                    data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>





{{-- Quick View Modal --}}
<div class="modal fade" id="productQuickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickViewModalLabel">Service Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="quickViewImage" src="" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4 id="quickViewName"></h4>
                        <h5 class="text-success mb-3">BDT <span id="quickViewPrice"></span></h5>
                        <p id="quickViewDescription"></p>
                        <button class="btn btn-dark mt-3">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const modal = new bootstrap.Modal(document.getElementById('productQuickViewModal'));

            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.dataset.name;
                    const price = this.dataset.price;
                    const image = this.dataset.image;
                    const description = this.dataset.description;

                    document.getElementById('quickViewName').textContent = name;
                    document.getElementById('quickViewPrice').textContent = price;
                    document.getElementById('quickViewImage').src = image;
                    document.getElementById('quickViewDescription').textContent = description;

                    modal.show();
                });
            });
        });
    </script>
@endpush
