
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
                        <h2 style="text-align: center"> My Account</h2><hr>
                        <h3 style="margin-left: 20px;">Change Password</h3>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <h3 class="card-title">Profile Details</h3>
                            <form action="{{ route('update.password', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf



                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h3 class="card-title mt-4">Old Password</h3>
                                        <div>
                                            <input type="password" name="old_password" class="btn" placeholder="Old Password" value="{{ old('old_password') }}">
                                            @error('old_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="card-title mt-4">New Password</h3>
                                        <div>
                                            <input type="password" name="new_password" class="btn" placeholder="New Password" value="{{ old('new_password') }}">
                                            @error('new_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="card-title mt-4">Confirm Password</h3>
                                        <div>
                                            <input type="password" name="confirm_password" class="btn" placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                                            @error('confirm_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

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

