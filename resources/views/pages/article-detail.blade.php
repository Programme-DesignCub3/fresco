@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<section>
    {{-- Article Header Section --}}
    <header-page-component header="article-detail"></header-page-component>

    {{-- Article Detail Section --}}
    <article-detail-component></article-detail-component>

    {{-- Article Slide Section --}}
    @php
        $data = [
            [
                'image' => '/assets/images/article-1.png',
                'title' => 'Kopi Bisa Membantu Menghilangkan Komedo, Masa Sih?',
                'excerpt' => 'Ada cara yang lebih simpel untuk menghilangkan komedo yaitu dengan menggunakan masker kopi. Masa sih?'
            ],
            [
                'image' => '/assets/images/article-2.png',
                'title' => 'Kekinian, Es Kopi Susu Jadi Idola Anak Muda',
                'excerpt' => 'Es kopi susu kini bisa dinikmati di kedai-kedai.Saking hitsnya, banyak yang rela mengantri hanya demi segelas es kopi susu Yuk bikin sendiri di rumah'
            ]
        ];
    @endphp
    <article-slide-component>
        <template #black-article-slide>
            @for($i = 1; $i <= 2; $i++)
                @foreach($data as $key => $d)
                    <div class="swiper-slide">
                        <div
                            class="flex flex-col gap-6 lg:gap-8 lg:flex-row">
                            <div class="w-full">
                                <img
                                    class="object-cover aspect-square"
                                    src="{{ $d['image'] }}"
                                    alt="FresCo" />
                            </div>
                            <div
                                class="flex flex-col w-full transition-all duration-700 ease-in-out gap-y-3">
                                <h1
                                    class="text-2xl font-bold text-fr-yellow">
                                    {{ $d['title'] }}
                                </h1>
                                <p
                                    class="font-medium text-white">
                                    {{ $d['excerpt'] }}
                                </p>
                                <div>
                                    <button
                                        class="px-6 py-2 text-xs font-medium text-black rounded-lg bg-fr-yellow md:text-sm">
                                        READ MORE >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endfor
        </template>

        <template #cappuccino-article-slide>
            @for($i = 1; $i <= 2; $i++)
                @foreach($data as $key => $d)
                    <div class="swiper-slide">
                        <div
                            class="flex flex-col gap-6 lg:gap-8 lg:flex-row">
                            <div class="w-full">
                                <img
                                    class="object-cover aspect-square"
                                    src="{{ $d['image'] }}"
                                    alt="FresCo" />
                            </div>
                            <div
                                class="flex flex-col w-full gap-y-3">
                                <h1
                                    class="text-2xl font-bold text-fr-yellow">
                                    {{ $d['title'] }}
                                </h1>
                                <p
                                    class="font-medium text-white">
                                    {{ $d['excerpt'] }}
                                </p>
                                <div>
                                    <button
                                        class="px-6 py-2 text-xs font-medium text-white rounded-lg bg-fr-red md:text-sm">
                                        READ MORE >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endfor
        </template>
    </article-slide-component>
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
