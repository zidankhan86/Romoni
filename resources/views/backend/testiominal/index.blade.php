@extends('backend.layout.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Testimonials</h2>
    <div class="text-end mb-3">
        <a href="{{ route('testimonial.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add</a>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Review</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $key => $testimonial)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ Str::limit($testimonial->review, 50, '...') }}</td>
                                <td>
                                    @if($testimonial->image)
                                        <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" width="60" class="img-thumbnail" alt="Image">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $testimonial->created_at->format('d M, Y') }}</td>
                                <td>
                                    <span class="badge {{ $testimonial->is_verified ? 'bg-success' : 'bg-danger' }}">
                                        {{ $testimonial->is_verified ? 'Verified' : 'Not Verified' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('testimonial.destroy', $testimonial->id) }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No testimonials available.
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
