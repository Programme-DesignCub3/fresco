@extends('layouts.app')

{{-- Meta --}}
@section('title', $article['title'])
@section('meta_url', URL::to('/artikel/' . $article['slug']))
@section('meta_title', $article['title'])
@section('meta_description', $article['excerpt'])
@section('meta_image', $article['image'])

@section('content')

<section>
    {{-- Article Header Section --}}
    <header-page-component header="article-detail"></header-page-component>

    {{-- Article Detail Section --}}
    <div
        class="pt-0 bg-top bg-no-repeat bg-cover bg-fr-yellow sm:pt-10 md:pt-20 dark:bg-black dark:bg-article">
        <div
            class="relative mx-auto transition-all duration-700 ease-in-out fr-container">
            <div class="p-4 transition-all duration-700 ease-in-out bg-fr-red dark:bg-fr-yellow md:p-8 lg:bg-transparent lg:p-0">
                <img
                    width="auto"
                    height="auto"
                    class="object-cover object-center w-full rounded-xl lg:rounded-none aspect-square"
                    src="{{ $article['image'] }}"
                    alt="FresCo" />
            </div>
            <div class="w-full h-[250px] transition-all duration-700 ease-in-out bg-fr-red hidden dark:bg-fr-yellow lg:block"></div>
            <div
                class="w-full p-4 py-8 space-y-4 bg-white md:p-8 lg:absolute lg:bottom-0 lg:right-0 lg:w-3/4">
                <article class="space-y-3">
                    <h1 class="text-[30px] font-bold text-fr-green leading-10">
                        {{ $article['title'] }}
                    </h1>
                    <div class="text-base article-wrapper md:text-lg">
                        {!! $article['body'] !!}
                    </div>
                </article>
            </div>
        </div>
    </div>

    {{-- Article Slide Section --}}
    <article-slide-component :data="{{ json_encode($other) }}"></article-slide-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
