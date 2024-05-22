@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Produk')
@section('meta_url', URL::to('/produk'))
@section('meta_title', 'Produk')
@section('meta_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, sit!')
@section('meta_image', asset('assets/images/desc-2.png'))

@section('content')
  <section id="product">
    {{-- Product List Section --}}
    <product-list-component
      :data="{{ json_encode($pages) }}"
      :black="{{ json_encode($black) }}"
      :cappuccino="{{ json_encode($cappuccino) }}"></product-list-component>

    {{-- Product Marketplace Section --}}
    <product-marketplace-component
      :data="{{ json_encode($general) }}"></product-marketplace-component>

    {{-- Product Description Title Section --}}
    <product-desc-title-component></product-desc-title-component>

    {{-- Product Description Section --}}
    <description-component
      :data="{{ json_encode($general) }}"></description-component>

    {{-- Product Description Section (Mobile) --}}
    <description-slide-component
      :data="{{ json_encode($general) }}"></description-slide-component>
  </section>
@endsection

@push('scripts')
  <script>
    if (localStorage.getItem('user_theme') == null) {
      localStorage.setItem('user_theme', 'black');
    }
  </script>
@endpush
