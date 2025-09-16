@extends('layouts.app')

@section('content')
    <section id="activity" class="bg-gradient-yellow dark:bg-batik">
        <header-page-component header="activity" :data="{{ json_encode($pages) }}"></header-page-component>
        <activity-list-component :data="{{ json_encode($activity) }}"></activity-list-component>
    </section>
@endsection

@push('bottom-scripts')
    <script>
        if (localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
