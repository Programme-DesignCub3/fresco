@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')

<section>
    {{-- Activity Header Section --}}
    <header-page-component header="activity"></header-page-component>

    {{-- Activity List Section --}}
    <activity-list-component>
        <template #activity-slide>
            @for($index = 1; $index <= 2; $index++)
                <div class="swiper-slide">
                    <img class="object-cover object-center mx-auto aspect-square" src="{{ asset('assets/images/activity-1.png') }}" alt="Activity">
                </div>
                <div class="swiper-slide">
                    <img class="object-cover object-center mx-auto aspect-square" src="{{ asset('assets/images/activity-2.png') }}" alt="Activity">
                </div>
                <div class="swiper-slide">
                    <img class="object-cover object-center mx-auto aspect-square" src="{{ asset('assets/images/activity-3.png') }}" alt="Activity">
                </div>
            @endfor
        </template>
    </activity-list-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
