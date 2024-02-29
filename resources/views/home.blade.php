@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section>
    {{-- Home Introduction Section --}}
    <home-intro-component :data="{{ json_encode($home) }}">
        <template #black-slide-image>
            <x-curator-glider
                :media="$home['black_intro_image']"
                class="w-full"
                data-aos-offset="0"
                data-aos="zoom-in"
                data-aos-delay="150"
            />
        </template>
        <template #cappuccino-slide-image>
            <x-curator-glider
                :media="$home['cappuccino_intro_image']"
                class="w-full"
                data-aos-offset="0"
                data-aos="zoom-in"
                data-aos-delay="150"
            />
        </template>
    </home-intro-component>

    {{-- Home Product Section --}}
    <product-slide-component>
        <template #black-product-coffee>
            @if(count($black) >= 4)
                @for($index = 1; $index <= 2; $index++)
                    @foreach($black as $key => $product)
                        <div class="swiper-slide">
                            <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                                <x-curator-glider
                                    :media="$product['image']"
                                    data-aos="fade-up"
                                    class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                                />
                                <div
                                    data-aos="fade-down"
                                    class="font-bold text-center text-fr-black">
                                    <p>Fresco</p>
                                    <p>{{ $product['product'] }}</p>
                                    <div class="pt-4">
                                        <a
                                            href="{{ $product['link'] }}"
                                            target="_blank"
                                            class="inline px-6 py-2.5 mt-4 text-sm font-medium text-white transition-all duration-700 ease-in-out border rounded-lg border-fr-red bg-fr-red md:px-8 group-hover:border group-hover:border-white">
                                            BELI SEKARANG
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endfor
            @else
                @foreach($black as $key => $product)
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                            <x-curator-glider
                                :media="$product['image']"
                                data-aos="fade-up"
                                class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                            />
                            <div
                                data-aos="fade-down"
                                class="font-bold text-center">
                                <p>Fresco</p>
                                <p>{{ $product['product'] }}</p>
                                <div class="pt-4">
                                    <a
                                        href="{{ $product['link'] }}"
                                        target="_blank"
                                        class="inline px-6 py-2.5 mt-4 text-sm font-medium text-white transition-all duration-700 ease-in-out border rounded-lg border-fr-red bg-fr-red md:px-8 group-hover:border group-hover:border-white">
                                        BELI SEKARANG >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </template>

        <template #cappuccino-product-coffee>
            @if(count($cappuccino) >= 4)
                @for($index = 1; $index <= 2; $index++)
                    @foreach($cappuccino as $key => $product)
                        <div class="swiper-slide">
                            <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                                <x-curator-glider
                                    :media="$product['image']"
                                    data-aos="fade-up"
                                    class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                                />
                                <div
                                    data-aos="fade-down"
                                    class="font-bold text-center text-white">
                                    <p>Fresco</p>
                                    <p>{{ $product['product'] }}</p>
                                    <div class="pt-4">
                                        <a
                                            href="{{ $product['link'] }}"
                                            target="_blank"
                                            class="inline px-6 py-2.5 mt-4 text-sm font-medium text-white transition-all duration-700 ease-in-out border rounded-lg border-fr-green bg-fr-green md:px-8 group-hover:border group-hover:border-white">
                                            BELI SEKARANG >
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endfor
            @else
                @foreach($cappuccino as $key => $product)
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                            <x-curator-glider
                                :media="$product['image']"
                                data-aos="fade-up"
                                class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                            />
                            <div
                                data-aos="fade-down"
                                class="font-bold text-center">
                                <p>Fresco</p>
                                <p>{{ $product['product'] }}</p>
                                <div class="pt-4">
                                    <a
                                        href="{{ $product['link'] }}"
                                        target="_blank"
                                        class="inline px-6 py-2.5 mt-4 text-sm font-medium text-white transition-all duration-700 ease-in-out border rounded-lg border-fr-green bg-fr-green md:px-8 group-hover:border group-hover:border-white">
                                        BELI SEKARANG >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </template>
    </product-slide-component>

    {{-- Home Video Section --}}
    <home-video-component :data="{{ json_encode($home) }}">
        <template #black-video-collab>
            <x-curator-glider
                :media="$home['black_video_collab']"
                data-aos="zoom-out"
                data-aos-delay="500"
                data-aos-duration="1000"
                class="block w-[220px]"
            />
        </template>
        <template #cappuccino-video-collab>
            <x-curator-glider
                :media="$home['cappuccino_video_collab']"
                data-aos="zoom-out"
                data-aos-delay="500"
                data-aos-duration="1000"
                class="block w-[220px]"
            />
        </template>
    </home-video-component>

    {{-- Home Description Section --}}
    @foreach($home['black_desc_list'] as $key => $black)
        <description-component :themes="'black'" :data="{{ json_encode($black) }}" :index="{{ $key }}">
            <template #black-desc-image>
                <x-curator-glider
                    :media="$black['black_desc_image']"
                />
            </template>
        </description-component>
    @endforeach
    @foreach($home['cappuccino_desc_list'] as $cappuccino)
        <description-component :themes="'cappuccino'" :data="{{ json_encode($cappuccino) }}" :index="{{ $key }}">
            <template #cappuccino-desc-image>
                <x-curator-glider
                    :media="$cappuccino['cappuccino_desc_image']"
                />
            </template>
        </description-component>
    @endforeach

    {{-- Home Description Section (Mobile) --}}
    <description-slide-component>
        <template #black-desc-slide>
            @foreach($home['black_desc_list'] as $key => $black)
                <div class="swiper-slide">
                    <div class="grid grid-rows-1">
                        <x-curator-glider
                            :media="$black['black_desc_image']"
                        />
                        <div class="flex flex-col justify-between w-full px-4 py-8 space-y-4">
                            <h1
                                class="text-shadow text-center text-white text-[40px] font-bold leading-none">
                                {{ $black['black_desc_title'] }}
                            </h1>
                            <p
                                data-aos="fade-down"
                                data-aos-offset="0"
                                class="font-medium leading-8 text-center text-white">
                                {{ $black['black_desc_explanation'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </template>

        <template #cappuccino-desc-slide>
            @foreach($home['cappuccino_desc_list'] as $cappuccino)
                <div class="swiper-slide">
                    <div class="grid grid-rows-1">
                        <x-curator-glider
                            :media="$cappuccino['cappuccino_desc_image']"
                        />
                        <div class="flex flex-col justify-between w-full px-4 py-8 space-y-4">
                            <h1
                                class="text-shadow text-center text-fr-green text-[40px] font-bold leading-none">
                                {{ $cappuccino['cappuccino_desc_title'] }}
                            </h1>
                            <p
                                data-aos="fade-down"
                                data-aos-offset="0"
                                class="font-medium leading-8 text-center text-black">
                                {{ $cappuccino['cappuccino_desc_explanation'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </template>
    </description-slide-component>

    {{-- Home Post Section --}}
    <home-post-component></home-post-component>
</section>

@endsection
