<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="canonical" href="{{ url('/') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        <title>FresCo - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="overflow-x-hidden antialiased">
        <div id="app">
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
        </div>

        @stack('scripts')
    </body>
</html>
