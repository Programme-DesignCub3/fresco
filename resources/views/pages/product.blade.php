@extends('layouts.app')

@section('content')
    <section id="product">
        <product-list-component :data="{{ json_encode($pages) }}" :black="{{ json_encode($black) }}" :cappuccino="{{ json_encode($cappuccino) }}"></product-list-component>
        <product-marketplace-component :data="{{ json_encode($general) }}"></product-marketplace-component>
        <product-description-component :data="{{ json_encode($general) }}"></product-description-component>
    </section>
@endsection

@push('bottom-scripts')
    <script>
        if (localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
