@extends('frontend.layout.app')

@section('content')
@php
    $settings = DB::table('settings')->first();
@endphp

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">🛒 Cart Services</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Cart Table -->
    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Service</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">
                                <form action="{{ route('cart.clear') }}">
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        Clear Cart
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cartContents as $item)
                            <tr>
                                <!-- Service Name -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $item->name }}</h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Quantity -->
                                <td class="text-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select class="form-select form-select-sm w-auto mx-auto" name="quantity" onchange="this.form.submit()">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}" @if ($i == $item->quantity) selected @endif>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </form>
                                </td>

                                <!-- Subtotal -->
                                <td class="text-center fw-semibold">
                                    BDT {{ number_format($item->price * $item->quantity, 2) }}
                                </td>

                                    <td class="text-center">
                                        <form action="{{ route('cart.updateTime', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="time" class="form-select form-select-sm w-auto mx-auto" onchange="this.form.submit()">
                                                @for ($hour = 10; $hour <= 17; $hour++)
                                                    @php
                                                        $timeValue = sprintf('%02d:00', $hour); // 09:00, 10:00, etc.
                                                        $timeDisplay = \Carbon\Carbon::createFromTime($hour)->format('g A'); // 9 AM, 10 AM
                                                        $selectedTime = $item->attributes->time ?? null; // read saved time
                                                    @endphp
                                                    <option value="{{ $timeValue }}" {{ $selectedTime == $timeValue ? 'selected' : '' }}>
                                                        {{ $timeDisplay }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </form>
                                    </td>



                                <!-- Remove Button -->
                                <td class="text-center">
                                    <form action="{{ route('cart.remove', ['product' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-3">No products in the cart.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Totals -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">
            Subtotal:
            <span class="fw-bold text-primary">
                BDT {{ number_format($totalPrice, 2) }}
            </span>
        </h5>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between mb-5">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Shopping
        </a>
        <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
    </div>

    <!-- ⚠️ Emergency WhatsApp Support -->
    <div class="card border-warning mb-4">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <h5 class="text-warning fw-bold mb-1">
                    ⚠️ Need Emergency Assistance?
                </h5>
                <p class="mb-0 text-dark">
                    Contact our support team instantly on WhatsApp for urgent service-related issues.
                </p>
            </div>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->phone ?? '') }}?text=Hello%20I%20need%20urgent%20service%20support!"
               target="_blank"
               class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-whatsapp fs-5"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</div>

@endsection
