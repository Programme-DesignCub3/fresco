@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Artikel')
@section('meta_url', URL::to('/artikel'))
@section('meta_title', 'Artikel')
@section('meta_description', 'Kopi Kapal Api FresCo, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.')
@section('meta_image', asset('assets/images/meta-image.png'))

@section('content')
  <section id="article">
    {{-- Article Header Section --}}
    <header-page-component
      header="article"
      :data="{{ json_encode($pages) }}"></header-page-component>

    {{-- Article List Section --}}
    <div
      class="bg-fr-yellow bg-cover bg-top bg-no-repeat px-4 py-10 sm:px-0 md:py-20 dark:bg-fr-black dark:bg-article">
      <div class="fr-container mx-auto space-y-12">
        <div
          class="flex flex-col justify-between gap-y-8 md:flex-row md:gap-y-12">
          <div class="space-y-12">
            {{-- Page Title --}}
            <h2
              data-aos="flip-down"
              data-aos-delay="400"
              data-aos-duration="1000"
              data-aos-offset="0"
              class="page-title cappuccino dark:black">
              ARTIKEL
            </h2>
            {{-- Searching Text --}}
            @if (request('search'))
              <p class="text-fr-dark dark:text-white">
                Pencarian untuk
                <strong>"{{ request('search') }}"</strong>
              </p>
            @endif
          </div>
          {{-- Search Bar --}}
          <form class="relative" action="{{ url('/artikel') }}">
            <input
              id="searchbar"
              class="relative w-full rounded-lg border-2 border-white bg-transparent bg-white px-9 py-2 text-fr-black outline-none placeholder:text-fr-black md:w-[300px]"
              name="search"
              type="text"
              value="{{ request('search') }}"
              placeholder="Search Keywords...."
              autocomplete="off" />
            <button
              type="button"
              id="searchclear"
              class="absolute right-3 hidden translate-y-2.5 text-fr-black">
              <i class="fa-solid fa-xmark"></i>
            </button>
            <button
              type="submit"
              class="absolute left-3 translate-y-2.5 text-fr-black">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <!-- Card -->
        @if ($article->count() > 0)
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($article as $a)
              <div class="group flex flex-col">
                <div class="w-full overflow-hidden">
                  {{-- Image --}}
                  <img
                    width="auto"
                    height="auto"
                    class="aspect-square object-cover object-center transition-all duration-700 ease-in-out group-hover:scale-110"
                    src="{{ $a->featured_image->url }}"
                    alt="{{ $a->title }}" />
                </div>
                {{-- Detail Card --}}
                <div
                  class="group-hover:bg-radial-red dark:group-hover:bg-radial-red flex-col justify-between space-y-6 bg-fr-green p-6 sm:flex sm:h-full sm:max-h-[300px] sm:space-y-0 dark:bg-fr-yellow">
                  <div class="space-y-1">
                    {{-- Title --}}
                    <h3
                      class="text-xl font-semibold text-white group-hover:text-white dark:text-fr-black">
                      {{ $a->title }}
                    </h3>
                    {{-- Excerpt --}}
                    <p
                      class="font-medium text-white group-hover:text-white dark:text-fr-black">
                      {{ $a->excerpt }}
                    </p>
                  </div>
                  {{-- Read More Button --}}
                  <a
                    href="artikel/{{ $a->slug }}"
                    class="button red group-hover:green dark:group-hover:yellow flex max-w-[140px] items-center md:max-w-[150px]">
                    <span class="flex items-center">
                      READ MORE
                      <i class="fa-solid fa-chevron-right ml-2 text-[11px]"></i>
                    </span>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="flex h-[200px] items-center justify-center">
            <p
              class="text-center text-lg font-medium text-fr-black dark:text-white">
              Artikel tidak ditemukan
            </p>
          </div>
        @endif
        <!-- Pagination -->
        @include('partials.pagination', ['article' => $article])
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    $(document).ready(() => {
      if ($('#searchbar').val() != '') {
        $('#searchclear').removeClass('hidden');
        $('#searchclear').on('click', () => {
          window.location.href = '/artikel';
        });
      }

      $(document).on('input', '#searchbar', function () {
        $('#searchclear').toggleClass('hidden', $(this).val() == '');
      });
      $('#searchclear').on('click', () => {
        $('#searchbar').val('');
        $('#searchclear').addClass('hidden');
      });
    });

    if (localStorage.getItem('user_theme') == null) {
      localStorage.setItem('user_theme', 'black');
    }
  </script>
@endpush
