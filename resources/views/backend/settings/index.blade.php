@extends('backend.layout.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-12 col-lg-8 py-5">
        <form action="{{ route('settings.update', $setting->id) }}" method="POST" class="card">
            @csrf
            @method('PUT')

            <div class="card-header">
                <h3 class="card-title">Website Settings</h3>
            </div>

            <div class="card-body row">
                <!-- Facebook -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">Facebook Link</label>
                    <input type="text" name="facebook_link" class="form-control"
                           placeholder="Enter Facebook Page URL"
                           value="{{ old('facebook_link', $setting->facebook_link) }}">
                </div>

                <!-- Instagram -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">Instagram Link</label>
                    <input type="text" name="instagram_link" class="form-control"
                           placeholder="Enter Instagram Profile URL"
                           value="{{ old('instagram_link', $setting->instagram_link) }}">
                </div>

                <!-- YouTube -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">YouTube Link</label>
                    <input type="text" name="youtube_link" class="form-control"
                           placeholder="Enter YouTube Channel URL"
                           value="{{ old('youtube_link', $setting->youtube_link) }}">
                </div>

                <!-- Phone -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control"
                           placeholder="Enter Phone Number"
                           value="{{ old('phone', $setting->phone) }}">
                </div>

                <!-- Top Bar Text -->
                <div class="mb-3 col-md-12">
                    <label class="form-label">Top Bar Text</label>
                    <input type="text" name="top_var_text" class="form-control"
                           placeholder="Enter Text for Top Bar (e.g., Welcome to Priyoz!)"
                           value="{{ old('top_var_text', $setting->top_var_text) }}">
                </div>

                <!-- Copyright -->
                <div class="mb-3 col-md-12">
                    <label class="form-label">Copyright Text</label>
                    <textarea name="copyright_text" class="form-control" rows="3"
                              placeholder="Enter copyright notice">{{ old('copyright_text', $setting->copyright_text) }}</textarea>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </div>
        </form>
    </div>
</div>

@endsection
