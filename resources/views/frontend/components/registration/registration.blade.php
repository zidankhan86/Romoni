<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign up - Priyoz</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body class="d-flex flex-column">
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('static/logo.svg') }}" height="36" alt="">
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Create a new account</h2>
                    <div class="mb-3">
                        <label class="form-label">Full Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address <strong class="text-danger">*</strong></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
    <label class="form-label">Phone <strong class="text-danger">*</strong></label>
    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Gender</label>
    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
        <option value="" disabled {{ (old('gender', $user->gender ?? '') == '') ? 'selected' : '' }}>Select your gender</option>
        <option value="male" {{ (old('gender', $user->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
        <option value="female" {{ (old('gender', $user->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
    </select>
    @error('gender')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">Select Profile Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                    <div class="mb-3">
                        <label class="form-label">Password <strong class="text-danger">*</strong></label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                    </svg>
                                </a>
                            </span>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input @error('agree_terms') is-invalid @enderror" name="agree_terms" required/>
                            <span class="form-check-label">Agree to the <a href="{{ route('termsCondition') }}" tabindex="-1">terms and policy</a>.</span>
                        </label>
                        @error('agree_terms')
                            <div class="invalid-feedback">You must agree to the terms and conditions</div>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center text-muted mt-3">
            Already have an account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
</body>
</html>
