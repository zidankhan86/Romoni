@extends('frontend.layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                         class="rounded-circle mb-3" width="100" height="100" alt="User">
                    <h5 class="mb-1">Mirpur 10</h5>
                    <p class="text-muted small mb-3">d@gmail.com</p>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link active text-primary"><i class="fa fa-user me-2"></i> Profile</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-secondary"><i class="fa fa-shopping-bag me-2"></i> My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-danger"><i class="fa fa-sign-out-alt me-2"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="col-md-9">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Update Profile</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="Mirpur 10" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="d@gmail.com" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="01776718178" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label fw-semibold">Profile Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="•••••••">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- My Orders -->
            <div class="card border-0 shadow-sm rounded-3 mt-4 mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">My Orders</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>#ORD1234</td>
                                <td>2025-10-14</td>
                                <td>$120.00</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>#ORD1235</td>
                                <td>2025-10-10</td>
                                <td>$85.50</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
