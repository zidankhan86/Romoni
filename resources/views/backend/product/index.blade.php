@extends('backend.layout.app')
@section('content')

<div class="container mt-5">

    <h2 style="text-align: center">Service</h2>
    <div style="text-align: right">
        <a href="{{ route('product.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add</a>
    </div>
    <div class="col-12 mt-5">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price &#2547;</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} &#2547;</td>
                            <td>{{$product->time}}</td>
                            <td>
                                <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                  {{ $product->status == 'active' ? 'Active' : 'Inactive' }}
                                </span>
                               </td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No data available.
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
