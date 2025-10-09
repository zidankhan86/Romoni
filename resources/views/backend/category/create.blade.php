@extends('backend.layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-12 col-lg-8 py-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Form</h3>
                </div>
                <form action="{{ route('category.store') }}" class="card-body" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Type Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Type Name">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Icon</label>
                        <div class="row g-2 border rounded p-3" style="max-height: 240px; overflow-y: auto;">
                            @php
                                $icons = [
                                    'bi-scissors', // Haircut / Barber
                                    'bi-brush', // Makeup / Hair brush
                                    'bi-droplet', // Hair or skin care
                                    'bi-paint-bucket', // Nail polish / beauty color
                                    'bi-gem', // Premium / Jewelry / Glam
                                    'bi-stars', // Highlight / Shine
                                    'bi-moon-stars', // Relax / Spa
                                    'bi-person', // Customer / Profile
                                    'bi-hand-thumbs-up', // Services / Approval
                                    'bi-heart', // Favorite / Wellness
                                    'bi-emoji-smile', // Happy clients
                                    'bi-handbag', // Beauty products
                                    'bi-bucket', // Hair wash / treatment
                                    'bi-calendar', // Appointments
                                    'bi-bell', // Notifications
                                    'bi-droplet-half', // Skin / Moisturizer
                                ];
                            @endphp

                            @foreach ($icons as $icon)
                                <div class="col-2 text-center">
                                    <div class="icon-item p-2 border rounded" style="cursor: pointer;"
                                        data-icon="{{ $icon }}">
                                        <i class="bi {{ $icon }} fs-3"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="icon" id="iconInput" value="">
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .icon-item.active {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconItems = document.querySelectorAll('.icon-item');
            const iconInput = document.getElementById('iconInput');

            iconItems.forEach(item => {
                item.addEventListener('click', function() {
                    iconItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    iconInput.value = this.getAttribute('data-icon');
                });
            });
        });
    </script>
@endsection
