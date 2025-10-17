@extends('frontend.layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
         <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body text-center">
                    <img src="{{ auth()->user()->image
                        ? asset('uploads/' . auth()->user()->image)
                        : 'https://bootdey.com/img/Content/avatar/avatar3.png' }}"
                        class="rounded-circle mb-3 shadow-sm"
                        width="100" height="100" alt="User Image">


                    <h5 class="fw-semibold mb-1">{{ auth()->user()->name ?? 'Guest User' }}</h5>
                    <p class="text-muted small mb-3">{{ auth()->user()->email ?? 'example@email.com' }}</p>

                    <hr>

                    <ul class="nav flex-column text-start">
                         <li class="nav-item mb-2">
                            <a href="{{ route('userProfile') }}"
                               class="nav-link {{ request()->routeIs('userProfile') ? 'active text-primary fw-semibold' : 'text-secondary' }}">
                                <i class="fa fa-user me-2"></i> Profile
                            </a>
                        </li>
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

        <!-- Profile Info -->
        <div class="col-md-9">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Update Profile</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $user->name) }}">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $user->email) }}">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone', $user->phone) }}">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                           <!-- Gender -->
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label fw-semibold">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="" disabled {{ (old('gender', $user->gender ?? '') == '') ? 'selected' : '' }}>Select your gender</option>
                                    <option value="male" {{ (old('gender', $user->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ (old('gender', $user->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Image -->
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label fw-semibold">Profile Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                @if($user->image)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . auth()->user()->image) }}" class="img-thumbnail rounded" width="80" height="80">
                                </div>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label fw-semibold">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="•••••••">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="•••••••">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- My Orders -->
            <div class="card border-0 shadow-sm rounded-3 mt-4 mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">My Orders</h5>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><strong>#PRY00{{ $order->id }}</strong></td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>৳{{ number_format($order->total_price, 2) }}</td>
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
                    @else
                        <p class="text-muted mb-0">You haven’t placed any orders yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmLogout(event) {
    event.preventDefault();
    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "{{ route('user.logout') }}";
    }
    return false;
}
</script>
@endsection
