{{-- <!-- Header-->
<header class="bg-dark py-5" style="background-image: url('/banner.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Fake Shop</h1>
            <p class="lead fw-normal text-white-50 mb-0">We Make , We build , We Create</p>
        </div>
    </div>
</header> --}}


<!-- Hero Slider -->
<header>
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="bg-dark py-5 d-flex align-items-center"
                    style="background-image: url('{{ asset('h1.webp') }}'); background-size: cover; background-position: center; height: 80vh;">
                    <div class="container px-4 px-lg-5 my-5 text-center text-black">
                        <h1 class="display-4 fw-bolder">Romoni</h1>
                        <p class="lead fw-normal mb-4">Your Beauty, Our Passion</p>
                        <a href="#booking" class="btn btn-dark btn-lg rounded-pill px-4 shadow-sm">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="bg-dark py-5 d-flex align-items-center"
                    style="background-image: url('{{ asset('h2.webp') }}'); background-size: cover; background-position: center; height: 80vh;">
                    <div class="container px-4 px-lg-5 my-5 text-center text-black">
                        <h1 class="display-4 fw-bolder">Our Services</h1>
                        <p class="lead fw-normal mb-4">Redefining Beauty & Wellness</p>
                        <a href="#booking" class="btn btn-dark btn-lg rounded-pill px-4 shadow-sm">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="bg-dark py-5 d-flex align-items-center"
                    style="background-image: url('{{ asset('h3.jpg') }}'); background-size: cover; background-position: center; height: 80vh;">
                    <div class="container px-4 px-lg-5 my-5 text-center text-black">
                        <h1 class="display-4 fw-bolder">Exclusive Offers</h1>
                        <p class="lead fw-normal mb-4">Save More, Glow More</p>
                        <a href="#booking" class="btn btn-dark btn-lg rounded-pill px-4 shadow-sm">Book Now</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
    </div>
</header>

<!-- Custom CSS for Black Arrows -->
<style>
.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: invert(1); /* turns white icons to black */
}
</style>

