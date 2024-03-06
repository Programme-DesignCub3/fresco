@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<section id="product">
    {{-- Product List Section --}}
    <product-list-component
        :black="{{ json_encode($black) }}"
        :cappuccino="{{ json_encode($cappuccino) }}">
    </product-list-component>

    {{-- Product Marketplace Section --}}
    <product-marketplace-component :data="{{ json_encode($general) }}"></product-marketplace-component>

    {{-- Product Description Title Section --}}
    <product-desc-title-component></product-desc-title-component>

    {{-- Product Description Section --}}
    <description-component :data="{{ json_encode($general) }}"></description-component>

    {{-- Product Description Section (Mobile) --}}
    <description-slide-component :data="{{ json_encode($general) }}"></description-slide-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
