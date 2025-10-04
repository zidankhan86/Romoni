@extends('backend.layout.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-12 col-lg-8 py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Testimonial</h3>
            </div>

            <form action="{{ route('testimonial.store') }}" class="card-body" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Verified Status</label>
                        <select name="is_verified" class="form-control">
                            <option value="1">Verified</option>
                            <option value="0">Not Verified</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Review</label>
                        <textarea name="review" class="form-control" rows="4" placeholder="Write review"></textarea>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Star Rating</label>
                        <div class="d-flex gap-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <label style="cursor: pointer;">
                                    <input type="radio" name="rating" value="{{ $i }}" style="display: none;">
                                    <i class="bi bi-star fs-4" data-value="{{ $i }}"></i>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Create Testimonial</button>
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
