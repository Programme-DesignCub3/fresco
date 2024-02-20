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
                data-aos="zoom-in"
                data-aos-delay="150"
            />
        </template>
        <template #cappuccino-slide-image>
            <x-curator-glider
                :media="$home['cappuccino_intro_image']"
                class="w-full"
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
                                    class="text-center font-bold text-fr-black">
                                    <p>Fresco</p>
                                    <p>{{ $product['product'] }}</p>
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
                                class="text-center font-bold">
                                <p>Fresco</p>
                                <p>{{ $product['product'] }}</p>
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
                                    class="text-center font-bold text-white">
                                    <p>Fresco</p>
                                    <p>{{ $product['product'] }}</p>
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
                                class="text-center font-bold">
                                <p>Fresco</p>
                                <p>{{ $product['product'] }}</p>
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

    {{-- Home Post Section --}}
    <home-post-component></home-post-component>
</section>

@endsection
