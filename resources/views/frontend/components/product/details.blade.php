@extends('frontend.layout.app')
@push('styles')
    <style>
        /* --- Thumbnail Styles --- */
        .thumb-img {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 6px;
            width: 80px;
            height: 80px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .thumb-img.active {
            border-color: #2D5F4F;
            transform: scale(1.05);
        }

        /* --- Main Image --- */
        .main-img,
        #mainImage {
            width: 100%;
            height: 500px;
            border-radius: 12px;
            object-fit: cover;
            object-position: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* --- Gallery Layout --- */
        .gallery-wrapper {
            display: flex;
            gap: 12px;
        }

        .thumbs-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            max-height: 500px;
            padding-right: 6px;
        }

        /* --- Scrollbar Hide for Thumbnails --- */
        .thumbs-container::-webkit-scrollbar {
            width: 5px;
        }

        .thumbs-container::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .gallery-wrapper {
                flex-direction: column;
            }

            .thumbs-container {
                flex-direction: row;
                overflow-x: auto;
                max-height: none;
                max-width: 100%;
            }

            .thumb-img {
                width: 70px;
                height: 70px;
            }

            .main-img,
            #mainImage {
                height: 350px;
            }
        }

        .rating-stars {
            color: #2D5F4F;
            
        }

        .qty-btn {
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
        }

        .qty-input {
            width: 40px;
            text-align: center;
            border: none;
            font-weight: bold;
        }

        .service-card {
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="container py-5">
                <div class="row g-4">

                    <!-- Left Side Gallery -->
                    <div class="col-md-6 d-flex">
                        <div class="gallery-wrapper">
                            <div class="thumbs-container">

                                <img src="{{ asset($product->image) }}" alt="Thumbnail" class="thumb-img active"
                                    onclick="changeImage(this)">


                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->images) }}" alt="Thumbnail"
                                        class="thumb-img {{ $loop->first ? 'active' : '' }}" onclick="changeImage(this)">
                                @endforeach
                            </div>

                            <div class="flex-grow-1">
                                <img src="{{ url($product->image) }}" alt="Product" class="main-img product-image"
                                    id="mainImage">
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Service Info -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <small class="text-uppercase fw-bold text-secondary">{{ $product->category->name }}</small>
                            <h3 class="mt-1">{{ $product->name }}</h3>

                            <!-- Rating -->
                            <div class="d-flex align-items-center mb-2">
                                <div class="rating-stars me-2">
                                    ★★★★★
                                </div>
                                <span class="text-muted">1,629 Reviews</span>
                            </div>

                            <!-- Time & Orders -->
                            <div class="d-flex gap-3 mb-3">
                                <span class="badge bg-light text-dark">
                                    ⏱ {{ $product->time }} MIN
                                </span>

                            </div>

                            <!-- Price -->
                            <h4 class="fw-bold mb-3">৳{{ $product->price }}</h4>

                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-lg w-100 text-white"
                                style="background:#2D5F4F;">
                                ADD TO CART
                            </a>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="mb-5">
            <!-- Bootstrap Tabs -->
            <ul class="nav nav-tabs" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="steps-tab" data-bs-toggle="tab" data-bs-target="#steps"
                        type="button" role="tab" aria-controls="steps" aria-selected="true">Steps</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="benefits-tab" data-bs-toggle="tab" data-bs-target="#benefits"
                        type="button" role="tab" aria-controls="benefits" aria-selected="false">Benefits</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button"
                        role="tab" aria-controls="product" aria-selected="false">Product</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="things-tab" data-bs-toggle="tab" data-bs-target="#things" type="button"
                        role="tab" aria-controls="things" aria-selected="false">Things To Know</button>
                </li>
            </ul>

            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="productTabContent">
                <div class="tab-pane fade show active" id="steps" role="tabpanel" aria-labelledby="steps-tab">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">• Step 1: Prepare the surface</li>
                        <li class="mb-2">• Step 2: Apply the product evenly</li>
                        <li class="mb-2">• Step 3: Let it dry for 10 minutes</li>
                        <li class="mb-2">• Step 4: Finish and clean up</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">• Provides long-lasting results</li>
                        <li class="mb-2">• Easy to apply</li>
                        <li class="mb-2">• Safe for all surfaces</li>
                        <li class="mb-2">• Cost-effective solution</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                    <p>This is a high-quality product designed to make your life easier. It comes with full instructions and
                        all
                        necessary tools included.</p>
                </div>
                <div class="tab-pane fade" id="things" role="tabpanel" aria-labelledby="things-tab">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">• Keep away from children</li>
                        <li class="mb-2">• Store in a cool, dry place</li>
                        <li class="mb-2">• Avoid direct sunlight</li>
                        <li class="mb-2">• Use gloves while applying</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        function changeImage(el) {
            document.getElementById('mainImage').src = el.src;
            document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active'));
            el.classList.add('active');
        }
    </script>
    <script>
        function changeImage(element) {
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active'));

            // Add active class to clicked thumbnail
            element.classList.add('active');

            // Change main image
            document.getElementById('mainImage').src = element.src;
        }
    </script>
@endpush
