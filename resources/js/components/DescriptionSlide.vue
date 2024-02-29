<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const description = ref();
const swiper = ref();

const swiperOption = {
    slidesPerView: 1,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-description-slider-next',
        prevEl: '.fr-description-slider-prev',
    },
};

const initSwiper = () => {
    swiper.value = new Swiper(description.value, swiperOption);
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
        class="relative block w-full h-full lg:hidden"
        :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
        <!-- Navigation Swiper (Arrow) -->
        <div
            class="fr-description-slider-prev absolute left-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out md:left-[4%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-description-slider-next absolute right-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out md:right-[4%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-right" />
        </div>

        <div class="swiper" ref="description">
            <div class="swiper-wrapper">
                <slot
                    v-if="themeStore.theme == 'black'"
                    name="black-desc-slide" />
                <slot v-else name="cappuccino-desc-slide" />
            </div>
        </div>
    </div>
</template>
