@extends('backend.layout.app')

@section('content')
<br>
<div class="col-12">
    <form class="card shadow-sm border border-secondary" method="POST" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data" style="max-width: 800px; margin: 0 auto;">
        @csrf
        <div class="card-body p-3">
            <h3 class="text-center mb-3">Edit Staff Member</h3>

            <div class="row g-3">
                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $staff->name) }}" class="form-control" required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $staff->email) }}" class="form-control">
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', $staff->phone) }}" class="form-control">
                </div>

                 <!-- Expert -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Expert At</label>
                    <input type="text" name="expert" value="{{ old('expert', $staff->expert) }}" class="form-control" placeholder="Hair">
                </div>

                  <!-- Gender -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                            <option value="" disabled {{ old('gender', $staff->gender ?? '') == '' ? 'selected' : '' }}>Select gender</option>
                            <option value="male" {{ old('gender', $staff->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $staff->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                <!-- Profile Photo -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Profile Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted">Upload new photo to replace the existing one.</small>

                    @if($staff->photo)
                        <div class="mt-2">
                            <img src="{{ asset($staff->photo) }}" alt="Staff Photo" width="80" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ $staff->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $staff->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white text-end py-3">
            <button type="submit" class="btn btn-primary px-4">Update Staff</button>
        </div>
    </form>
</div>
@endsection
