@extends('frontend.layout.app')

<!-- Custom CSS for better visual appeal -->
<style>
    .payment-option:hover {
        transform: scale(1.05);
    }

    .payment-option input[type="radio"]:checked + .payment-label {
        background-color: #28a745;
        color: white;
        border-color: #28a745;
    }

    .payment-option input[type="radio"]:checked + .payment-label .payment-text {
        font-weight: bold;
    }

    .payment-option:hover .payment-label {
        background-color: #e2e6ea;
    }
</style>

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Checkout</h1>
            @if (session('success'))
                <div class="alert alert-info alert-dismissible fade show text-center mb-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Billing Form -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Billing Details</h4>

                    <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required placeholder="e.g. 017XXXXXXXX">
                                    <div id="phoneError" class="text-danger mt-1" style="display:none;">Please enter a valid Bangladeshi phone number.</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Street Address</label>
                                    <input type="text" name="street" class="form-control" value="{{ old('street') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="form-control" required>
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <select name="city" id="city" class="form-control" required>
                                        <option value="">Select City</option>
                                        <option value="Dhaka">Dhaka</option>

                                    </select>
                                </div>
                            </div>

                            <!-- Area (Only for Dhaka) -->
                            <div class="col-md-6" id="areaContainer" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Area</label>
                                    <select id="areaSelect" name="area" class="form-control">
                                        <option value="">Select Area</option>
                                        <option value="Uttara">Uttara</option>
                                        <option value="Banani">Banani</option>
                                        <option value="Mirpur">Mirpur</option>
                                        <option value="Gulshan">Gulshan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ old('zipcode') }}" required>
                                </div>
                            </div>

                            <input type="hidden" name="state_id" class="form-control" value="{{ old('state_id') }}">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Additional Note</label>
                                    <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Summary</h4>

                    <ul class="list-group mb-4">
                        @foreach($cartContents as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">{{ $item->name }}</h6>
                                    <small class="text-muted">Quantity: {{ $item->quantity }}</small>
                                </div>
                                <span class="text-muted">BDT {{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Total</strong>
                            <strong>BDT {{ number_format($totalPrice, 2) }}</strong>
                        </li>
                    </ul>

                    <!-- Payment Method -->
                    <h5 class="mb-3">Payment Method</h5>
                    <div class="mb-3">

                        <div class="payment-option d-flex align-items-center mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="sslcommerz" value="sslcommerze" style="display: none;">
                            <label class="payment-label d-flex align-items-center w-100 p-3 border rounded" for="sslcommerz">
                                <img src="{{ asset('ssl.png') }}" alt="SSLCommerz" class="me-2" style="height:30px;">
                                <span>Pay with SSLCommerz</span>
                            </label>
                        </div>

                        <div class="payment-option d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" style="display: none;">
                            <label class="payment-label d-flex align-items-center w-100 p-3 border rounded" for="cod">
                                <span>Cash on Delivery</span>
                            </label>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger mb-4">{{ $errors->first() }}</div>
                    @endif

                    <button type="submit" class="btn btn-success w-100">Place Order</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- JS Validation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentOptions = document.querySelectorAll('.payment-option');
        const checkoutForm = document.getElementById('checkoutForm');
        const phoneInput = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        const citySelect = document.getElementById('city');
        const areaContainer = document.getElementById('areaContainer');
        const areaSelect = document.getElementById('areaSelect');
        const zipcodeInput = document.getElementById('zipcode');

        // Payment Option Selection
        paymentOptions.forEach(option => {
            option.addEventListener('click', () => {
                paymentOptions.forEach(opt => {
                    opt.querySelector('.payment-label').style.borderColor = '#ddd';
                    opt.querySelector('.payment-label').style.backgroundColor = '#f8f9fa';
                });
                const label = option.querySelector('.payment-label');
                label.style.borderColor = '#007bff';
                label.style.backgroundColor = '#e2edff';
                option.querySelector('input[type="radio"]').checked = true;
            });
        });

        // Bangladeshi phone number validation
        checkoutForm.addEventListener('submit', function (e) {
            const phone = phoneInput.value.trim();
            const bdPattern = /^(?:\+?88)?01[3-9]\d{8}$/;

            if (!bdPattern.test(phone)) {
                e.preventDefault();
                phoneError.style.display = 'block';
                phoneInput.focus();
            } else {
                phoneError.style.display = 'none';
            }
        });

        // Show area dropdown when Dhaka is selected
        citySelect.addEventListener('change', function () {
            if (citySelect.value === 'Dhaka') {
                areaContainer.style.display = 'block';
                zipcodeInput.value = ''; // clear previous zip
            } else {
                areaContainer.style.display = 'none';
                areaSelect.value = '';
                zipcodeInput.value = ''; // clear zip
            }
        });

        // Auto-fill zip code based on area selection
        areaSelect.addEventListener('change', function () {
            const area = areaSelect.value;
            let zip = '';
            if (area === 'Uttara') zip = '1230';
            else if (area === 'Banani') zip = '1216';
            else if (area === 'Mirpur') zip = '1213';
            else if (area === 'Gulshan') zip = '1212';
            zipcodeInput.value = zip;
        });
    });
</script>
