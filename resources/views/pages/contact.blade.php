@extends('layouts.app')

@section('content')
    <section id="contact" class="bg-gradient-yellow dark:bg-batik">
        <header-page-component header="contact" :data="{{ json_encode($pages) }}"></header-page-component>
        <contact-form-component :data="{{ json_encode($general) }}" :sitekey="{{ json_encode(config('services.google.recaptcha.site_key')) }}"></contact-form-component>
    </section>
@endsection

@push('bottom-scripts')
    <script>
        if (localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
