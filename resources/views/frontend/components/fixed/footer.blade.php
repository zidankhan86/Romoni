@php
    use App\Models\Category;
    $settings = DB::table('settings')->first();
    $footerCategories = Category::where('status', 1)->latest()->take(4)->get();
@endphp

<style>
    footer {
        font-size: 14px;
        line-height: 1.8;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* Updated footer background to soft cream with subtle border */
    .footer-main {
        background: linear-gradient(to bottom, #F5F1E8 0%, #EDE7DC 100%);
        border-top: 1px solid #D4A5A5;
    }

    /* Updated footer heading styles with elegant serif font */
    .footer-heading {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #2D5F4F;
        letter-spacing: 0.5px;
        margin-bottom: 1.25rem;
    }

    /* Updated brand name styling */
    .footer-brand {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #2D5F4F;
        letter-spacing: 1px;
    }

    /* Updated footer link colors to match new palette */
    .footer-link {
        color: #6B5D54;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        position: relative;
    }

    .footer-link:hover {
        color: #D4A5A5;
        transform: translateX(4px);
    }

    /* Updated subscribe button to match new design system */
    .btn-subscribe {
        background: linear-gradient(135deg, #2D5F4F 0%, #1F4538 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(45, 95, 79, 0.2);
    }

    .btn-subscribe:hover {
        background: linear-gradient(135deg, #1F4538 0%, #2D5F4F 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 95, 79, 0.3);
        color: white;
    }

    /* Updated email input styling */
    .footer-email-input {
        border: 2px solid #D4A5A5;
        border-radius: 8px;
        padding: 0.625rem 1rem;
        background: white;
        transition: all 0.3s ease;
    }

    .footer-email-input:focus {
        border-color: #2D5F4F;
        box-shadow: 0 0 0 3px rgba(45, 95, 79, 0.1);
        outline: none;
    }

    /* Updated social icon styles with rose pink hover */
    .social-icon {
        color: #6B5D54;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .social-icon:hover {
        color: white;
        background: linear-gradient(135deg, #D4A5A5 0%, #C49090 100%);
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(212, 165, 165, 0.3);
    }

    /* Updated phone number styling */
    .footer-phone {
        color: #6B5D54;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .footer-phone i {
        color: #D4A5A5;
    }

    /* Updated quick links styling */
    .footer-quick-links {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .footer-quick-links .footer-link {
        font-weight: 500;
        color: #2D5F4F;
    }

    /* Updated copyright section */
    .footer-copyright {
        border-top: 1px solid rgba(212, 165, 165, 0.3);
        color: #6B5D54;
        font-size: 0.875rem;
    }

    /* Updated service list styling */
    .footer-service-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-service-list li {
        margin-bottom: 0.75rem;
    }

    .footer-service-list li:before {
        content: "→";
        color: #D4A5A5;
        margin-right: 0.5rem;
        font-weight: 600;
    }
</style>

<footer class="footer-main pt-5 pb-4">
    <div class="container">
        <div class="row">


            <div class="col-md-4 mb-4">
                <h4 class="footer-brand mb-3">Priyoz</h4>
                <div class="footer-quick-links mb-3">
                    <a href="{{route('contact')}}" class="footer-link">Contact Us</a>
                    <a href="{{route('studioIndex')}}" class="footer-link">Studio</a>
                    <a href="{{route('home')}}" class="footer-link">Home</a>
                </div>
                <p class="footer-phone mb-0">
                    <i class="bi bi-telephone-fill"></i>
                    <span>Call: {{ $settings->phone ?? '' }}</span>
                </p>
            </div>


            <div class="col-md-4 mb-4">
                <h6 class="footer-heading">Services</h6>
                <ul class="footer-service-list mt-3">

                    @foreach ($footerCategories as $cat)
                        <li>
                            <a href="{{ route('product.page', ['category' => $cat->slug]) }}" class="footer-link">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="col-md-4 mb-4">
                <h6 class="footer-heading">Stay in Touch</h6>
                <form class="d-flex mt-3">
                    <input type="email" class="form-control footer-email-input me-2" placeholder="Email address">
                    <button type="submit" class="btn btn-subscribe">Subscribe</button>
                </form>

                <div class="d-flex gap-3 mt-4">
                    <a href="{{ $settings->facebook_link ?? '#' }}" target="_blank" class="social-icon"><i
                            class="bi bi-facebook"></i></a>
                    <a href="{{ $settings->instagram_link ?? '#' }}" target="_blank" class="social-icon"><i
                            class="bi bi-instagram"></i></a>
                    <a href="{{ $settings->youtube_link ?? '#' }}" target="_blank" class="social-icon"><i
                            class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary opacity-25">
        <div class="text-center footer-copyright mt-3 pt-3">
            {{ $settings->copyright_text ?? '' }}
        </div>
    </div>
</footer>
