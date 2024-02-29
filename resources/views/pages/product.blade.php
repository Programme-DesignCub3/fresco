@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<section>
    {{-- Product List Section --}}
    <product-list-component>
        {{-- === Grid Layout (Desktop) --}}
        <template #black-product-list>
            @foreach($black as $key => $product)
                <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                    <x-curator-glider
                        :media="$product['image']"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                    />
                    <div
                        data-aos="fade-down"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        data-aos-offset="20"
                        class="font-bold text-center">
                        <p>Fresco</p>
                        <p>{{ $product['product'] }}</p>
                    </div>
                </div>
            @endforeach

        </template>
        <template #cappuccino-product-list>
            @foreach($cappuccino as $key => $product)
                <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                    <x-curator-glider
                        :media="$product['image']"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                    />
                    <div
                        data-aos="fade-down"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        data-aos-offset="20"
                        class="font-bold text-center">
                        <p>Fresco</p>
                        <p>{{ $product['product'] }}</p>
                    </div>
                </div>
            @endforeach
        </template>

        {{-- === Slider Layout (Mobile) === --}}
        <template #black-product-slide>
            @foreach($black as $key => $product)
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                        <x-curator-glider
                            :media="$product['image']"
                            data-aos="fade-up"
                            data-aos-delay="200"
                            data-aos-duration="1000"
                            class="w-[220px]"
                        />
                        <div
                            data-aos="fade-down"
                            data-aos-delay="200"
                            data-aos-duration="1000"
                            data-aos-offset="20"
                            class="font-bold text-center">
                            <p>Fresco</p>
                            <p>{{ $product['product'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </template>
        <template #cappuccino-product-slide>
            @foreach($cappuccino as $key => $product)
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                        <x-curator-glider
                            :media="$product['image']"
                            data-aos="fade-up"
                            data-aos-delay="200"
                            data-aos-duration="1000"
                            class="w-[220px]"
                        />
                        <div
                            data-aos="fade-down"
                            data-aos-delay="200"
                            data-aos-duration="1000"
                            data-aos-offset="20"
                            class="font-bold text-center">
                            <p>Fresco</p>
                            <p>{{ $product['product'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </template>
    </product-list-component>

    {{-- Product Marketplace Section --}}
    <product-marketplace-component></product-marketplace-component>

    {{-- Product Description Title Section --}}
    <product-desc-title-component></product-desc-title-component>

    {{-- Product Description Section --}}
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

    {{-- Product Description Section (Mobile) --}}
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
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
