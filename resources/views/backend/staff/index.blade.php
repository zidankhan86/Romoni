@extends('backend.layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Staff List</h2>
    <div class="text-end mb-3">
        <a href="{{ route('staff.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($staffs as $key => $staff)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>
                                @if($staff->photo)
                                    <img src="{{ asset($staff->photo) }}" width="50" class="rounded-circle">
                                @else
                                    <span class="text-muted">No photo</span>
                                @endif
                            </td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>
                                <span class="badge {{ $staff->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $staff->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            
                            <td>
                                <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No staff available.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
