@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section>
    {{-- === Introduction Section === --}}
    <introduction-component :data="{{ json_encode($home) }}">
        <template #black-intro-image>
            <x-curator-glider
                :media="$home['black_intro_image']"
                class="w-full"
                data-aos="zoom-in"
                data-aos-delay="150"
            />
        </template>
        <template #cappuccino-intro-image>
            <x-curator-glider
                :media="$home['cappuccino_intro_image']"
                class="w-full"
                data-aos="zoom-in"
                data-aos-delay="150"
            />
        </template>
    </introduction-component>

    {{-- === Product Section === --}}
    <product-coffee-component>
        <template #black-product>
            @foreach($list_product['black_coffee'] as $key => $product)
                @php
                    $multiplier = ($key + 1) * 100;
                    $delay = 200 + $multiplier;
                @endphp
                <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                    <x-curator-glider
                        :media="$product['image']"
                        data-aos="fade-up"
                        data-aos-delay="{{ $delay }}"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                    />
                    <div
                        data-aos="fade-down"
                        data-aos-delay="{{ $delay }}"
                        class="text-center font-bold">
                        <p>Fresco</p>
                        <p>{{ $product['product'] }}</p>
                    </div>
                </div>
            @endforeach
        </template>
    </product-coffee-component>

    {{-- === Video Section === --}}
    <video-coffee-component :data="{{ json_encode($home) }}">
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
    </video-coffee-component>

    {{-- === Description Section === --}}
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

    {{-- === Post Feed === --}}
    <post-feed-component></post-feed-component>
</section>

@endsection
