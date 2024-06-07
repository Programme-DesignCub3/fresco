@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Beranda')
@section('meta_url', URL::to('/'))
@section('meta_title', 'Beranda')
@section('meta_description', 'Kopi Kapal Api FresCo, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.')
@section('meta_image', asset('assets/images/meta-image.png'))

@section('content')
  <section id="home">
    {{-- Home Introduction Section --}}
    <home-intro-component
      :data="{{ json_encode($pages) }}"></home-intro-component>

    {{-- Home Product Section --}}
    <product-slide-component
      :black="{{ json_encode($black) }}"
      :cappuccino="{{ json_encode($cappuccino) }}"></product-slide-component>

    {{-- Home Video Section --}}
    <home-video-component
      :data="{{ json_encode($pages) }}"></home-video-component>

    {{-- Home Description Section --}}
    <description-component
      :data="{{ json_encode($general) }}"></description-component>

    {{-- Home Post Section --}}
    <home-post-component
      :activity="{{ json_encode($activity) }}"
      :article="{{ json_encode($article) }}"></home-post-component>

    {{-- Home Popup Section --}}
    @if ($promotion != null)
      <home-popup-component
        :data="{{ json_encode($promotion) }}"></home-popup-component>
    @endif
  </section>
@endsection
