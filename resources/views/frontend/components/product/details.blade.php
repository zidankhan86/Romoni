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
                    type="button" role="tab" aria-controls="steps" aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="benefits-tab" data-bs-toggle="tab" data-bs-target="#benefits" type="button"
                    role="tab" aria-controls="benefits" aria-selected="false">Benefits</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button"
                    role="tab" aria-controls="product" aria-selected="false">Review</button>
            </li>

        </ul>

        <div class="tab-content p-3 border border-top-0 rounded-bottom" id="productTabContent">
            <div class="tab-pane fade show active" id="steps" role="tabpanel" aria-labelledby="steps-tab">
                <ul class="list-unstyled mb-0">
                    {{$product->description}}
                </ul>
            </div>
            <div class="tab-pane fade" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                <ul class="list-unstyled mb-0">
                    {{$product->short_description}}
                </ul>
            </div>


            <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">

                <h6>Reviews</h6>

                {{-- Flash Messages --}}
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @forelse($product->reviews as $review)
                <div class="mb-2 border-bottom pb-2">
                    <strong>{{ $review->user->name }}</strong>
                    <span class="text-warning">
                        @for($i=1; $i<=5; $i++) <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                            @endfor
                    </span>
                    <p>{{ $review->comment }}</p>
                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                </div>
                @empty
                <p>No reviews yet.</p>
                @endforelse

                @auth
                {{-- Check if user purchased the product and not yet reviewed --}}
                @php
                $hasPurchased = \App\Models\Order::where('user_id', auth()->id())
                ->whereHas('items', function ($q) use ($product) {
                $q->where('product_id', $product->id);
                })
                ->exists();

                $hasReviewed = \App\Models\Review::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->exists();
                @endphp

                @if($hasPurchased && !$hasReviewed)
               <form action="{{ route('product.review', $product->id) }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-select" required>
                            <option value="">Select Rating</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>

                @elseif(!$hasPurchased)
                <p class="mt-3 text-muted">You must purchase this product before leaving a review.</p>
                @else
                <p class="mt-3 text-success">You have already reviewed this product.</p>
                @endif
                @else
                <p class="mt-3"><a href="{{ route('login') }}">Login</a> to leave a review.</p>
                @endauth
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
