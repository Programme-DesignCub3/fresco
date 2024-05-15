@extends('layouts.app')

{{-- Meta --}}
@section('title', $article->title)
@section('meta_url', URL::to('/artikel/' . $article->slug))
@section('meta_title', $article->title)
@section('meta_description', $article->excerpt)
@section('meta_image', $article->featured_image->url)

@section('content')
  <section id="detail-article">
    <div
      class="bg-fr-yellow bg-cover bg-top bg-no-repeat pt-0 transition-all duration-700 ease-in-out md:pt-48 dark:bg-fr-black dark:bg-article">
      <div class="fr-container mx-auto">
        <div
          class="flex w-full flex-col bg-white px-4 pb-10 pt-24 sm:pt-4 md:px-8 md:pb-16 md:pt-8 lg:px-16 lg:pb-24 lg:pt-16">
          <div class="space-y-6 md:space-y-10">
            <img
              width="auto"
              height="auto"
              class="aspect-video w-full object-cover object-center"
              src="{{ $article->featured_image->url }}"
              alt="{{ $article->title }}" />
            <article class="space-y-3">
              <h1 class="text-3xl font-bold text-fr-green md:text-4xl">
                {{ $article->title }}
              </h1>
              <div class="space-y-6 text-base md:text-lg">
                @foreach ($article->content as $c)
                  @switch($c['type'])
                    @case('paragraph')
                      <div>
                        {!! $c['data']['content'] !!}
                      </div>

                      @break
                    @case('image')
                      <div
                        style="
                          display: flex;
                          justify-content: {{ array_key_exists('data', $c) && array_key_exists('image_align', $c['data']) ? $c['data']['image_align'] : 'center' }};
                        ">
                        <x-curator-glider
                          style="width: {{ array_key_exists('data', $c) && array_key_exists('image_width', $c['data']) ? $c['data']['image_width'] . '%' : 'auto' }}"
                          class="max-w-full"
                          :media="$c['data']['content']"></x-curator-glider>
                      </div>

                      @break
                    @case('video')
                      <div
                        style="
                          display: flex;
                          justify-content: {{ array_key_exists('data', $c) && array_key_exists('video_align', $c['data']) ? $c['data']['video_align'] : 'center' }};
                        ">
                        <iframe
                          style="
                            width: {{ array_key_exists('data', $c) && array_key_exists('video_width', $c['data']) ? $c['data']['video_width'] . '%' : 'auto' }};
                          "
                          class="aspect-video"
                          src="https://www.youtube.com/embed/{{ $c['data']['content'] }}"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                          referrerpolicy="strict-origin-when-cross-origin"
                          allowfullscreen></iframe>
                      </div>

                      @break
                  @endswitch
                @endforeach
              </div>
            </article>
          </div>
          <div class="mt-6 space-y-6 md:mt-10 md:space-y-10">
            <div class="sharethis-inline-share-buttons"></div>
            <a href="{{ URL::to('/artikel') }}" class="button red">
              <span class="flex items-center">
                <i class="fa-solid fa-chevron-left mr-2 text-[11px]"></i>
                BACK
              </span>
            </a>
          </div>
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
