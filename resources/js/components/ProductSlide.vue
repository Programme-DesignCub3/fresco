<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const product = ref();
const swiper = ref();

const swiperOption = {
    slidesPerView: 4,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-product-slider-next',
        prevEl: '.fr-product-slider-prev',
    },
};

const initSwiper = () => {
    swiper.value = new Swiper(product.value, swiperOption);
};

onMounted(() => {
    if(!swiper.value) {
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
        v-if="
            themeStore.getTheme().value != undefined &&
            themeStore.getTheme().value != null
        "
        class="product-coffee relative transition-all duration-700 ease-in-out px-0 py-16 md:px-10"
        :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-red'">
        <div
            class="fr-product-slider-prev absolute left-[12.5%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-red text-white'
                    : 'bg-fr-yellow text-black'
            ">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-product-slider-next absolute right-[12.5%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-red text-white'
                    : 'bg-fr-yellow text-black'
            ">
            <v-icon name="fa-chevron-right" />
        </div>
        <div class="fr-container mx-auto w-full space-y-16 text-center">
            <!-- Slide Black Coffee -->
            <div v-if="themeStore.theme == 'black'" class="swiper" ref="product">
                <div class="swiper-wrapper items-end py-6">
                    <slot name="black-product-coffee" />
                </div>
            </div>

            <!-- Slide Cappuccino -->
            <div v-if="themeStore.theme == 'cappuccino'" class="swiper" ref="product">
                <div class="swiper-wrapper items-end py-6">
                    <slot name="cappuccino-product-coffee" />
                </div>
            </div>
            <a
                href="#"
                class="inline-block transition-all duration-700 ease-in-out rounded-lg border px-8 py-2.5 text-sm font-medium text-white group-hover:border group-hover:border-white"
                :class="
                    themeStore.theme == 'black'
                        ? 'border-fr-red bg-fr-red'
                        : 'border-fr-green bg-fr-green'
                ">
                BELI SEKARANG >
            </a>
        </div>
    </div>
</template>
