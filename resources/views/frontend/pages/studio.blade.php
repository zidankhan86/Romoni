@extends('frontend.layout.app')

@section('content')
    @push('styles')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap');

            .gallery-section {
                padding: 80px 0; 
                min-height: 100vh;
            }

            .gallery-section h2 {
                color: #2D5F4F;
                font-family: 'Playfair Display', serif;
                font-weight: 700;
                font-size: 3rem;
                text-align: center;
                margin-bottom: 60px;
                letter-spacing: -0.5px;
            }

            .breadcrumb {
                background-color: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 12px 20px;
                border: 1px solid rgba(212, 165, 165, 0.2);
            }

            .breadcrumb-item a {
                color: #2D5F4F;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .breadcrumb-item a:hover {
                color: #D4A5A5;
            }

            .breadcrumb-item.active {
                color: #8B7355;
            }

            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 30px;
            }

            .gallery-card {
                border-radius: 16px;
                overflow: hidden;
                position: relative;
                box-shadow: 0 8px 24px rgba(45, 95, 79, 0.08);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                background: #fff;
            }

            .gallery-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 16px 40px rgba(45, 95, 79, 0.15);
            }

            .gallery-card img {
                width: 100%;
                height: 350px;
                object-fit: cover;
                transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                display: block;
            }

            .gallery-card:hover img {
                transform: scale(1.08);
            }

            .gallery-card .overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(45, 95, 79, 0.92) 0%, rgba(212, 165, 165, 0.88) 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                font-size: 1.5rem;
                font-weight: 600;
                font-family: 'Playfair Display', serif;
                opacity: 0;
                transition: opacity 0.4s ease;
                text-align: center;
                padding: 20px;
                letter-spacing: 0.5px;
            }

            .gallery-card:hover .overlay {
                opacity: 1;
            }

            @media (max-width: 768px) {
                .gallery-section {
                    padding: 60px 0;
                }

                .gallery-section h2 {
                    font-size: 2.2rem;
                    margin-bottom: 40px;
                }

                .gallery-grid {
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 20px;
                }

                .gallery-card img {
                    height: 280px;
                }

                .gallery-card .overlay {
                    font-size: 1.3rem;
                }
            }

            @media (max-width: 576px) {
                .gallery-section h2 {
                    font-size: 1.8rem;
                }

                .gallery-card img {
                    height: 240px;
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
                        [
                            'image' =>
                                'https://shorturl.at/DRW1j',
                            'title' => 'Makeover',
                        ],
                        [
                            'image' =>
                                'https://shorturl.at/CxT86',
                            'title' => 'Henna Art',
                        ],
                        [
                            'image' =>
                                'https://shorturl.at/UC2Zt',
                            'title' => 'Hair Care',
                        ],
                        [
                            'image' =>
                                'https://rb.gy/bpxlr5',
                            'title' => 'Bridal',
                        ],
                        [
                            'image' =>
                                'https://shorturl.at/dC3N0',
                            'title' => 'Body Care',
                        ],
                        [
                            'image' =>
                            'https://shorturl.at/aDdQc',
                            'title' => 'Hairstyles for Men',
                        ],
                       
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
