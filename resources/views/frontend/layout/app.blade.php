<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                {{-- style --}}

        @include('frontend.components.fixed.style')

    </head>
    <body>

                {{-- header --}}

        @include('frontend.components.fixed.header')




        @yield('content')



              {{-- footer --}}

        @include('frontend.components.fixed.footer')

                {{-- js --}}
        @include('frontend.components.fixed.script')
        @stack('scripts')


    </body>
</html>
