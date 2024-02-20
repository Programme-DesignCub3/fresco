@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

{{-- @dd(session('theme')) --}}
<section>
    {{-- Article Header Section --}}
    <header-page-component header="article"></header-page-component>

    {{-- Article List Section --}}
    <article-list-component></article-list-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
