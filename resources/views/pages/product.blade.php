@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<section>
    {{-- Product List Section --}}
    <product-list-component>
        <template #black-product-list>
            @foreach($black as $key => $product)
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
                        data-aos-offset="20"
                        class="text-center font-bold">
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
                        class="text-center font-bold">
                        <p>Fresco</p>
                        <p>{{ $product['product'] }}</p>
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
</section>

@endsection

@push('scripts')
    <script>
        if(localStorage.getItem('user_theme') == null) {
            localStorage.setItem('user_theme', 'black');
        }
    </script>
@endpush
