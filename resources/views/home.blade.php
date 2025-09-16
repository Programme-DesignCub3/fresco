@extends('layouts.app')

@section('content')
    <section id="home" class="bg-gradient-yellow overflow-hidden dark:bg-batik">
        <home-intro-component :data="{{ json_encode($pages) }}"></home-intro-component>
        <home-video-component :data="{{ json_encode($pages) }}"></home-video-component>
        <home-post-component :data="{{ json_encode($article) }}"></home-post-component>
        @if ($promotion != null)
            <home-popup-component :data="{{ json_encode($promotion) }}"></home-popup-component>
        @endif
    </section>
@endsection
