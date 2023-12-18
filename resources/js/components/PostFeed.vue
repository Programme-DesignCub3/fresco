<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
    <div class="post-feed" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-10 py-24 md:px-0">
            <div class="flex gap-x-12">
                <div class="w-2/5">
                    <h1
                        class="text-[40px] font-bold leading-none"
                        :class="themeStore.theme == 'black' ? 'text-black' : 'text-white'">
                        Activities
                    </h1>
                    <div
                        class="my-6 h-[2px] w-16"
                        :class="themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-yellow'"></div>
                    <Splide
                        :options="{ rewind: true, arrows: false }"
                        aria-label="My Favorite Images">
                        <SplideSlide>
                            <img src="/assets/images/slide.png" alt="Sample 1" />
                        </SplideSlide>
                        <SplideSlide>
                            <img src="/assets/images/slide.png" alt="Sample 2" />
                        </SplideSlide>
                    </Splide>
                </div>
                <div class="flex w-3/5 flex-col">
                    <div>
                        <h1
                            class="text-[40px] font-bold leading-none"
                            :class="themeStore.theme == 'black' ? 'text-black' : 'text-white'">
                            Articles
                        </h1>
                        <div
                            class="my-6 h-[2px] w-16"
                            :class="
                                themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-yellow'
                            "></div>
                    </div>
                    <div class="flex flex-grow flex-col justify-between">
                        <div class="flex gap-x-16">
                            <div class="w-1/3 flex-grow">
                                <img class="w-full" src="/assets/images/article.png" alt="" />
                            </div>
                            <div class="flex w-2/3 flex-col justify-between">
                                <h1
                                    class="text-2xl font-bold"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    VISIT US AT SIAL INTERFOOD EXHIBITION 2023
                                </h1>
                                <p
                                    class="font-medium"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji
                                    segar dan aroma yang memikat, setiap tegukan adalah perjalanan
                                    rasa yang menggairahkan."
                                </p>
                                <div>
                                    <button
                                        class="rounded-lg px-6 py-2 text-sm text-white"
                                        :class="
                                            themeStore.theme == 'black'
                                                ? 'bg-fr-red'
                                                : 'bg-fr-green'
                                        ">
                                        READ MORE >
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="h-px w-full border-b-2 border-dashed"
                            :class="
                                themeStore.theme == 'black' ? 'border-black' : 'border-white'
                            "></div>
                        <div class="flex gap-x-16">
                            <div class="w-1/3 flex-grow">
                                <img class="w-full" src="/assets/images/article.png" alt="" />
                            </div>
                            <div class="flex w-2/3 flex-col justify-between">
                                <h1
                                    class="text-2xl font-bold"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    VISIT US AT SIAL INTERFOOD EXHIBITION 2023
                                </h1>
                                <p
                                    class="font-medium"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji
                                    segar dan aroma yang memikat, setiap tegukan adalah perjalanan
                                    rasa yang menggairahkan."
                                </p>
                                <div>
                                    <button
                                        class="rounded-lg px-6 py-2 text-sm text-white"
                                        :class="
                                            themeStore.theme == 'black'
                                                ? 'bg-fr-red'
                                                : 'bg-fr-green'
                                        ">
                                        READ MORE >
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="h-px w-full border-b-2 border-dashed"
                            :class="
                                themeStore.theme == 'black' ? 'border-fr-black' : 'border-fr-white'
                            "></div>
                        <div class="flex gap-x-16">
                            <div class="w-1/3 flex-grow">
                                <img class="w-full" src="/assets/images/article.png" alt="" />
                            </div>
                            <div class="flex w-2/3 flex-col justify-between">
                                <h1
                                    class="text-2xl font-bold"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    VISIT US AT SIAL INTERFOOD EXHIBITION 2023
                                </h1>
                                <p
                                    class="font-medium"
                                    :class="
                                        themeStore.theme == 'black' ? 'text-black' : 'text-white'
                                    ">
                                    Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji
                                    segar dan aroma yang memikat, setiap tegukan adalah perjalanan
                                    rasa yang menggairahkan."
                                </p>
                                <div>
                                    <button
                                        class="rounded-lg px-6 py-2 text-sm text-white"
                                        :class="
                                            themeStore.theme == 'black'
                                                ? 'bg-fr-red'
                                                : 'bg-fr-green'
                                        ">
                                        READ MORE >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.post-feed.black .splide__pagination {
    bottom: -3em;
    outline: none;
}

.post-feed.black .splide__pagination__page {
    width: 16px;
    height: 16px;
    margin: 0 8px;
    background: #231f20;
    opacity: 1;
}

.post-feed.black .splide__pagination__page.is-active {
    transform: scale(1);
    background: #ed1d24;
}

.post-feed.cappucino .splide__pagination {
    bottom: -3em;
    outline: none;
}

.post-feed.cappucino .splide__pagination__page {
    width: 16px;
    height: 16px;
    margin: 0 8px;
    background: white;
    opacity: 1;
}

.post-feed.cappucino .splide__pagination__page.is-active {
    transform: scale(1);
    background: #006838;
}
</style>
