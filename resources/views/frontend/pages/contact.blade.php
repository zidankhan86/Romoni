@extends('frontend.layout.app')

@push('styles')
    <style>
        .breadcrumb-item a:hover {
            color: #D4A5A5;
        }

        .breadcrumb-item.active {
            color: #6B5B4F;
        }

        .breadcrumb {
            background-color: #fff;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb-item a {
            color: #2D5F4F;
            text-decoration: none;
            transition: color 0.3s ease;
        }


        .lg-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #2D5F4F;
            letter-spacing: -0.5px;
        }

        .lead {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #6B5B4F;
            max-width: 700px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(45, 95, 79, 0.08);
            border: 1px solid rgba(212, 165, 165, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(45, 95, 79, 0.12);
        }

        .card-body {
            padding: 3rem;
        }

        .card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #2D5F4F;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #2D5F4F;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid rgba(212, 165, 165, 0.3);
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #FAFAF8;
        }

        .form-control:focus {
            border-color: #D4A5A5;
            box-shadow: 0 0 0 4px rgba(212, 165, 165, 0.1);
            background: white;
            outline: none;
        }

        .form-control::placeholder {
            color: #B8AFA5;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #2D5F4F 0%, #1E4A3C 100%);
            color: white;
            border: none;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(45, 95, 79, 0.3);
            letter-spacing: 0.3px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1E4A3C 0%, #2D5F4F 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 95, 79, 0.4);
            color: white;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .lg-title {
                font-size: 2rem;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }

            .btn-submit {
                padding: 0.875rem 2.5rem;
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light p-2 rounded">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="lg-title mb-0" style="text-align: center">Contact Us</h2>
                    <div class="text-center mb-5 mt-2">
                        <p class="text-muted lead">
                            Something splashing about in the pool a little way off, and she swam nearer to make out what it
                            was.
                            At first she thought it must be a walrus or hippopotamus, but then she remembered how small she
                            was now,
                            and she soon made out that it was only a mouse that had slipped in like herself.
                        </p>
                    </div>

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-3">
                            <h3 class="mb-4 text-center fw-semibold text-dark">Get In Touch</h3>

                            <form action="{{ route('contact.store') }}" class="contact-form" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium">Your Name</label>
                                    <input class="form-control form-control-lg rounded-3" name="name" id="name"
                                        type="text" placeholder="Enter your full name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-medium">Your Email</label>
                                    <input class="form-control form-control-lg rounded-3" name="email" id="email"
                                        type="email" placeholder="Enter your email address" required>
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="form-label fw-medium">Your Message</label>
                                    <textarea class="form-control form-control-lg rounded-3" name="message" id="message" rows="6"
                                        placeholder="Type your message here..." required></textarea>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-submit text-white fw-semibold btn-lg px-5 rounded-pill"
                                        type="submit">
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
