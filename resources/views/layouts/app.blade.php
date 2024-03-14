<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ url('/') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        @include('partials.meta')
        @include('partials.favicon')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
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
