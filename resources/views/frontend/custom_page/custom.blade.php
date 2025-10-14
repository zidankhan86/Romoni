@extends('frontend.layout.app')

@section('title', $page->meta_title ?? 'Terms & Conditions')

@push('meta')
    <meta name="description" content="{{ $page->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $page->meta_keywords ?? '' }}">
@endpush

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <div class="page-content">
                {!! $page->body !!}
            </div>
        </div>
    </div>
</section>
@endsection
