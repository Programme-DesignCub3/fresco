@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Hubungi')
@section('meta_url', URL::to('/hubungi'))
@section('meta_title', 'Hubungi')
@section('meta_description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, sit!')
@section('meta_image', asset('assets/images/desc-2.png'))

@section('content')
  <section id="contact">
    {{-- Contact Header Section --}}
    <header-page-component
        header="contact"
        :data="{{ json_encode($pages) }}"></header-page-component>

    {{-- Contact Form Section --}}
    <contact-form-component
      :data="{{ json_encode($general) }}"></contact-form-component>
  </section>
@endsection

@push('scripts')
  <script>
    if (localStorage.getItem('user_theme') == null) {
      localStorage.setItem('user_theme', 'black');
    }
  </script>
@endpush
