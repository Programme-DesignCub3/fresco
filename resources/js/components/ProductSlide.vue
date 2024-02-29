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
    spaceBetween: -120,
    slidesPerView: 1,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-product-slider-next',
        prevEl: '.fr-product-slider-prev',
    },
    breakpoints: {
        1024: {
            slidesPerView: 4,
            spaceBetween: 0
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 0
        },
        550: {
            slidesPerView: 1,
            spaceBetween: -300
        },
        425: {
            slidesPerView: 1,
            spaceBetween: -200
        },
        375: {
            spaceBetween: -160
        },
        320: {
            spaceBetween: -140
        }
    },
};

const initSwiper = () => {
    swiper.value = new Swiper(product.value, swiperOption);
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

window.addEventListener('resize', () => {
    initSwiper();
})
</script>

<template>
    <div
        v-if="
            themeStore.getTheme().value != undefined &&
            themeStore.getTheme().value != null
        "
        class="relative px-0 py-10 transition-all duration-700 ease-in-out product-coffee md:px-10 md:py-16"
        :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-red'">
        <!-- Navigation Swiper (Arrow) -->
        <div
            class="fr-product-slider-prev absolute left-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:left-[6%] md:left-[8%] lg:left-[10%] 2xl:left-[12%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-red text-white'
                    : 'bg-fr-yellow text-black'
            ">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-product-slider-next absolute right-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:right-[6%] md:right-[8%] lg:right-[10%] 2xl:right-[12%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-red text-white'
                    : 'bg-fr-yellow text-black'
            ">
            <v-icon name="fa-chevron-right" />
        </div>

        <div class="w-full mx-auto space-y-16 text-center fr-container">
            <!-- === Slide Black Coffee === -->
            <div
                v-if="themeStore.theme == 'black'"
                class="swiper"
                ref="product">
                <div class="items-end py-4 swiper-wrapper md:py-6">
                    <slot name="black-product-coffee" />
                </div>
            </div>

            <!-- === Slide Cappuccino === -->
            <div
                v-if="themeStore.theme == 'cappuccino'"
                class="swiper"
                ref="product">
                <div class="items-end py-4 swiper-wrapper md:py-6">
                    <slot name="cappuccino-product-coffee" />
                </div>
            </div>
        </div>
    </div>
</template>
