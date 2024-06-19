<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html-element">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="{{ URL::current() }}" />
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}" />
    @stack('top-scripts')
    @include('partials.meta')
    @include('partials.favicon')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="overflow-x-hidden antialiased">
    <div id="app">
      @include('partials.header')
      @yield('content')
      @include('partials.footer')
    </div>
    @stack('bottom-scripts')
  </body>
</html>
