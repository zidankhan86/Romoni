@extends('backend.layout.app')

@section('content')
<br>
<div class="col-12">
    <form class="card shadow-sm border border-secondary" method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" style="max-width: 800px; margin: 0 auto;">
        @csrf
        <div class="card-body p-3">
            <h3 class="text-center mb-3">Add New Staff Member</h3>

            <div class="row g-3">
                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address">
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>

                 <!-- Gender -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Gender</label>
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                        <option value="" disabled {{ (old('gender', $staff->gender ?? '') == '') ? 'selected' : '' }}>Select gender</option>
                        <option value="male" {{ (old('gender', $staff->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ (old('gender', $staff->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Profile Photo -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Profile Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted">JPEG, PNG formats recommended (max 2MB).</small>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white text-end py-3">
            <button type="submit" class="btn btn-primary px-4">Add Staff</button>
        </div>
    </form>
</div>
@endsection
