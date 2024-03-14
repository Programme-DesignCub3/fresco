<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { EffectCoverflow, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const { data } = defineProps(['data'])
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const activity = ref();
const swiper = ref();
const activityLink = ref();

const swiperOption = {
    centeredSlides: true,
    slidesPerView: 2,
    loop: true,
    effect: 'coverflow',
    modules: [EffectCoverflow, Navigation],
    coverflowEffect: {
        rotate: 0,
        stretch: 100,
        scale: 0.9,
        depth: 150,
        modifier: 1,
        slideShadows: true,
    },
    navigation: {
        nextEl: '.fr-activity-slider-next',
        prevEl: '.fr-activity-slider-prev',
    },
    breakpoints: {
        768: {
            coverflowEffect: {
                rotate: 0,
                stretch: 160,
                scale: 0.9,
                depth: 150,
                modifier: 1,
                slideShadows: true,
            },
        },
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
    activityLink.value = data[0].link;

    swiper.value.on('realIndexChange', () => {
        activityLink.value = data[swiper.value.realIndex].link;
    });
});

watch(theme, () => {
    initSwiper();
    activityLink.value = data[0].link;

    swiper.value.on('realIndexChange', () => {
        activityLink.value = data[swiper.value.realIndex].link;
    });
});
</script>

<template>
    <div
        class="relative py-10 bg-bottom bg-no-repeat bg-cover md:py-20"
        :class="themeStore.theme == 'black' ? 'bg-activity' : 'bg-fr-yellow'">

        <!-- Navigation Swiper (Arrow Left) -->
        <div
            class="fr-activity-slider-prev absolute left-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out sm:left-[6%] md:left-[8%] lg:left-[10%] 2xl:left-[12%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-left" />
        </div>

        <!-- Navigation Swiper (Arrow Right) -->
        <div
            class="fr-activity-slider-next absolute right-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out sm:right-[6%] md:right-[8%] lg:right-[10%] 2xl:right-[12%]"
            :class="
                themeStore.theme == 'black'
                    ? 'bg-fr-yellow text-black'
                    : 'bg-fr-red text-white'
            ">
            <v-icon name="fa-chevron-right" />
        </div>

        <!-- Title -->
        <div class="mx-auto space-y-12 fr-container">
            <div class="space-y-6">

                <!-- Double element for refresh AOS Animation -->
                <h2
                    v-if="themeStore.theme == 'black'"
                    data-aos="flip-down"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                    data-aos-offset="0"
                    class="text-shadow px-4 text-[30px] font-bold leading-none text-white sm:px-0 sm:text-[40px] md:text-[50px]">
                    AKTIVITAS
                </h2>
                <h2
                    v-else
                    data-aos="flip-down"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                    data-aos-offset="0"
                    class="text-shadow px-4 text-[30px] font-bold leading-none text-fr-green sm:px-0 sm:text-[40px] md:text-[50px]">
                    AKTIVITAS
                </h2>

                <!-- Double element for refresh AOS Animation -->
                <div
                    v-if="themeStore.theme == 'black'"
                    data-aos="fade-right"
                    data-aos-delay="200"
                    data-aos-duration="500"
                    data-aos-offset="0"
                    class="ml-4 h-[4px] w-16 rounded-full bg-fr-red sm:ml-0"></div>
                <div
                    v-else
                    data-aos="fade-right"
                    data-aos-delay="200"
                    data-aos-duration="500"
                    data-aos-offset="0"
                    class="ml-4 h-[4px] w-16 rounded-full bg-fr-red sm:ml-0"></div>

            </div>

            <!-- Slider -->
            <div class="swiper" ref="activity">
                <div class="swiper-wrapper">
                    <div v-for="(d, i) in data" :key="i" class="swiper-slide">
                        <img
                            :src="d.image"
                            width="auto"
                            height="auto"
                            alt="FresCo Activity"
                            class="object-cover object-center mx-auto aspect-square xl:w-[600px] xl:h-[600px]">
                    </div>
                </div>
            </div>

            <!-- Read More Button -->
            <div class="text-center">
                <a
                    :href="activityLink"
                    target="_blank"
                    class="inline rounded-lg border border-fr-red bg-fr-red px-6 py-2.5 text-xs font-medium text-white transition-all duration-300 ease-in-out hover:border-fr-darker-red hover:bg-fr-darker-red group-hover:border group-hover:border-white md:px-8 md:text-sm">
                    READ MORE
                    <v-icon
                        class="h-4 w-4 stroke-2 py-[2px]"
                        name="fa-chevron-right" />
                </a>
            </div>

        </div>
    </div>
</template>

<style scoped>
@keyframes arrow-slide-fade {
    0% {
        opacity: 0;
        transform: translateX(-50%);
    }
    50% {
        opacity: 1;
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        transform: translateX(50%);
    }
}

.arrow-slide-fade-right {
    animation: arrow-slide-fade 1.5s ease-in-out infinite;
}
</style>
