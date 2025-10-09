@extends('backend.layout.app')

@section('content')
<br>
<div class="col-12">
    <form class="card shadow-sm border border-secondary" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" style="max-width: 1000px; margin: 0 auto;">
        @csrf
        <div class="card-body p-3">
            <h3 class="text-center mb-3">Create a New Service</h3>

            <div class="row g-3">
                <!-- Title -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter service title" required>
                </div>

                <!-- Category -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Price (৳)</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01" min="0" required>
                </div>

                <!-- Time -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Time</label>
                    <input type="text" name="time" class="form-control" placeholder="Enter time" required>
                </div>

                <!-- Thumbnail -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Thumbnail Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    <small class="text-muted">JPEG, PNG formats recommended.</small>
                </div>

                <!-- Product Images -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Additional Images</label>
                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
                    <small class="text-muted">You can upload multiple images.</small>
                </div>

                <!-- Short Description -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" rows="3" class="form-control text-editor" placeholder="Write a short summary..." required></textarea>
                </div>

                <!-- Full Description -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Full Description</label>
                    <textarea name="description" rows="5" class="form-control text-editor" placeholder="Write a detailed description..." required></textarea>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Is Popular -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Popular?</label>
                    <select name="is_popular" class="form-control" required>
                        <option value="" disabled selected>Select option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white text-end py-3">
            <button type="submit" class="btn btn-primary px-4">Create Product</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')

@endpush
