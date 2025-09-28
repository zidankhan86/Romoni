<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-lg rounded"
                    style="background-image: url('{{ asset('storage/uploads/' . auth()->user()->image) }}')"></span>
            </div>
            <div class="col">
                <h1 class="fw-bold">{{ auth()->user()->name }}</h1>

            </div>

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row g-3">

            <div class="col-lg-6">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Basic info</div>
                                <div class="mb-2">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-message-2" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 9h8"></path>
                                        <path d="M8 13h6"></path>
                                        <path
                                            d="M9 18h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-3l-3 3l-3 -3z">
                                        </path>
                                    </svg> Email: <strong>{{ auth()->user()->email }}</strong>
                                </div>

                                <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0 M12 7v5l3 3" />
                                    </svg>Created at: <strong>{{auth()->user()->created_at->format('h:i A, d M Y') }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
