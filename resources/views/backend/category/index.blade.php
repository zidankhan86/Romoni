@extends('backend.layout.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Categories</h2>
    <div class="text-end mb-3">
        <a href="{{ route('category.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add</a>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td><i class="{{ $category->icon }} fs-1 text-dark"></i></td>
                                <td>
                                    <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('category.destroy', $category->id) }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this category?')">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No categories available.
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
