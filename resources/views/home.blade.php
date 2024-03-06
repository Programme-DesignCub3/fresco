@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section id="home">
    {{-- Home Introduction Section --}}
    <home-intro-component :data="{{ json_encode($general) }}"></home-intro-component>

    {{-- Home Product Section --}}
    <product-slide-component
        :black="{{ json_encode($black) }}"
        :cappuccino="{{ json_encode($cappuccino) }}">
    </product-slide-component>

    {{-- Home Video Section --}}
    <home-video-component :data="{{ json_encode($general) }}"></home-video-component>

    {{-- Home Description Section --}}
    <description-component :data="{{ json_encode($general) }}"></description-component>

    {{-- Home Description Section (Mobile) --}}
    <description-slide-component :data="{{ json_encode($general) }}"></description-slide-component>

    {{-- Home Post Section --}}
    <home-post-component
        :activity="{{ json_encode($activity) }}"
        :article="{{ json_encode($article) }}">
    </home-post-component>

    {{-- Home Popup Section --}}
    @if($pinned != null)
        <home-popup-component :data="{{ json_encode($pinned) }}"></home-popup-component>
    @endif
</section>

@endsection
