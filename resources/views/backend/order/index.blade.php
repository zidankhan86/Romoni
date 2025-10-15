@extends('backend.layout.app')
@section('content')

<div class="container mt-5">

    <h2 style="text-align: center">Orders</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="col-12 mt-5">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                            <td>
                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                {{-- List products --}}
                                <ul class="mb-1">
                                    @foreach($order->items as $item)
                                        <li>{{ $item->product_name }} ({{ $item->quantity }})</li>
                                    @endforeach
                                </ul>

                                <a href="{{ route('orders.assign.form', $order->id) }}" class="btn btn-secondary btn-sm">
                                    Assign Staff
                                </a>
                                <a href="{{ route('invoice',$item->id) }}" class="btn btn-info btn-sm">Invoice</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">
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

@endsection
