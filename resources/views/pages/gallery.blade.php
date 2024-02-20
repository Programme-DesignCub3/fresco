@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<section>
    {{-- Gallery Header Section --}}
    <header-page-component
        :background="'http://fresco.test/assets/images/header-gallery.png'"
    ></header-page-component>
</section>

@endsection
