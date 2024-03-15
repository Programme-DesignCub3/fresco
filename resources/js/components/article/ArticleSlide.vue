<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const article = ref();
const swiper = ref();

const swiperOption = {
    autoHeight: true,
    spaceBetween: 30,
    slidesPerView: 1,
    slidesPerGroup: 1,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-article-slider-next',
        prevEl: '.fr-article-slider-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            slidesPerGroup: 2,
        },
    },
};

const initSwiper = () => {
    swiper.value = new Swiper(article.value, swiperOption);
};

onMounted(() => {
    if (!swiper.value) {
        initSwiper();
    }
});

watch(theme, () => {
    swiper.value = null;
    setTimeout(() => {
        initSwiper();
    });
});
</script>

<template>
    <div
        class="relative px-4 py-10 transition-all duration-700 ease-in-out sm:px-0"
        :class="themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-green'">
        <div
            class="fr-article-slider-prev absolute left-[4%] top-1/2 z-40 flex h-9 w-9 cursor-pointer items-center justify-center rounded-full bg-fr-yellow text-black sm:left-[6%] md:left-[8%] lg:left-[10%] 2xl:left-[12%]">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-article-slider-next absolute right-[4%] top-1/2 z-40 flex h-9 w-9 cursor-pointer items-center justify-center rounded-full bg-fr-yellow text-black sm:right-[6%] md:right-[8%] lg:right-[10%] 2xl:right-[12%]">
            <v-icon name="fa-chevron-right" />
        </div>
        <div class="fr-container mx-auto space-y-10">
            <h1
                class="text-shadow text-[40px] font-bold leading-none text-white">
                Artikel lainnya
            </h1>

            <!-- Slide Black Coffee -->
            <div
                v-if="themeStore.theme == 'black'"
                class="swiper"
                ref="article">
                <div class="swiper-wrapper">
                    <div
                        v-for="(d, i) in data"
                        :key="i"
                        class="swiper-slide pb-4">
                        <div class="flex flex-col gap-6 xl:flex-row xl:gap-8">
                            <div class="w-full">
                                <img
                                    width="auto"
                                    height="auto"
                                    class="aspect-square object-cover"
                                    :src="d.image"
                                    :alt="d.title" />
                            </div>
                            <div
                                class="flex w-full flex-col gap-y-3 transition-all duration-700 ease-in-out">
                                <h2 class="text-2xl font-bold text-fr-yellow">
                                    {{ d.title }}
                                </h2>
                                <p class="font-medium text-white md:text-lg">
                                    {{ d.excerpt }}
                                </p>
                                <div>
                                    <a
                                        :href="d.slug"
                                        class="rounded-lg bg-fr-yellow px-6 py-2.5 text-xs font-medium text-black transition-all duration-300 ease-in-out hover:bg-fr-darker-yellow md:text-sm">
                                        READ MORE
                                        <v-icon
                                            class="h-4 w-4 stroke-2 py-[2px]"
                                            name="fa-chevron-right" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Cappuccino -->
            <div
                v-if="themeStore.theme == 'cappuccino'"
                class="swiper"
                ref="article">
                <div class="swiper-wrapper">
                    <div
                        v-for="(d, i) in data"
                        :key="i"
                        class="swiper-slide pb-4">
                        <div class="flex flex-col gap-6 xl:flex-row xl:gap-8">
                            <div class="w-full">
                                <img
                                    width="auto"
                                    height="auto"
                                    class="aspect-square object-cover"
                                    :src="d.image"
                                    :alt="d.title" />
                            </div>
                            <div class="flex w-full flex-col gap-y-3">
                                <h1 class="text-2xl font-bold text-fr-yellow">
                                    {{ d.title }}
                                </h1>
                                <p class="font-medium text-white md:text-lg">
                                    {{ d.excerpt }}
                                </p>
                                <div>
                                    <a
                                        :href="d.slug"
                                        class="rounded-lg bg-fr-red px-6 py-2.5 text-xs font-medium text-white transition-all duration-300 ease-in-out hover:bg-fr-darker-red md:text-sm">
                                        READ MORE
                                        <v-icon
                                            class="h-4 w-4 stroke-2 py-[2px]"
                                            name="fa-chevron-right" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
