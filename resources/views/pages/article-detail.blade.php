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
      class="bg-fr-yellow bg-cover bg-top bg-no-repeat pt-0 sm:pt-10 md:pt-20 dark:bg-black dark:bg-article">
      <div
        class="fr-container relative mx-auto transition-all duration-700 ease-in-out">
        <div
          class="bg-fr-red p-4 transition-all duration-700 ease-in-out md:p-8 lg:bg-transparent lg:p-0 dark:bg-fr-yellow">
          <img
            width="auto"
            height="auto"
            class="aspect-square w-full rounded-xl object-cover object-center lg:rounded-none"
            src="{{ $article['image'] }}"
            alt="FresCo" />
        </div>
        <div
          class="hidden h-[250px] w-full bg-fr-red transition-all duration-700 ease-in-out lg:block dark:bg-fr-yellow"></div>
        <div
          class="w-full space-y-4 bg-white p-4 py-8 md:p-8 lg:absolute lg:bottom-0 lg:right-0 lg:w-3/4">
          <article class="space-y-3">
            <h1 class="text-[30px] font-bold leading-10 text-fr-green">
              {{ $article['title'] }}
            </h1>
            <div class="article-wrapper text-base md:text-lg">
              {!! $article['body'] !!}
            </div>
          </article>
        </div>
      </div>
    </div>

    {{-- Article Slide Section --}}
    <article-slide-component
      :data="{{ json_encode($other) }}"></article-slide-component>
  </section>
@endsection

@push('scripts')
  <script>
    if (localStorage.getItem('user_theme') == null) {
      localStorage.setItem('user_theme', 'black');
    }
  </script>
@endpush
