@extends('frontend.layout.app')

@push('styles')
    <style>
        .popular-products-section { 
            min-height: 100vh;
            padding: 80px 0;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #2D5F4F;
            margin-bottom: 3rem;
            letter-spacing: -0.5px;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            height: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(45, 95, 79, 0.15);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: #F5F1E8;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }

        .badge-popular {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #D4A5A5 0%, #C89595 100%);
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 24px;
            box-shadow: 0 4px 12px rgba(212, 165, 165, 0.3);
            z-index: 10;
            letter-spacing: 0.5px;
        }

        .product-body {
            padding: 1.5rem;
            text-align: center;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 600;
            color: #2D5F4F;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.5rem;
        }

        .product-price {
            color: #D4A5A5;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .btn-quick-view {
            background: transparent;
            border: 2px solid #2D5F4F;
            color: #2D5F4F;
            padding: 10px 24px;
            border-radius: 24px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
        }

        .btn-quick-view:hover {
            background: #2D5F4F;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(45, 95, 79, 0.25);
        }

        .product-footer {
            padding: 0 1.5rem 1.5rem;
            background: transparent;
            border: none;
        }

        .btn-add-cart {
            background: linear-gradient(135deg, #2D5F4F 0%, #1F4538 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 24px;
            font-weight: 600;
            border: none;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
        }

        .btn-add-cart:hover {
            background: linear-gradient(135deg, #1F4538 0%, #2D5F4F 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 95, 79, 0.3);
        }

        .quick-view-modal .modal-content {
            border-radius: 24px;
            border: none;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .quick-view-modal .modal-header {
            background: linear-gradient(135deg, #F5F1E8 0%, #EDE7DC 100%);
            border: none;
            padding: 1.5rem 2rem;
        }

        .quick-view-modal .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2D5F4F;
        }

        .quick-view-modal .modal-body {
            padding: 2rem;
        }

        .quick-view-modal .modal-image {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .quick-view-name {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #2D5F4F;
            margin-bottom: 1rem;
        }

        .quick-view-price {
            color: #D4A5A5;
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .quick-view-description {
            color: #6B7280;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .btn-modal-cart {
            background: linear-gradient(135deg, #2D5F4F 0%, #1F4538 100%);
            color: white;
            padding: 14px 32px;
            border-radius: 24px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
        }

        .btn-modal-cart:hover:not(.disabled) {
            background: linear-gradient(135deg, #1F4538 0%, #2D5F4F 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 95, 79, 0.3);
        }

        .btn-modal-cart.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .product-image-wrapper {
                height: 220px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="popular-products-section">
        <div class="container">
            <h2 class="section-title text-center" data-aos="fade-down">Popular Products</h2>

            <div class="row g-4 justify-content-center" data-aos="fade-up">
                @foreach ($popularProducts as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card product-card">
                            <div class="product-image-wrapper">
                                @if ($product->is_popular)
                                    <span class="badge-popular">Popular</span>
                                @endif

                                <a href="{{ route('product.details', $product->slug) }}">
                                    <img src="{{ url('/public/uploads/', $product->image) }}" class="product-image"
                                        alt="{{ $product->name }}">
                                </a>
                            </div>

                            <div class="product-body">
                                <h5 class="product-title">{{ $product->name }}</h5>
                                <p class="product-price">BDT {{ number_format($product->price, 2) }}</p>
                                <button class="btn btn-quick-view quick-view-btn" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ number_format($product->price, 2) }}"
                                    data-image="{{ url('/public/uploads/', $product->image) }}"
                                    data-description="{{ $product->description }}">
                                    <i class="bi bi-eye-fill me-1"></i> Quick View
                                </button>
                            </div>

                            <div class="product-footer">
                                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-add-cart">
                                    <i class="bi bi-cart-check-fill me-2"></i>Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="modal fade quick-view-modal" id="productQuickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickViewModalLabel">Product Quick View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="modal-image">
                                <img id="quickViewImage" src="/placeholder.svg" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 id="quickViewName" class="quick-view-name"></h4>
                            <h5 class="quick-view-price">BDT <span id="quickViewPrice"></span></h5>
                            <p id="quickViewDescription" class="quick-view-description"></p>
                            <a href="#" class="btn btn-modal-cart disabled">
                                <i class="bi bi-cart me-2"></i>Add to Cart (Coming Soon)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const modalElement = document.getElementById('productQuickViewModal');

            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);

                quickViewButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        document.getElementById('quickViewName').textContent = this.dataset.name;
                        document.getElementById('quickViewPrice').textContent = this.dataset.price;
                        document.getElementById('quickViewImage').src = this.dataset.image;
                        document.getElementById('quickViewDescription').textContent = this.dataset
                            .description;
                        modal.show();
                    });
                });
            }
        });
    </script>
@endpush
