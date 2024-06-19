@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Aktivitas')
@section('meta_url', URL::to('/aktivitas'))
@section('meta_title', 'Aktivitas')
@section('meta_description', 'Kopi Kapal Api Fresco, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.')
@section('meta_image', asset('assets/images/meta-image.png'))

@section('content')
  <section id="activity">
    {{-- Activity Header Section --}}
    <header-page-component
      header="activity"
      :data="{{ json_encode($pages) }}"></header-page-component>

    {{-- Activity List Section --}}
    <activity-list-component
      :data="{{ json_encode($activity) }}"></activity-list-component>
  </section>
@endsection

@push('bottom-scripts')
  <script>
    if (localStorage.getItem('user_theme') == null) {
      localStorage.setItem('user_theme', 'black');
    }
  </script>
@endpush
