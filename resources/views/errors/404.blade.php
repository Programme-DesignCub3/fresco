<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
        <link rel="canonical" href="{{ url('/') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Halaman Tidak Ditemukan</title>
    </head>
    <body class="antialiased">
        <div class="flex h-[100dvh] w-full items-center justify-center px-4 sm:px-0">
            <div class="text-center">
                <h1 class="bg-gradient-to-r from-fr-darker-red via-fr-red to-[#ce9638] bg-clip-text text-[80px] font-black text-transparent">Oops!</h1>
                <div class="space-y-3">
                    <h3 class="text-2xl font-bold">Halaman Tidak Ditemukan</h3>
                    <p class="w-full text-base sm:w-[500px]">Halaman yang Anda cari mungkin telah dihapus karena namanya diubah atau untuk sementara tidak tersedia.</p>
                </div>
                <div class="mt-6">
                    <a href="/" class="button red">Halaman Utama</a>
                </div>
            </div>
        </div>
    </body>
</html>
