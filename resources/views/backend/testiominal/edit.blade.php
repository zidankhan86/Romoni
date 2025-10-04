@extends('backend.layout.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-12 col-lg-8 py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Testimonial</h3>
            </div>

            <form action="{{ route('testimonial.update', $testimonial->id) }}" class="card-body" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-control" placeholder="Enter name">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Created At</label>
                        <input type="date" name="created_at" value="{{ old('created_at', $testimonial->created_at->format('Y-m-d')) }}" class="form-control">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($testimonial->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" width="80" class="img-thumbnail" alt="Testimonial Image">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Verified Status</label>
                        <select name="is_verified" class="form-control">
                            <option value="1" {{ $testimonial->is_verified == 1 ? 'selected' : '' }}>Verified</option>
                            <option value="0" {{ $testimonial->is_verified == 0 ? 'selected' : '' }}>Not Verified</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Review</label>
                        <textarea name="review" class="form-control" rows="4">{{ old('review', $testimonial->review) }}</textarea>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Star Rating</label>
                        <div class="d-flex gap-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <label style="cursor: pointer;">
                                    <input type="radio" name="rating" value="{{ $i }}" style="display: none;" {{ $testimonial->rating == $i ? 'checked' : '' }}>
                                    <i class="bi {{ $testimonial->rating >= $i ? 'bi-star-fill text-warning' : 'bi-star' }} fs-4" data-value="{{ $i }}"></i>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('i[data-value]');
    const radios = document.querySelectorAll('input[name="rating"]');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = parseInt(this.getAttribute('data-value'));

            radios.forEach(r => r.checked = false);
            radios[value - 1].checked = true;

            stars.forEach(s => {
                if (parseInt(s.getAttribute('data-value')) <= value) {
                    s.classList.remove('bi-star');
                    s.classList.add('bi-star-fill', 'text-warning');
                } else {
                    s.classList.remove('bi-star-fill', 'text-warning');
                    s.classList.add('bi-star');
                }
            });
        });
    });
});
</script>

@endsection
