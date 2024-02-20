<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { EffectCoverflow, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const activity = ref();
const swiper = ref();

const swiperOption = {
    centeredSlides: true,
    slidesPerView: 2,
    loop: true,
    effect: 'coverflow',
    modules: [EffectCoverflow, Navigation],
    coverflowEffect: {
        rotate: 0,
        stretch: 160,
        scale: 0.9,
        depth: 200,
        modifier: 1,
        slideShadows: true,
    },
    navigation: {
        nextEl: '.fr-activity-slider-next',
        prevEl: '.fr-activity-slider-prev',
    },
};

const initSwiper = () => {
    if (swiper.value) {
        swiper.value.destroy(true, true);
    }
    swiper.value = new Swiper(activity.value, swiperOption);
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
            class="fr-activity-slider-prev absolute left-[12%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-activity-slider-next absolute right-[12%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-right" />
        </div>
        <div class="bg-activity bg-cover bg-bottom bg-no-repeat py-20">
            <div class="fr-container mx-auto space-y-12">
                <!-- Title -->
                <div class="space-y-6">
                    <h1
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-shadow text-[50px] font-bold leading-none text-white">
                        AKTIVITAS
                    </h1>
                    <div
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                </div>

                <!-- Slider -->
                <div class="swiper" ref="activity">
                    <div class="swiper-wrapper">
                        <slot name="activity-slide" />
                    </div>
                </div>

                <div class="text-center">
                    <a
                        href="#"
                        class="inline-block rounded-lg border border-fr-red bg-fr-red px-8 py-2.5 text-sm font-medium text-white group-hover:border group-hover:border-white">
                        READ MORE >
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
