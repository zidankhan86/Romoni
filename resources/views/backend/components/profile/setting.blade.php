
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

                    <div class="col-3 d-none d-md-block border-end">
                        <!-- Sidebar content goes here -->
                        <h2 style="text-align: center"> My Account</h2>
                        <hr>
                        <h3 style="margin-left: 20px;"><a href="{{ route('change.password') }}">Change Password</a></h3>

                    </div>


                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <h3 class="card-title">Profile Details</h3>
                            <form action="{{ route('registration.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row align-items-center">
                                    <label for="image-upload" style="cursor: pointer;">
                                        <p class="label-txt">Choose Image</p>
                                        <img height="100px" width="100px" id="image-preview" src="{{ asset('/uploads/' . auth()->user()->image) }}" alt="Student Image">
                                        <input type="file" id="image-upload" name="image">
                                    </label>
                                </div>

                                <h3 class="card-title mt-4">Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Name</div>
                                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Email</div>
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Mobile</div>
                                        <input type="text" class="form-control" value="{{ auth()->user()->phone }}" name="phone">
                                    </div>
                                </div>

                                <!-- User Role (no changes allowed) -->



                                <div class="card-footer bg-transparent mt-auto">
                                    <div class="btn-list justify-content-end">
                                        <a href="#" class="btn">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
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

