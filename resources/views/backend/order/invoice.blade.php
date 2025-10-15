@extends('backend.layout.app')

@section('content')

<div class="page-wrapper">

    <!-- PAGE HEADER -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Invoice</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="window.print();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-1">
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                        </svg>
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- PAGE BODY -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">

                    <div class="row">
                        <!-- Company Info -->
                        <div class="col-6">
                            <p class="h3">Company</p>
                            <address>
                                Street Address<br>
                                State, City<br>
                                Region, Postal Code<br>
                                ltd@example.com
                            </address>
                        </div>

                        <!-- Client Info -->
                        <div class="col-6 text-end">
                            <p class="h3">Client</p>
                            <address>
                                {{ $order->name }}<br>
                                {{ $order->street ?? '' }}<br>
                                {{ $order->zipcode ?? '' }}<br>
                                {{ $order->email }}
                            </address>
                        </div>

                        <div class="col-12 my-5">
                            <h1>Invoice INV/PRY{{ $order->id }}</h1>
                        </div>
                    </div>

                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%">#</th>
                                <th>Service</th>
                                <th class="text-center" style="width: 1%">Qnt</th>
                                <th class="text-end" style="width: 1%">Unit</th>
                                <th class="text-end" style="width: 1%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $item->product_name }}</p>
                                        <div class="text-secondary">
                                            {{-- @if($item->attributes)
                                                {{ json_encode($item->attributes) }}
                                            @endif --}}
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">৳{{ number_format($item->product_price, 2) }}</td>
                                    <td class="text-end">৳{{ number_format($item->product_price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="4" class="strong text-end">Subtotal</td>
                                <td class="text-end">৳{{ number_format($order->total_price, 2) }}</td>
                            </tr>

                            @php
                                $vatRate = 0.05; // Vat Rate
                                $vatDue = $order->total_price * $vatRate;
                                $totalDue = $order->total_price + $vatDue;
                            @endphp

                            <tr>
                                <td colspan="4" class="strong text-end">Vat Rate</td>
                                <td class="text-end">5%</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Vat Due</td>
                                <td class="text-end">৳{{ number_format($vatDue, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                <td class="font-weight-bold text-end">৳{{ number_format($totalDue, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="text-secondary text-center mt-5">
                        Thank you very much for doing business with us. We look forward to working with you again!
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
