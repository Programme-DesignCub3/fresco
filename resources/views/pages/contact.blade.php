@extends('layouts.app')

@section('title', 'Hubungi')

@section('content')

<section id="contact">
    {{-- Contact Header Section --}}
    <header-page-component :header="'contact'"></header-page-component>

    {{-- Contact Form Section --}}
    <contact-form-component :data="{{ json_encode($general) }}"></contact-form-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
