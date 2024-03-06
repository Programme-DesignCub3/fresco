@extends('layouts.app')

@section('title', 'Aktivitas')

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
