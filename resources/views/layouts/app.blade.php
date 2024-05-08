<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="{{ url('/') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script
      type="text/javascript"
      src="https://platform-api.sharethis.com/js/sharethis.js#property=661f4daadf3789001968c543&product=inline-share-buttons&source=platform"
      async="async"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
    @stack('scripts')
  </body>
</html>
