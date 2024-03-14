@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Artikel')
@section('meta_url', URL::to('/artikel'))
@section('meta_title', 'Artikel')
@section('meta_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, sit!')
@section('meta_image', asset('assets/images/desc-2.png'))

@section('content')

<section id="article">
    {{-- Article Header Section --}}
    <header-page-component header="article"></header-page-component>

    {{-- Article List Section --}}
    <div
        class="px-4 py-10 bg-top bg-no-repeat bg-cover bg-fr-yellow dark:bg-fr-black dark:bg-article sm:px-0 md:py-20">
        <div class="mx-auto space-y-8 fr-container md:space-y-12">
            <!-- Toolbar -->
            <div
                class="flex flex-col justify-between gap-y-8 md:flex-row md:gap-y-12">
                <div class="space-y-6">
                    <h2
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        class="transition-all duration-300 text-shadow text-[30px] font-bold leading-none text-fr-green dark:text-white sm:text-[40px] md:text-[50px]">
                        ARTIKEL
                    </h2>
                    <div
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        data-aos-offset="0"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                @if(request('search'))
                    <p class="text-fr-dark dark:text-white">Pencarian untuk <strong>"{{ request('search') }}"</strong></p>
                @endif
                </div>
                <form class="relative" action="{{ url('/artikel') }}">
                    <input
                        id="searchbar"
                        class="w-full relative rounded-lg border-2 border-white bg-transparent py-2 px-8 outline-none bg-white text-fr-black placeholder:text-fr-black dark:text-white dark:bg-transparent dark:placeholder:text-white md:w-[300px]"
                        name="search"
                        type="text"
                        value="{{ request('search') }}"
                        placeholder="Search Keywords...."
                        autocomplete="off" />
                        <button type="button" id="searchclear" class="hidden absolute right-3 translate-y-2.5 text-black dark:text-white">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    <button
                        type="submit"
                        class="absolute left-3 translate-y-2.5 text-black dark:text-white">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Card -->
            @if ($article->count() > 0)
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($article as $a)
                        <div class="flex flex-col group">
                            <div
                                class="transition-all duration-300 ease-in-out">
                                <div class="w-full overflow-hidden">
                                    <img width="auto" height="auto" class="object-cover object-center transition-all duration-700 ease-in-out aspect-square group-hover:scale-110 sm:w-[384px] sm:h-[384px] " src="{{ $a['image'] }}" alt="FresCo" />
                                </div>
                                <div
                                    class="flex flex-col justify-between p-6 space-y-3 transition-all duration-700 ease-in-out h-auto sm:h-[300px] lg:h-[320px] xl:h-[300px] group-hover:bg-fr-red group-hover:transition-all group-hover:duration-300 group-hover:ease-in-out bg-fr-green dark:bg-fr-yellow">
                                    <div class="space-y-3">
                                        <h3
                                            class="text-xl font-bold text-white group-hover:text-white dark:text-black">
                                            {{ $a['title'] }}
                                        </h3>
                                        <p
                                            class="font-medium text-white group-hover:text-white dark:text-black">
                                            {{ $a['excerpt'] }}
                                        </p>
                                    </div>
                                    <div class="pt-3">
                                        <a
                                            href="artikel/{{ $a['slug'] }}"
                                            class="inline px-6 py-2.5 text-xs font-medium text-white transition-all duration-300 ease-in-out border rounded-lg border-fr-red bg-fr-red group-hover:border md:text-sm group-hover:border-fr-green group-hover:bg-fr-green group-hover:font-medium group-hover:text-white group-hover:hover:bg-fr-darker-green group-hover:hover:border-fr-darker-green dark:group-hover:border-fr-yellow dark:group-hover:bg-fr-yellow dark:group-hover:font-medium dark:group-hover:text-black dark:group-hover:hover:bg-fr-darker-yellow dark:group-hover:hover:border-fr-darker-yellow">
                                            READ MORE
                                            <i class="text-[10px] ps-1 stroke-2 fa-solid fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex justify-center items-center h-[200px]">
                    <p class="text-lg font-medium text-center text-black dark:text-white">Artikel tidak ditemukan</p>
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
            if($('#searchbar').val() != '') {
                $('#searchclear').removeClass('hidden');
            }

            $(document).on('input', '#searchbar', function() {
                $('#searchclear').toggleClass('hidden', $(this).val() == '');
            });
            $('#searchclear').on('click', () => {
                $('#searchbar').val('');
                $('#searchclear').addClass('hidden');
            });
        });

        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
