@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<section>
    {{-- Article Header Section --}}
    <header-page-component header="article-detail"></header-page-component>

    {{-- Article Detail Section --}}
    <div
        class="bg-article bg-black bg-cover bg-top bg-no-repeat pt-24">
        <div class="h-[15 0vh] fr-container relative mx-auto bg-fr-yellow pb-[17%]">
            <img class="w-full" src="/assets/images/article-1.png" alt="" />
            <div class="absolute bottom-0 right-0 w-3/4 space-y-4 bg-white p-12">
                <h1 class="text-xl font-bold">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Nesciunt aut labore sed in, laborum distinctio at ut?
                    Itaque, voluptatem ab.
                </h1>
                <div class="article-wrapper">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi debitis eum commodi dicta reprehenderit quisquam deleniti veritatis corrupti culpa itaque officiis fugiat magni laboriosam laborum quod natus assumenda, repellendus accusamus numquam voluptate ad aliquid! Dolor minima repellat quidem quos sequi beatae veniam quasi suscipit officia voluptatem alias possimus provident eos aliquam, neque dolorum nobis at, praesentium delectus magni omnis sapiente. Dolore necessitatibus magni minima ad veritatis quae, facere corporis molestiae porro corrupti quod accusamus unde quasi architecto! Corporis consequuntur harum eveniet reprehenderit perferendis porro deserunt voluptates provident nostrum tempore, non ut numquam ipsam tenetur! Aliquam doloremque dolor fugiat recusandae harum eos, expedita quidem consectetur ducimus quisquam suscipit voluptatibus architecto reprehenderit maiores provident nihil nam modi obcaecati fugit! Voluptatem, aspernatur dolorem! Pariatur nostrum, magnam obcaecati iure debitis inventore architecto natus enim! Voluptate nulla quasi, aliquam debitis veniam illum animi hic, illo suscipit incidunt similique nihil. Autem accusantium facilis magni earum enim ipsam, fugiat nam consectetur eos accusamus alias animi repellat reprehenderit illum, praesentium voluptatibus cupiditate iusto minus aperiam rem sit illo eligendi nemo! Nisi necessitatibus a odio facere perferendis dolore suscipit officia animi, provident repellendus quasi nemo! Amet officia deleniti earum sit non obcaecati ullam nisi nobis, labore fuga! Dignissimos, velit!</p>
                </div>
            </div>
        </div>
    </div>

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
                            class="flex gap-x-8">
                            <div class="w-full">
                                <img
                                    class="aspect-square object-cover"
                                    src="{{ $d['image'] }}"
                                    alt="FresCo" />
                            </div>
                            <div
                                class="flex flex-col gap-y-3 w-full">
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
                                        class="rounded-lg px-6 py-2 text-sm border border-white bg-transparent text-white">
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
                            class="flex gap-x-8">
                            <div class="w-full">
                                <img
                                    class="aspect-square object-cover"
                                    src="{{ $d['image'] }}"
                                    alt="FresCo" />
                            </div>
                            <div
                                class="flex flex-col gap-y-3 w-full">
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
                                        class="rounded-lg px-6 py-2 text-sm text-white bg-fr-red">
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
