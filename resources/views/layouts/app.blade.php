<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FresCo - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
        </div>
    </body>
</html>
