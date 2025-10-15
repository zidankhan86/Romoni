@extends('frontend.layout.app')

@section('content')
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap');

    .gallery-section {
        padding: 60px 0;
        min-height: 100vh;
    }

    .gallery-section h2 {
        color: #2D5F4F;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 40px;
        letter-spacing: -0.5px;
    }

    .breadcrumb {
        background-color: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 10px 15px;
        border: 1px solid rgba(212, 165, 165, 0.2);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .gallery-card {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 6px 20px rgba(45, 95, 79, 0.08);
        transition: all 0.3s ease;
        background: #fff;
        cursor: pointer;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(45, 95, 79, 0.12);
    }

    .gallery-card img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: transform 0.4s ease;
        display: block;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-card .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(45, 95, 79, 0.92) 0%, rgba(212, 165, 165, 0.88) 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 1.3rem;
        font-weight: 600;
        font-family: 'Playfair Display', serif;
        opacity: 0;
        transition: opacity 0.3s ease;
        text-align: center;
        padding: 15px;
        letter-spacing: 0.5px;
    }

    .gallery-card:hover .overlay {
        opacity: 1;
    }

    /* Modal Carousel Styles */
    #imageModal .carousel-item img {
        width: 100%;
        height: 60vh;
        object-fit: cover;
    }

    #imageModal .carousel {
        border-radius: 8px;
        overflow: hidden;
    }

    #imageModal .carousel-control-prev,
    #imageModal .carousel-control-next {
        filter: invert(1);
        opacity: 0.8;
    }

    #imageModal .carousel-indicators [data-bs-target] {
        background-color: rgba(45, 95, 79, 0.5);
    }

    #imageModal .carousel-indicators .active {
        background-color: #2D5F4F;
    }

    /* Responsive Adjustments for Medium Screens */
    @media (max-width: 991px) and (min-width: 768px) {
        .gallery-section {
            padding: 40px 0;
        }

        .gallery-section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .gallery-card img {
            height: 220px;
        }

        .gallery-card .overlay {
            font-size: 1.1rem;
            padding: 10px;
        }

        #imageModal .modal-dialog {
            max-width: 90%;
        }

        #imageModal .carousel-item img {
            height: 50vh;
        }

        .breadcrumb {
            padding: 8px 12px;
        }
    }

    /* Ensure touch devices handle hover gracefully */
    @media (hover: none) {
        .gallery-card:hover {
            transform: none;
            box-shadow: 0 6px 20px rgba(45, 95, 79, 0.08);
        }

        .gallery-card:hover img {
            transform: none;
        }

        .gallery-card .overlay {
            opacity: 0.5;
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
        <div id="backContainer" style="display: none;"></div>

        <div class="gallery-grid">
            {{-- Dynamic content loaded via JavaScript --}}
        </div>
    </div>
</section>

<!-- Modal with Carousel Gallery -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <div id="galleryCarousel" class="carousel slide carousel-fade" data-bs-ride="false">
                    <div class="carousel-indicators" id="carouselIndicators"></div>
                    <div class="carousel-inner" id="carouselInner"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@php
$galleryData = [
    'Makeover' => 'https://shorturl.at/DRW1j',
    'Henna Art' => 'https://shorturl.at/CxT86',
    'Hair Care' => 'https://shorturl.at/UC2Zt',
    'Bridal' => 'https://rb.gy/bpxlr5',
    'Body Care' => 'https://shorturl.at/dC3N0',
    'Hairstyles for Men' => 'https://shorturl.at/aDdQc',
];

$categories = [];
foreach ($galleryData as $title => $thumbUrl) {
    $images = [$thumbUrl];
    $seedBase = 'priyo-' . strtolower(str_replace(' ', '-', $title));
    for ($i = 1; $i <= 3; $i++) {
        $images[] = "https://picsum.photos/seed/{$seedBase}{$i}/800/600";
    }
    $categories[$title] = ['images' => $images];
}
@endphp

@push('scripts')
<script>
    const categories = @json($categories);

    function renderCategories() {
        const grid = document.querySelector('.gallery-grid');
        const h2 = document.querySelector('h2');
        const backContainer = document.getElementById('backContainer');

        h2.textContent = "Priyo's Studio";
        backContainer.style.display = 'none';
        grid.innerHTML = '';

        Object.entries(categories).forEach(([title, data]) => {
            const card = document.createElement('div');
            card.className = 'gallery-card';
            card.setAttribute('data-bs-toggle', 'modal');
            card.setAttribute('data-bs-target', '#imageModal');
            card.setAttribute('data-category', title);
            card.innerHTML = `
                <img src="${data.images[0]}" alt="${title}">
                <div class="overlay" data-load-category="${title}">${title}</div>
            `;
            grid.appendChild(card);
        });
    }

    function renderCategoryImages(category) {
        const grid = document.querySelector('.gallery-grid');
        const h2 = document.querySelector('h2');
        const backContainer = document.getElementById('backContainer');

        h2.textContent = `${category}`;
        backContainer.style.display = 'block';
        backContainer.innerHTML = '<a href="#" id="backBtn" class="btn btn-secondary mb-4">&larr; Back to Categories</a>';

        const backBtn = document.getElementById('backBtn');
        backBtn.addEventListener('click', (e) => {
            e.preventDefault();
            renderCategories();
        });

        grid.innerHTML = '';
        const images = categories[category]?.images || [];
        images.forEach((src, index) => {
            const card = document.createElement('div');
            card.className = 'gallery-card';
            card.setAttribute('data-bs-toggle', 'modal');
            card.setAttribute('data-bs-target', '#imageModal');
            card.setAttribute('data-category', category);
            card.innerHTML = `
                <img src="${src}" alt="${category} ${index + 1}">
                <div class="overlay">Open Gallery</div>
            `;
            grid.appendChild(card);
        });
    }

    document.addEventListener('click', (e) => {
        const overlay = e.target.closest('[data-load-category]');
        if (overlay) {
            e.preventDefault();
            e.stopPropagation();
            const category = overlay.getAttribute('data-load-category');
            renderCategoryImages(category);
        }
    });

    document.getElementById('imageModal').addEventListener('show.bs.modal', (event) => {
        const card = event.relatedTarget;
        const category = card.getAttribute('data-category');
        const images = categories[category]?.images || [];

        const modalTitle = document.getElementById('modalTitle');
        modalTitle.textContent = `${category} Gallery (${images.length} images)`;

        const indicators = document.getElementById('carouselIndicators');
        const inner = document.getElementById('carouselInner');

        indicators.innerHTML = '';
        inner.innerHTML = '';

        images.forEach((src, index) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.dataset.bsTarget = '#galleryCarousel';
            button.dataset.bsSlideTo = index;
            button.className = index === 0 ? 'active' : '';
            button.setAttribute('aria-label', `Slide ${index + 1}`);
            if (index === 0) {
                button.setAttribute('aria-current', 'true');
            }
            indicators.appendChild(button);

            const item = document.createElement('div');
            item.className = `carousel-item ${index === 0 ? 'active' : ''}`;
            const img = document.createElement('img');
            img.src = src;
            img.className = 'd-block w-100';
            img.alt = `${category} ${index + 1}`;
            item.appendChild(img);
            inner.appendChild(item);
        });
    });

    document.addEventListener('DOMContentLoaded', renderCategories);
</script>
@endpush
@endsection
