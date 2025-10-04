

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
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                 <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Services</a></li>
                 <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Offers</a></li>
                 <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Priyoz Studio</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('product.page') ? 'active' : '' }}" href="{{ route('product.page') }}">Contact</a></li>

            </ul>

            <!-- Right-side -->
            <div class="d-flex align-items-center gap-2 ms-lg-auto">

                <!-- Cart -->
                <a href="{{ route('cart.show') }}" class="text-dark position-relative me-4">
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
                      <a href="{{ route('user.logout') }}" class="text-danger" title="Logout">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </a>
                @endauth

            </div>
        </div>
    </div>
</nav>




