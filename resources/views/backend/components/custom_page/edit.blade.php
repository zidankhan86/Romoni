@extends('backend.layout.app')
@section('content')
<div class="col-12 card" >
    <form action="{{ route('custom.page.update',$item->id) }}" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Edit</h3>
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title', $item->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{ old('meta_title', $item->meta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" value="{{ old('meta_description', $item->meta_description) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords" value="{{ old('meta_keywords', $item->meta_keywords) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="body" id="summernote" class="form-control" rows="5" placeholder="Body" required>{{ old('body', $item->body) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">

@endpush


@push('scripts')
    <!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $('#summernote').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 4,
      height: 100
    });
  </script>
@endpush
