@extends('frontend.layout.app')


@php
    $page = DB::table('custom_pages')->where('slug', 'about-us')->first();
@endphp


@section('content')


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Album example for Bootstrap</title>

  </head>

  <body>



    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
        <h1>{{$page->title}}</h1>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

         {!! nl2br($page->body) !!}
        </div>
      </div>

    </main>


  </body>
</html>


@endsection
