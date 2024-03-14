@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Aktivitas')
@section('meta_url', URL::to('/aktivitas'))
@section('meta_title', 'Aktivitas')
@section('meta_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, sit!')
@section('meta_image', asset('assets/images/desc-2.png'))

@section('content')

<section id="activity">
    {{-- Activity Header Section --}}
    <header-page-component header="activity"></header-page-component>

    {{-- Activity List Section --}}
    <activity-list-component :data="{{ json_encode($activity) }}"></activity-list-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
