@extends('frontend.layout.app')

@section('content')

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">🛒 Cart Services</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Discount</th>
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
            <td>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-1">{{ $item->name }}</h6>
                    </div>
                </div>
            </td>
            <td class="text-center">
                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select class="form-select form-select-sm w-auto mx-auto" name="quantity" onchange="this.form.submit()">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" @if($i == $item->quantity) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </form>
            </td>
            <td class="text-center fw-semibold">BDT {{ number_format($item->price * $item->quantity, 2) }}</td>
            <td class="text-center">BDT {{ number_format($item->discount, 2) }}</td>
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
            <td colspan="5" class="text-center py-3">
                No products in the cart.
            </td>
        </tr>
    @endforelse
</tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5 class="mb-0">Subtotal: <span class="fw-bold text-primary">BDT {{ number_format($totalPrice, 2) }}</span></h5>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Shopping
        </a>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-info" href="#" data-toast data-toast-type="success"
                data-toast-position="topRight" data-toast-icon="bi-check-circle" data-toast-title="Your cart"
                data-toast-message="is updated successfully!">Update Cart</a>
            <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
        </div>
    </div>
</div>


@endsection
