@extends('frontend.layout.app')

@section('content')
@php
    $settings = DB::table('settings')->first();
@endphp

<!-- Flatpickr CSS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    /* Custom styling for date picker and time slot */
    .flatpickr-input {
        width: 120px !important;
        font-size: 0.875rem;
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        background-color: #fff;
        color: #495057;
        text-align: center;
        cursor: pointer;
    }
    .flatpickr-input:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        outline: none;
    }
    .form-select-sm {
        width: 120px !important;
        font-size: 0.875rem;
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        background-color: #fff;
        color: #495057;
    }
    .form-select-sm:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        outline: none;
    }
    .date-time-container {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        align-items: center;
    }
    /* Ensure table cell alignment */
    .table td {
        vertical-align: middle;
    }
</style>

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
                            <th class="text-center">Date & Time</th>
                            <th class="text-center">
                                <form action="{{ route('cart.clear') }}">
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Clear Cart</button>
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
                                            @for ($i = 1; $i <= 3; $i++)
                                                <option value="{{ $i }}" @if ($i == $item->quantity) selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </form>
                                </td>
                                <!-- Subtotal -->
                                <td class="text-center fw-semibold">
                                    BDT {{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                                <!-- Date & Time -->
                                <td class="text-center">
                                    <div class="date-time-container">
                                        <!-- Date Picker -->
                                        <form action="{{ route('cart.updateDate', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                           <input type="text" class="form-control form-control-sm flatpickr-input"
       name="date"
       value="{{ $item->attributes->date ? \Carbon\Carbon::parse($item->attributes->date)->format('d-m-Y') : now()->addDays(1)->format('d-m-Y') }}"
       readonly="readonly">
                                        </form>
                                        <!-- Time Slot -->
                                        <!-- Time Slot (unchanged) -->
                                        <form action="{{ route('cart.updateTime', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="time" class="form-select form-select-sm" onchange="this.form.submit()">
                                                @for ($hour = 10; $hour <= 17; $hour++)
                                                    @php
                                                        $timeValue = sprintf('%02d:00', $hour);
                                                        $timeDisplay = \Carbon\Carbon::createFromTime($hour)->format('g A');
                                                        $selectedTime = $item->attributes->time ?? null;
                                                    @endphp
                                                    <option value="{{ $timeValue }}" {{ $selectedTime == $timeValue ? 'selected' : '' }}>
                                                        {{ $timeDisplay }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </form>
                                    </div>
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
            Subtotal: <span class="fw-bold text-primary">BDT {{ number_format($totalPrice, 2) }}</span>
        </h5>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between mb-5">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Add More Services
        </a>
        <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
    </div>

    <!-- ⚠️ Emergency WhatsApp Support -->
    <div class="card border-warning mb-4">
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <h5 class="text-warning fw-bold mb-1">⚠️ Need Emergency Assistance?</h5>
                <p class="mb-0 text-dark">Contact our support team instantly on WhatsApp for urgent service-related issues.</p>
            </div>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->phone ?? '') }}?text=Hello%20I%20need%20urgent%20service%20support!" target="_blank" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-whatsapp fs-5"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('.flatpickr-input', {
            dateFormat: 'd-m-Y',
            minDate: '{{ \Carbon\Carbon::tomorrow()->format('d-m-Y') }}',
            maxDate: '{{ \Carbon\Carbon::today()->addDays(31)->format('d-m-Y') }}',
            onChange: function(selectedDates, dateStr, instance) {
                instance.element.form.submit();
            },
            onClose: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    instance.element.form.submit();
                }
            },
            theme: 'material_green',
            disableMobile: true,
        });
    });
</script>

@endsection
