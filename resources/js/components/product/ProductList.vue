<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';

const { black, cappuccino } = defineProps(['black', 'cappuccino']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const product = ref();
const swiper = ref();

const swiperOption = {
    spaceBetween: -60,
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
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: -300,
        },
        550: {
            slidesPerView: 1,
            spaceBetween: -200,
        },
        425: {
            slidesPerView: 1,
            spaceBetween: -160,
        },
        375: {
            spaceBetween: -140,
        },
        320: {
            spaceBetween: -80,
        },
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
</script>

<template>
    <div
        class="mt-0 bg-black bg-product bg-cover bg-bottom bg-no-repeat lg:mt-20">
        <div
            class="fr-container mx-auto flex flex-col justify-between gap-y-0 py-10 md:mt-[160px] md:gap-y-6 md:py-14 lg:mt-0 lg:py-20">
            <div
                class="px-4 pt-[50px] sm:px-0 md:pt-0"
                id="product-title-anchor">
                <!-- Double element for refresh AOS Animation -->
                <h1
                    v-if="themeStore.theme == 'black'"
                    class="text-shadow flex flex-col text-[40px] font-bold leading-none sm:text-[50px] lg:text-[60px] xl:text-[80px]">
                    <span
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="text-white"
                        >BERAGAM PILIHAN RASA,</span
                    >
                    <span
                        data-aos="fade-right"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-fr-yellow"
                        >UNTUK MENEMANI AKTIVITASMU</span
                    >
                </h1>
                <h1
                    v-else
                    class="text-shadow flex flex-col text-[40px] font-bold leading-none sm:text-[50px] lg:text-[60px] xl:text-[80px]">
                    <span
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="text-white"
                        >BERAGAM PILIHAN RASA,</span
                    >
                    <span
                        data-aos="fade-right"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-fr-yellow"
                        >UNTUK MENEMANI AKTIVITASMU</span
                    >
                </h1>

                <!-- Double element for refresh AOS Animation -->
                <div
                    v-if="themeStore.theme == 'black'"
                    data-aos="fade-right"
                    data-aos-delay="200"
                    data-aos-duration="500"
                    data-aos-offset="0"
                    class="my-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
                <div
                    v-else
                    data-aos="fade-right"
                    data-aos-delay="200"
                    data-aos-duration="500"
                    data-aos-offset="0"
                    class="my-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
            </div>

            <!-- === Grid Layout (Desktop View) === -->
            <div
                class="hidden gap-y-10 px-10 text-white md:flex md:items-baseline md:justify-between md:px-0">
                <!-- Black Coffee -->
                <div
                    v-if="themeStore.theme == 'black'"
                    v-for="(d, i) in black"
                    :key="i"
                    class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        width="auto"
                        height="auto"
                        :src="d.image"
                        :alt="d.product"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]" />
                    <div
                        data-aos="fade-down"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        data-aos-offset="20"
                        class="text-center font-bold">
                        <p>Fresco</p>
                        <p>{{ d.product }}</p>
                    </div>
                </div>

                <!-- Cappuccino -->
                <div
                    v-if="themeStore.theme == 'cappuccino'"
                    v-for="(d, i) in cappuccino"
                    :key="i"
                    class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        width="auto"
                        height="auto"
                        :src="d.image"
                        :alt="d.product"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]" />
                    <div
                        data-aos="fade-down"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        data-aos-offset="20"
                        class="text-center font-bold">
                        <p>Fresco</p>
                        <p>{{ d.product }}</p>
                    </div>
                </div>
            </div>

            <!-- === Slider Layout (Mobile View) === -->
            <div class="relative block w-full md:hidden">
                <div
                    class="fr-product-slider-prev absolute left-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                    :class="
                        themeStore.theme == 'black'
                            ? 'bg-fr-red text-white'
                            : 'bg-fr-yellow text-black'
                    ">
                    <v-icon name="fa-chevron-left" />
                </div>
                <div
                    class="fr-product-slider-next absolute right-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                    :class="
                        themeStore.theme == 'black'
                            ? 'bg-fr-red text-white'
                            : 'bg-fr-yellow text-black'
                    ">
                    <v-icon name="fa-chevron-right" />
                </div>

                <!-- Slider Black -->
                <div
                    v-if="themeStore.theme == 'black'"
                    class="swiper text-white"
                    ref="product">
                    <div class="swiper-wrapper items-end py-0 md:py-6">
                        <template v-for="n in 2">
                            <div
                                v-for="(d, i) in black"
                                :key="i"
                                class="swiper-slide">
                                <div
                                    class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="d.image"
                                        :alt="d.product"
                                        data-aos="fade-up"
                                        data-aos-delay="200"
                                        data-aos-duration="1000"
                                        class="w-[200px]" />
                                    <div
                                        data-aos="fade-down"
                                        data-aos-delay="200"
                                        data-aos-duration="1000"
                                        data-aos-offset="20"
                                        class="text-center font-bold">
                                        <p>Fresco</p>
                                        <p>{{ d.product }}</p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Slider Cappuccino -->
                <div
                    v-if="themeStore.theme == 'cappuccino'"
                    class="swiper text-white"
                    ref="product">
                    <div class="swiper-wrapper items-end py-0 md:py-6">
                        <template v-for="n in 2">
                            <div
                                v-for="(d, i) in cappuccino"
                                :key="i"
                                class="swiper-slide">
                                <div
                                    class="flex flex-col items-center justify-between space-y-4 md:transition md:hover:scale-[1.1]">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="d.image"
                                        :alt="d.product"
                                        data-aos="fade-up"
                                        data-aos-delay="200"
                                        data-aos-duration="1000"
                                        class="w-[200px]" />
                                    <div
                                        data-aos="fade-down"
                                        data-aos-delay="200"
                                        data-aos-duration="1000"
                                        data-aos-offset="20"
                                        class="text-center font-bold">
                                        <p>Fresco</p>
                                        <p>{{ d.product }}</p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
