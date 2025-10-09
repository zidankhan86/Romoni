@extends('backend.layout.app')
@section('content')

<div class="container mt-5">

    <h2 class="text-center mb-4">Contact Messages</h2>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $key => $contact)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    {{ Str::limit($contact->message, 30) }}
                                </td>
                                <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewContactModal{{ $contact->id }}">
                                         View
                                    </button>

                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewContactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="viewContactModalLabel{{ $contact->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header text-black">
                                            <h5 class="modal-title" id="viewContactModalLabel{{ $contact->id }}">Contact Details</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $contact->name }}</p>
                                            <p><strong>Email:</strong> {{ $contact->email }}</p>
                                            <p><strong>Message:</strong></p>
                                            <p class="border p-2 rounded bg-light">{{ $contact->message }}</p>
                                            <p><strong>Sent At:</strong> {{ $contact->created_at }}</p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
