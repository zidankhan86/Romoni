@extends('backend.layout.app')
@section('content')

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .print-table,
        .print-table *,
        .print-only,
        .print-only * {
            visibility: visible;
        }

        .print-table {
            position: absolute;
            left: 0;
            top: 0;
            width: 100% !important;
        }

        .no-print {
            display: none !important;
        }

        .print-only {
            display: block !important;
            margin-bottom: 20px;
        }

        .card {
            box-shadow: none !important;
            border: none !important;
        }

        .table {
            width: 100% !important;
            font-size: 12pt !important;
        }

        .table th,
        .table td {
            padding: 8px !important;
            border: 1px solid #000 !important;
        }

        .table thead {
            background-color: #f8f9fa !important;
        }
    }
</style>

<div class="container mt-5">

    <h2 class="text-center mb-4 no-print">📊 {{ $title }}</h2>

    {{-- Success Message --}}
    @if (session('success'))
    <div class="alert alert-success text-center no-print">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <div class="row mb-4 no-print">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="mb-3 fw-bold">Filter Orders by Date</h6>
                    <form method="GET" action="{{ route('orders.report') }}">
                        <!-- Assuming route name is 'orders.report' -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="from">From Date</label>
                                <input type="date" name="from" id="from" class="form-control" value="{{ $from ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <label for="to">To Date</label>
                                <input type="date" name="to" id="to" class="form-control" value="{{ $to ?? '' }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <button type="button" id="todayBtn" class="btn btn-secondary me-2">Today</button>
                                <button type="button" id="resetBtn" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Print-Only Filter Info -->
    <div class="print-only mb-3" style="display: none;">
        <h5>Filtered Orders{{ $from || $to ? ' from ' . ($from ?? 'beginning') . ' to ' . ($to ?? 'end') : '' }}</h5>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4 no-print">
        <!-- Daily Orders Chart -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-center mb-3 fw-bold">Daily Orders (Last 7 Days)</h6>
                    <canvas id="dailyChart" height="160"></canvas>
                </div>
            </div>
        </div>

        <!-- Weekly Orders Chart -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-center mb-3 fw-bold">Weekly Orders (Last 4 Weeks)</h6>
                    <canvas id="weeklyChart" height="160"></canvas>
                </div>
            </div>
        </div>

        <!-- Monthly Orders Chart -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-center mb-3 fw-bold">Monthly Orders (Last 6 Months)</h6>
                    <canvas id="monthlyChart" height="160"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-3 no-print">
        <button onclick="window.print()" class="btn btn-success">Print Report</button>
    </div>
    <!-- Orders Table Section -->
    <div class="col-12 mt-3 print-table">
        <div class="card shadow-sm">

            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Products</th>
                            <th class="no-print">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>#PRY00{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>৳{{ number_format($order->total_price, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>
                                <ul class="mb-1">
                                    @foreach($order->items as $item)
                                    <li>{{ $item->product_name }} ({{ $item->quantity }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="no-print">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('orders.assign.form', $order->id) }}"
                                        class="btn btn-secondary btn-sm">
                                        Assign Staff
                                    </a>
                                    <a href="{{ route('invoice', $order->id) }}" class="btn btn-info btn-sm">
                                        Invoice
                                    </a>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                No data available
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // === DAILY CHART ===
    const dailyCtx = document.getElementById("dailyChart").getContext("2d");
    new Chart(dailyCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($dailyLabels) !!},
            datasets: [{
                label: 'Orders',
                data: {!! json_encode($dailyData) !!},
                backgroundColor: '#4CAF50'
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // === WEEKLY CHART ===
    const weeklyCtx = document.getElementById("weeklyChart").getContext("2d");
    new Chart(weeklyCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($weeklyLabels) !!},
            datasets: [{
                label: 'Orders',
                data: {!! json_encode($weeklyData) !!},
                backgroundColor: '#2196F3'
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // === MONTHLY CHART ===
    const monthlyCtx = document.getElementById("monthlyChart").getContext("2d");
    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($monthlyLabels) !!},
            datasets: [{
                label: 'Orders',
                data: {!! json_encode($monthlyData) !!},
                backgroundColor: '#FF9800'
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Today Button Functionality
    document.getElementById('todayBtn').addEventListener('click', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('from').value = today;
        document.getElementById('to').value = today;
        document.querySelector('form[action="{{ route('orders.report') }}"]').submit();
    });

    // Reset Button Functionality
    document.getElementById('resetBtn').addEventListener('click', function() {
        document.getElementById('from').value = '';
        document.getElementById('to').value = '';
        document.querySelector('form[action="{{ route('orders.report') }}"]').submit();
    });
});
</script>

@endsection
