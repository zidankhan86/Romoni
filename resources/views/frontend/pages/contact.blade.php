@extends('frontend.layout.app')

@section('content')



<!-- Page Title -->
<div class="breadcrumb-wrapper py-5">
    <div class="container text-center">
        <!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-0 border-bottom">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </div>
</nav>

    </div>
</div>

<!-- Contact Section -->
<section class="pt-3 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
            <h2 class="lg-title mb-0" style="text-align: center">Contact Us</h2>
                <div class="text-center mb-5 mt-2">
                    <p class="text-muted lead">
                        Something splashing about in the pool a little way off, and she swam nearer to make out what it was.
                        At first she thought it must be a walrus or hippopotamus, but then she remembered how small she was now,
                        and she soon made out that it was only a mouse that had slipped in like herself.
                    </p>
                </div>

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-3">
                        <h3 class="mb-4 text-center fw-semibold text-dark">Get In Touch</h3>

                        <form action="{{route('contact.store')}}" class="contact-form" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium">Your Name</label>
                                <input class="form-control form-control-lg rounded-3" name="name" id="name" type="text" placeholder="Enter your full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Your Email</label>
                                <input class="form-control form-control-lg rounded-3" name="email" id="email" type="email" placeholder="Enter your email address" required>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-medium">Your Message</label>
                                <textarea class="form-control form-control-lg rounded-3" name="message" id="message" rows="6" placeholder="Type your message here..." required></textarea>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-purple text-white fw-semibold btn-lg px-5 rounded-pill" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
