@extends('backend.layout.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-12 col-lg-8 py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Custom Page</h3>
            </div>

            <form action="{{ route('custom.page.update', $item->id) }}" class="card-body" method="POST">
                @csrf
                <div class="row g-3">
                    {{-- Title --}}
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title', $item->title) }}" required>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Body --}}
                    <div class="col-12">
                        <label class="form-label">Body</label>
                        <textarea name="body" id="summernote" class="form-control" rows="8" placeholder="Body" required>{{ old('body', $item->body) }}</textarea>
                    </div>
                </div>

                <div class="card-footer text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
