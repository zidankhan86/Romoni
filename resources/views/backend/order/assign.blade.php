@extends('backend.layout.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header text-black">
            <h4 class="mb-0 text-center">Assign Staff to Order #PRY00{{ $order->id }}</h4>
        </div>

        <form action="{{ route('orders.assign', $order->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Staff</label>
                    <select name="staff_id" class="form-control" required>
                        <option value="" disabled selected>Choose staff</option>
                        @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}" {{ $order->staff_id == $staff->id ? 'selected' : '' }}>
                                {{ $staff->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('staff_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary px-4">Assign</button>
            </div>
        </form>
    </div>
</div>
@endsection
