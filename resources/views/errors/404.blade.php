<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="canonical" href="{{ url('/') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}" />
    @include('partials.favicon')
    <title>FresCo - Halaman Tidak Ditemukan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="antialiased">
    <div
      class="flex h-[100dvh] w-full items-center justify-center px-4 sm:px-0">
      <div class="text-center">
        <h1
          class="bg-gradient-to-r from-fr-darker-red via-fr-red to-[#ce9638] bg-clip-text text-[80px] font-black text-transparent">
          Oops!
        </h1>
        <div class="space-y-3">
          <h3 class="text-2xl font-bold">Halaman Tidak Ditemukan</h3>
          <p class="w-full text-base sm:w-[500px]">
            Halaman yang Anda cari mungkin telah dihapus karena namanya diubah
            atau untuk sementara tidak tersedia.
          </p>
        </div>
        <div class="mt-6">
          <a
            href="/"
            class="rounded-lg bg-fr-red px-6 py-2.5 font-medium text-white transition-all duration-300 hover:bg-fr-darker-red">
            Halaman Utama
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
