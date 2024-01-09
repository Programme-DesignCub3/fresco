<script setup>
import { ref } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
const datas = ref([
    {
        image: '/assets/images/article.png',
        title: 'VISIT US AT SIAL INTERFOOD EXHIBITION 2023',
        desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan."',
    },
    {
        image: '/assets/images/article.png',
        title: 'VISIT US AT SIAL INTERFOOD EXHIBITION 2023',
        desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan."',
    },
    {
        image: '/assets/images/article.png',
        title: 'VISIT US AT SIAL INTERFOOD EXHIBITION 2023',
        desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan."',
    },
]);
</script>

<template>
    <div class="post-feed" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-10 py-24 md:px-0">
            <div class="flex flex-col gap-y-24 lg:flex-row lg:gap-x-12">
                <div class="w-full lg:w-2/5">
                    <h1
                        class="text-[40px] font-bold leading-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-black'
                                : 'text-white'
                        ">
                        Activities
                    </h1>
                    <div
                        class="my-6 h-[2px] w-16"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-fr-red'
                                : 'bg-fr-yellow'
                        "></div>
                    <Splide
                        :options="{ rewind: true, arrows: false }"
                        aria-label="My Favorite Images">
                        <SplideSlide>
                            <img
                                src="/assets/images/slide.png"
                                alt="Sample 1" />
                        </SplideSlide>
                        <SplideSlide>
                            <img
                                src="/assets/images/slide.png"
                                alt="Sample 2" />
                        </SplideSlide>
                    </Splide>
                </div>
                <div class="flex w-full flex-col lg:w-3/5">
                    <div>
                        <h1
                            class="text-[40px] font-bold leading-none"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'text-black'
                                    : 'text-white'
                            ">
                            Articles
                        </h1>
                        <div
                            class="my-6 h-[2px] w-16"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'bg-fr-red'
                                    : 'bg-fr-yellow'
                            "></div>
                    </div>
                    <div class="flex flex-grow flex-col justify-between">
                        <div v-for="(data, index) in datas">
                            <div
                                class="flex flex-col space-y-6 sm:flex-row sm:space-x-10 sm:space-y-0">
                                <div class="w-full flex-grow sm:w-2/5 lg:w-1/3">
                                    <img
                                        class="w-full"
                                        :src="data.image"
                                        alt="FresCo" />
                                </div>
                                <div
                                    class="flex w-full flex-col space-y-4 sm:w-3/5 sm:justify-between sm:space-y-0 lg:w-2/3">
                                    <h1
                                        class="text-2xl font-bold"
                                        :class="
                                            themeStore.theme == 'black'
                                                ? 'text-black'
                                                : 'text-white'
                                        ">
                                        {{ data.title }}
                                    </h1>
                                    <p
                                        class="font-medium"
                                        :class="
                                            themeStore.theme == 'black'
                                                ? 'text-black'
                                                : 'text-white'
                                        ">
                                        {{ data.desc }}
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
                                v-if="index < 2"
                                class="my-[46px] h-px w-full border-b-2 border-dashed lg:mt-[40px]"
                                :class="
                                    themeStore.theme == 'black'
                                        ? 'border-black'
                                        : 'border-white'
                                "></div>
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
