@extends('backend.layout.app')
@section('content')

<div class="page">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">

                    <div class="col-3 d-none d-md-block border-end mt-3">
                        <!-- Sidebar content goes here -->
                        <h2 style="text-align: center"> My Account</h2>
                        <hr>
                        <h3 style="margin-left: 20px;"><a href="{{ route('change.password') }}">Change Password</a></h3>

                    </div>


                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <h3 class="card-title mb-3">Profile Details</h3>

                            <form action="{{ route('registration.update', auth()->user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Profile Image -->
                                <div class="mb-4 text-center">
                                    <label for="image-upload" style="cursor: pointer;">
                                        <p class="label-txt mb-2">Choose Image</p>
                                        <img id="image-preview"
                                            src="{{ auth()->user()->image ? asset('uploads/' . auth()->user()->image) : asset('default.webp') }}"
                                            alt="Profile Image" class="rounded-circle border"
                                            style="height: 120px; width: 120px; object-fit: cover;">

                                        <input type="file" id="image-upload" name="image" class="d-none">
                                    </label>
                                </div>

                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}">
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}">
                                </div>

                                <!-- Mobile -->
                                <div class="mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ auth()->user()->phone }}">
                                </div>

                                <!-- Footer -->
                                <div class="card-footer bg-transparent mt-4 px-0">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="#" class="btn btn-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
