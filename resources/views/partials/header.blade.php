{{-- Theme Menu (Choice) --}}
@if(request()->path() == '/')
    <menu-component></menu-component>
@endif

{{-- Partials --}}
<social-media-component :data="{{ json_encode($general) }}"></social-media-component>
<navbar-component :data="{{ json_encode($general) }}"></navbar-component>
