@extends('frontend.layout.app')

@section('content')

@push('styles')
<style>
    .gallery-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .gallery-section h2 {
        color: #6a0dad;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .gallery-card {
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.3s ease;
        display: block;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-card .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 1.2rem;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-card:hover .overlay {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .gallery-card img {
            height: 220px;
        }
    }
</style>
@endpush

<section class="gallery-section">
    <div class="container px-4 px-lg-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Studio</li>
            </ol>
        </nav>

        <h2>Priyo's Studio</h2>

        <div class="gallery-grid">
            @php
                $galleryItems = [
                    ['image' => 'https://images.unsplash.com/photo-1752643720270-68796fe5f020?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Hair Styling'],
                    ['image' => 'https://images.unsplash.com/photo-1752610877644-c83e616d9fd3?q=80&w=685&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Manicure & Pedicure'],
                    ['image' => 'https://plus.unsplash.com/premium_photo-1661404164814-9d3c137097aa?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Professional Makeup'],
                    ['image' => 'https://images.unsplash.com/photo-1506003094589-53954a26283f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Spa Treatments'],
                    ['image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Facial Treatments'],
                    ['image' => 'https://plus.unsplash.com/premium_photo-1683133990522-4155deaacbbb?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Nail Art'],
                    ['image' => 'https://images.unsplash.com/photo-1506003094589-53954a26283f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Spa Treatments'],
                    ['image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'title' => 'Facial Treatments'],
                ];
            @endphp

            @foreach ($galleryItems as $item)
                <div class="gallery-card">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                    <div class="overlay">{{ $item['title'] }}</div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
