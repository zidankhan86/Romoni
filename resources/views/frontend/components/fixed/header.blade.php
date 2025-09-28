{{-- <nav class="navbar navbar-expand-lg sticky-top"
    style="background: linear-gradient(90deg, #c42f81, #feb47b); box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <div class="container px-4 px-lg-5">

        <a class="navbar-brand text-white fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('l.png') }}" style="height: 40px;" class="me-2">

        </a>


        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->routeIs('about.page') ? 'active' : '' }}"
                        href="{{ route('about.page') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}"
                        href="{{ route('product.page') }}">Product</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" id="navbarDropdown" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-2">
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('product.page') }}">
                                <i class="bi bi-bag me-2 text-primary"></i> All Products
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{route('popularProduct')}}">
                                <i class="bi bi-star-fill me-2 text-warning"></i> Popular Items
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('latestProduct') }}">
                                <i class="bi bi-lightning-fill me-2 text-danger"></i> New Arrivals
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>


            <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">

                <a href="{{ route('cart.show') }}" class="btn btn-light text-dark position-relative rounded-pill px-3">
                    <i class="bi bi-cart-fill me-1"></i> Cart
                    <span
                        class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle rounded-pill px-2 py-1">
                        @auth
                        {{ Cart::session(auth()->user()->id)->getTotalQuantity() }}
                        @else
                        0
                        @endauth
                    </span>
                </a>




                @guest
                <a href="{{ route('login') }}" class="btn btn-white text-dark rounded-pill px-3 me-2"
                    style="background-color: #ffffff; border: 1px solid #fff;">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </a>
                @endguest

                 @auth

<p></p>
                <a href="{{route('user.logout')}}" class="btn btn-danger" title="Logout">
                    <i class="fas fa-sign-out-alt"></i> <strong>Logout</strong>
                </a>

                @endauth

            </div>
        </div>
    </div>
</nav> --}}

<style>
    .btn-purple {
        background-color: #800080;
        border-color: #800080;
    }
    .btn-purple:hover {
        background-color: #6a006a;
        border-color: #6a006a;
    }
</style>

<!-- Discount Bar (Top) -->
<div class="bg-dark text-white p-2">
    <div class="d-flex align-items-center justify-content-between">
        <!-- Running Title -->
        <marquee behavior="scroll" direction="left" scrollamount="5" class="me-3">
            Up to 20% discounts on Facial! Limited slots left in your area today
        </marquee>

        <!-- Right Side: Phone + Language -->
        <div class="d-flex align-items-center gap-3">
            <span class="fw-semibold">Call for Booking +880 9613224433</span>
            <select class="form-select form-select-sm bg-dark text-white border-0 w-auto">
                <option value="EN">EN</option>

            </select>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <div class="container px-4 px-lg-5">
        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('romoni-logo.svg') }}" style="height: 40px;" class="me-2">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Nav Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">About</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('about.page') ? 'active' : '' }}" href="{{ route('about.page') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Offers</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Romoni Studio</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Career</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Blog</a></li>
            </ul>

            <!-- Right-side -->
            <div class="d-flex align-items-center gap-2 ms-lg-auto">
                <!-- Location -->
                <a href="#" class="btn btn-purple text-white rounded-pill px-3">Dhaka</a>

                <!-- Search -->
                <a href="#" class="text-dark me-2"><i class="fas fa-search"></i></a>

                <!-- Cart -->
                <a href="{{ route('cart.show') }}" class="text-dark position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle rounded-pill px-1 py-0.5">
                         @auth
                        {{ Cart::session(auth()->user()->id)->getTotalQuantity() }}
                        @else
                        0
                        @endauth
                    </span>
                </a>

                <!-- Auth Buttons -->
                @guest
                    <!-- Show Sign In button for guests -->
                    <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-pill px-3">Sign In</a>
                @endguest

                @auth
                    <!-- Show Logout as red icon for authenticated users -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn text-danger border-0 p-0" title="Logout">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>




