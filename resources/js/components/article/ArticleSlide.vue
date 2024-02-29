<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const article = ref();
const swiper = ref();

const swiperOption = {
    spaceBetween: 30,
    slidesPerView: 1,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-article-slider-next',
        prevEl: '.fr-article-slider-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
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
                    <slot name="black-article-slide" />
                </div>
            </div>

            <!-- Slide Cappuccino -->
            <div
                v-if="themeStore.theme == 'cappuccino'"
                class="swiper"
                ref="article">
                <div class="swiper-wrapper">
                    <slot name="cappuccino-article-slide" />
                </div>
            </div>
        </div>
    </div>
</template>
