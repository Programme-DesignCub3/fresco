<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html-element">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="title" content="{{ $metaData['title'] }} - {{ env('APP_NAME') }}" />
        <meta name="description" content="{{ $metaData['description'] }}" />
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $metaData['url'] }}" />
        <meta property="og:title" content="{{ $metaData['title'] }} - {{ env('APP_NAME') }}" />
        <meta property="og:description" content="{{ $metaData['description'] }}" />
        <meta property="og:image" content="{{ $metaData['image'] }}" />
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="{{ $metaData['url'] }}" />
        <meta property="twitter:title" content="{{ $metaData['title'] }} - {{ env('APP_NAME') }}" />
        <meta property="twitter:description" content="{{ $metaData['description'] }}" />
        <meta property="twitter:image" content="{{ $metaData['image'] }}" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}" />
        <meta name="theme-color" content="#ffffff" />
        {{-- Favicon --}}
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}" />
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}" />
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}" />
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon/android-icon-192x192.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}" />
        <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}" />
        <link rel="canonical" href="{{ $metaData['url'] }}" />
        <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}" />
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_TAG_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ env('GOOGLE_TAG_ID') }}');
        </script>
        @stack('top-scripts')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $metaData['title'] }} - {{ env('APP_NAME') }}</title>
    </head>
    <body class="overflow-x-hidden antialiased">
        <div id="app">
            @if (request()->path() == '/')
                <menu-component :data="{{ json_encode($black) }}"></menu-component>
            @endif

            <navbar-component :data="{{ json_encode($general) }}"></navbar-component>
            @yield('content')
            <footer-component :data="{{ json_encode($general) }}"></footer-component>
            <social-media-component :data="{{ json_encode($general) }}"></social-media-component>
        </div>
        @stack('bottom-scripts')
    </body>
</html>
