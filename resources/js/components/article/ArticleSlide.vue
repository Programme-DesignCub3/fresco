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
    slidesPerView: 2,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-article-slider-next',
        prevEl: '.fr-article-slider-prev',
    },
};

const initSwiper = () => {
    if (swiper.value) {
        swiper.value.destroy(true, true);
    }
    swiper.value = new Swiper(article.value, swiperOption);
};

onMounted(() => {
    initSwiper();
});

watch(theme, () => {
    initSwiper();
});
</script>

<template>
    <div class="relative">
        <div
            class="fr-article-slider-prev absolute left-[12%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full bg-fr-yellow text-black">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-article-slider-next absolute right-[12%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full bg-fr-yellow text-black">
            <v-icon name="fa-chevron-right" />
        </div>

        <div
            class="py-16 transition-all duration-700 ease-in-out"
            :class="themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-green'">
            <div class="fr-container mx-auto space-y-10">
                <h1
                    class="text-shadow text-[40px] font-bold leading-none text-white">
                    Artikel lainnya
                </h1>
                <div class="swiper" ref="article">
                    <div class="swiper-wrapper">
                        <slot
                            v-if="themeStore.theme == 'black'"
                            name="black-article-slide" />
                        <slot v-else name="cappuccino-article-slide" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
