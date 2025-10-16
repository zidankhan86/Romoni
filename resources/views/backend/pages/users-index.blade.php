@extends('backend.layout.app')
@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">Register Clients</h2>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Gender</th>  <!-- Added Gender Column -->
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key => $clients)
                                 <tr>
                                <td>{{$key+1}}</td>
                                <td data-label="Name">
                                    <div class="d-flex py-1 align-items-center">
                                        <div class="flex-fill">
                                            <div class="font-weight-medium">{{$clients->name}}</div>
                                            <div class="text-muted"><a href="#"
                                                    class="text-reset">{{$clients->email}}</a></div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Phone">
                                    <div>{{$clients->phone}}</div>
                                </td>
                                <td data-label="Gender">
                                    <div>{{$clients->gender}}</div> <!-- Added Gender Data -->
                                </td>
                                <td class="text-muted" data-label="Joined">
                                    {{ $clients->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
