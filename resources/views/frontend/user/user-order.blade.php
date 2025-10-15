@extends('frontend.layout.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body text-center">
                    <img src="{{ auth()->user()->image
                        ? asset('storage/uploads/' . auth()->user()->image)
                        : 'https://bootdey.com/img/Content/avatar/avatar3.png' }}"
                        class="rounded-circle mb-3 shadow-sm" width="100" height="100" alt="User Image">

                    <h5 class="fw-semibold mb-1">{{ auth()->user()->name ?? 'Guest User' }}</h5>
                    <p class="text-muted small mb-3">{{ auth()->user()->email ?? 'example@email.com' }}</p>

                    <hr>

                    <ul class="nav flex-column text-start">
                        <li class="nav-item mb-2">
                            <a href="{{ route('user.order') }}"
                               class="nav-link {{ request()->routeIs('user.order') ? 'active text-primary fw-semibold' : 'text-secondary' }}">
                                <i class="fa fa-shopping-bag me-2"></i> My Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link text-danger"
                               onclick="return confirmLogout(event)">
                                <i class="fa fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Orders Section -->
        <div class="col-md-9">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0 fw-semibold">My Orders</h5>
                </div>

                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Items</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><strong>#ORD{{ $order->id }}</strong></td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>${{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                @if($order->status === 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif($order->status === 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($order->items as $item)
                                                        <li>{{ $item->product_name }} <small class="text-muted">(x{{ $item->quantity }})</small></li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center mb-0">
                            You have no orders yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Logout Confirmation Script --}}
<script>
function confirmLogout(event) {
    event.preventDefault();
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = "{{ route('user.logout') }}";
    }
}
</script>
@endsection
