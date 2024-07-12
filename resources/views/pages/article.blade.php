@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Artikel')
@section('meta_url', URL::to('/artikel'))
@section('meta_title', 'Artikel')
@section('meta_description', 'Kopi Kapal Api Fresco, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.')
@section('meta_image', asset('assets/images/meta-image.png'))

@section('content')
    <section id="article">
        {{-- Article Header Section --}}
        <header-page-component
            header="article"
            :data="{{ json_encode($pages) }}"></header-page-component>

        {{-- Article List Section --}}
        <div
            class="bg-fr-yellow bg-cover bg-top bg-no-repeat px-4 py-10 md:px-0 md:py-20 dark:bg-fr-black dark:bg-article">
            <div class="fr-container mx-auto space-y-12">
                <div
                    class="flex flex-col justify-between gap-y-8 md:flex-row md:gap-y-12">
                    <div class="space-y-12">
                        <h2
                            data-aos="flip-down"
                            data-aos-delay="400"
                            data-aos-duration="1000"
                            data-aos-offset="0"
                            class="page-title cappuccino dark:black">
                            ARTIKEL
                        </h2>
                        @if (request('search'))
                            <p class="text-fr-dark dark:text-white">
                                Pencarian untuk
                                <strong>"{{ request('search') }}"</strong>
                            </p>
                        @endif
                    </div>
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
                @if ($article->count() > 0)
                    <div
                        class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($article as $a)
                            <a
                                href="artikel/{{ $a->slug }}"
                                class="group grid grid-cols-2 bg-fr-green md:flex md:flex-col dark:bg-fr-yellow">
                                <div>
                                    <img
                                        width="auto"
                                        height="auto"
                                        class="aspect-square w-full object-cover object-center transition-all duration-700 ease-in-out"
                                        src="{{ $a->featured_image->url }}"
                                        alt="{{ $a->title }}" />
                                </div>
                                <div
                                    class="group-hover:bg-radial-red dark:group-hover:bg-radial-red flex h-full flex-col gap-3 p-4 md:p-6">
                                    <div
                                        class="flex flex-col-reverse gap-3 text-white md:flex-col md:gap-0 dark:text-fr-black">
                                        <h3
                                            class="font-semibold group-hover:text-white sm:text-lg md:text-xl">
                                            {{ $a->title }}
                                        </h3>
                                        <p
                                            class="md:text-md text-sm group-hover:text-white">
                                            {{ $a->timestamp }}
                                        </p>
                                    </div>
                                    <p
                                        class="hidden text-white group-hover:text-white md:block dark:text-fr-black">
                                        {{ $a->excerpt }}
                                    </p>
                                </div>
                            </a>
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
                @include('partials.pagination', ['article' => $article])
            </div>
        </div>
    </section>
@endsection

@push('top-scripts')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endpush

@push('bottom-scripts')
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
