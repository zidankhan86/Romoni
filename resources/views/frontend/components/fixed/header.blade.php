<style>
    /* Updated button styles to match new design system */
    .btn-primary-custom {
        background-color: #2D5F4F;
        border-color: #2D5F4F;
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #234a3d;
        border-color: #234a3d;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
    }

    .btn-outline-custom {
        border-color: #2D5F4F;
        color: #2D5F4F;
        transition: all 0.3s ease;
    }

    .btn-outline-custom:hover {
        background-color: #2D5F4F;
        border-color: #2D5F4F;
        color: #ffffff;
    }

    /* New discount bar styling */
    .discount-bar {
        background: linear-gradient(135deg, #2D5F4F 0%, #3a7563 100%);
        padding: 12px 0;
        font-size: 14px;
    }

    .discount-text {
        color: #F5F1E8;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .phone-link {
        color: #F5F1E8;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .phone-link:hover {
        color: #D4A5A5;
    }

    /* Modern navbar styling */
    .navbar-custom {
        background-color: #ffffff;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        padding: 16px 0;
        transition: all 0.3s ease;
    }

    .navbar-custom.scrolled {
        padding: 12px 0;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12);
    }

    .nav-link {
        color: #3D3D3D !important;
        font-weight: 500;
        font-size: 15px;
        padding: 8px 16px !important;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 16px;
        right: 16px;
        height: 2px;
        background-color: #D4A5A5;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        transform: scaleX(1);
    }

    .nav-link:hover {
        color: #D4A5A5 !important;
    }

    .nav-link.active {
        color: #D4A5A5 !important;
        font-weight: 600;
    }

    /* Cart icon styling */
    .cart-icon {
        color: #3D3D3D;
        font-size: 20px;
        transition: all 0.3s ease;
        position: relative;
    }

    .cart-icon:hover {
        color: #D4A5A5;
        transform: scale(1.1);
    }

    .cart-badge {
        background-color: #D4A5A5 !important;
        color: #ffffff !important;
        font-size: 11px;
        font-weight: 600;
        min-width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Language selector styling */
    .language-select {
        background-color: transparent;
        color: #F5F1E8;
        border: 1px solid rgba(245, 241, 232, 0.3);
        border-radius: 6px;
        padding: 4px 12px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .language-select:hover {
        border-color: #D4A5A5;
        background-color: rgba(212, 165, 165, 0.1);
    }

    .language-select:focus {
        outline: none;
        border-color: #D4A5A5;
        box-shadow: 0 0 0 3px rgba(212, 165, 165, 0.2);
    }

    /* Mobile menu styling */
    .navbar-toggler {
        border: none;
        padding: 8px;
    }

    .navbar-toggler:focus {
        box-shadow: none;
        outline: 2px solid #D4A5A5;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%233D3D3D' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Auth button styling */
    .btn-auth {
        border-radius: 24px;
        padding: 8px 24px;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-outline-dark-custom {
        border: 2px solid #3D3D3D;
        color: #3D3D3D;
        background-color: transparent;
    }

    .btn-outline-dark-custom:hover {
        background-color: #3D3D3D;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(61, 61, 61, 0.2);
    }

    .btn-outline-danger-custom {
        border: 2px solid #D4A5A5;
        color: #D4A5A5;
        background-color: transparent;
    }

    .btn-outline-danger-custom:hover {
        background-color: #D4A5A5;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 165, 165, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .navbar-nav {
            padding: 16px 0;
        }

        .nav-link {
            padding: 12px 16px !important;
        }

        .nav-link::after {
            display: none;
        }

        .discount-bar {
            font-size: 12px;
        }

        .discount-bar .d-flex {
            flex-direction: column;
            gap: 8px;
            text-align: center;
        }
    }
</style>
<style>
    /* Updated subscribe button to match new design system */
    .btn-customs {
        background: white; /* Normal background */
        border: 3px solid #FFC0CB; /* Pink border */
        color: black;
        font-weight: 500;
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(45, 95, 79, 0.2);
    }

    .btn-customs:hover {
        background: linear-gradient(135deg, #2D5F4F 0%, #1F4538 100%); /* Gradient background on hover */
        border: 3px solid #FFC0CB; /* Keep the pink border on hover */
        color: white;
}
</style>

@php
    $settings = DB::table('settings')->first();
@endphp

<!-- Discount Bar (Top) -->
<div class="bg-dark text-white p-2">
    <div class="d-flex align-items-center justify-content-between">
        <!-- Running Title -->
        <marquee behavior="scroll" direction="left" scrollamount="5" class="me-3">
            {{$settings->top_var_text ?? ''}}
        </marquee>

        <!-- Right Side: Phone + Language -->
        <div class="d-flex align-items-center gap-3">
            <span class="fw-semibold">Call for Booking {{ $settings->phone }}</span>
            <select class="form-select form-select-sm bg-dark text-white border-0 w-auto">
                <option value="EN">EN</option>

            </select>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container px-4 px-lg-5">

        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('romoni-logo.svg') }}" style="height: 45px;" class="me-2" alt="Romoni Logo">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product.page') ? 'active' : '' }}"
                        href="{{ route('product.page') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('popularService') ? 'active' : '' }}"
                        href="{{ route('popularService') }}">Popular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('studioIndex') ? 'active' : '' }}"
                        href="{{ route('studioIndex') }}">Priyoz Studio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>


            <div class="d-flex align-items-center gap-3">

                <a href="{{ route('cart.show') }}" class="cart-icon position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge cart-badge position-absolute top-0 start-100 translate-middle rounded-pill">
                        @auth
                            {{ Cart::session(auth()->user()->id)->getTotalQuantity() }}
                        @else
                            0
                        @endauth
                    </span>
                </a>


                @guest
                    <a href="{{ route('login') }}" class="btn btn-customs">Sign In</a>
                @endguest

                @auth
                    <a href="{{ route('user.logout') }}" class="btn btn-customs" title="Logout">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
