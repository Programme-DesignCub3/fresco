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
const post = ref();
const swiper = ref();

const swiperOption = {
    autoHeight: true,
    spaceBetween: 20,
    slidesPerView: 1,
    modules: [Navigation],
    navigation: {
        nextEl: '.home-post .next',
        prevEl: '.home-post .prev',
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
    swiper.value = new Swiper(post.value, swiperOption);
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
    }, 10);
});
</script>

<template>
    <!-- Home Post -->
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" @mouseenter="idleWrapper = true"
        @mouseleave="idleWrapper = false" class="home-post" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-4 py-5 md:px-0 md:py-10">
            <div class="flex w-full flex-col gap-16">
                <h2
                    :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'"
                    class="relative text-4xl font-bold leading-none transition-all duration-300 ease-in-out after:absolute after:-bottom-6 after:left-0 after:h-1.5 after:w-16 after:rounded-full after:bg-fr-red">
                    Articles
                </h2>
                <!-- List Articles -->
                <div class="flex flex-col gap-6">
                    <div class="swiper w-full" ref="post">
                        <div class="swiper-wrapper">
                            <div v-for="d in data" class="swiper-slide">
                                <a :href="'artikel/' + d.slug" class="group">
                                    <img v-if="d.image_square" width="auto" height="auto"
                                        class="relative w-full aspect-square object-cover object-center" :src="d.image_square"
                                        :alt="d.title" />
                                    <img v-else-if="d.image_square == null && d.image" width="auto" height="auto"
                                        class="relative w-full aspect-square object-cover object-center" :src="d.image"
                                        :alt="d.title" />
                                    <img v-else-if="d.image_square == null && d.image == null" width="auto" height="auto"
                                        class="relative w-full aspect-square object-cover object-center" src="/assets/images/meta-image.png"
                                        :alt="d.title" />
                                    <div :class="themeStore.theme == 'black'
                                        ? 'from-fr-red/80 via-fr-red/60 group-hover:bg-fr-red/30'
                                        : 'from-fr-red/80 via-fr-red/60 group-hover:bg-fr-red/30'
                                        "
                                        class="absolute bottom-0 left-0 right-0 flex aspect-square h-3/4 w-full items-center justify-center bg-gradient-to-t from-15% via-50% to-transparent transition-all duration-500 ease-in-out group-hover:h-full">
                                        <div class="flex flex-col items-center gap-3 text-white">
                                            <h3 class="px-3 text-center text-lg font-semibold text-white">
                                                {{ d.title }}
                                            </h3>
                                            <p>{{ d.timestamp }}</p>
                                        </div>
                                        <p
                                            class="absolute -bottom-12 rounded-full bg-fr-yellow px-6 py-2 text-sm font-medium text-black transition-all duration-500 ease-in-out group-hover:bottom-8">
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
                    <!-- See All Button -->
                    <div class="text-end">
                        <a href="/artikel" class="cursor-pointer transition-all duration-700 ease-in-out" :class="themeStore.theme == 'black'
                            ? 'button red'
                            : 'button red'
                            ">
                            SEE ALL ARTICLES
                            <Icon class="inline-block h-4 w-4 stroke-2 py-[2px]" icon="fa-solid:chevron-right" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
