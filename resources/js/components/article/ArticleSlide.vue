<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { Navigation } from 'swiper/modules';
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle, useMediaQuery } from '@vueuse/core';
import { Icon } from '@iconify/vue';
import 'swiper/css';

const { data } = defineProps(['data']);
const { idle } = useIdle(2000);
const idleWrapper = ref(false);
const isDesktop = useMediaQuery('(min-width: 768px)');
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const article = ref();
const swiper = ref();

const swiperOption = {
    autoHeight: true,
    spaceBetween: 20,
    slidesPerView: 1,
    modules: [Navigation],
    navigation: {
        nextEl: '.article-slide .next',
        prevEl: '.article-slide .prev',
    },
    breakpoints: {
        1024: {
            slidesPerView: 3,
        },
        640: {
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
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" @mouseenter="idleWrapper = true"
        @mouseleave="idleWrapper = false" class="article-slide" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-4 py-10 md:px-0 md:py-16">
            <div class="flex w-full flex-col gap-10">
                <h2 class="relative text-4xl font-bold leading-none text-white">
                    Artikel lainnya
                </h2>
                <!-- List Articles -->
                <div class="flex flex-col gap-6">
                    <div class="swiper w-full" ref="article">
                        <div class="swiper-wrapper">
                            <div v-for="d in data" class="swiper-slide">
                                <a :href="d.slug" class="group">
                                    <img v-if="d.image_square" width="auto" height="auto"
                                        class="relative w-full aspect-square object-cover object-center"
                                        :src="d.image_square" :alt="d.title" />
                                    <img v-else-if="d.image_square == null && d.image" width="auto" height="auto"
                                        class="relative w-full aspect-square object-cover object-center" :src="d.image"
                                        :alt="d.title" />
                                    <img v-else-if="d.image_square == null && d.image == null" width="auto"
                                        height="auto" class="relative w-full aspect-square object-cover object-center"
                                        src="/assets/images/meta-image.png" :alt="d.title" />
                                    <div :class="themeStore.theme == 'black'
                                        ? 'from-fr-yellow/80 via-fr-yellow/60 group-hover:bg-fr-yellow/30'
                                        : 'from-fr-yellow/80 via-fr-yellow/60 group-hover:bg-fr-yellow/30'
                                        "
                                        class="absolute bottom-0 left-0 right-0 flex aspect-square h-3/4 w-full items-center justify-center bg-gradient-to-t from-15% via-50% to-transparent transition-all duration-500 ease-in-out group-hover:h-full">
                                        <div class="flex flex-col items-center gap-3 text-zinc-800">
                                            <h3 class="px-3 text-center text-lg font-semibold">
                                                {{ d.title }}
                                            </h3>
                                            <p>{{ d.timestamp }}</p>
                                        </div>
                                        <p
                                            class="absolute -bottom-12 rounded-full bg-fr-red px-6 py-2 text-sm font-medium text-white transition-all duration-500 ease-in-out group-hover:bottom-8">
                                            READ MORE
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Arrow Slider -->
                    <div class="prev" :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                                ? 0
                                : 1,
                    }">
                        <Icon icon="fa-solid:chevron-left" />
                    </div>
                    <div class="next" :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                                ? 0
                                : 1,
                    }">
                        <Icon icon="fa-solid:chevron-right" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
