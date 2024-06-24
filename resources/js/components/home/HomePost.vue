<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { Navigation } from 'swiper/modules';
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle, useMediaQuery } from '@vueuse/core';
import 'swiper/css';

const { data } = defineProps(['data']);
const { idle } = useIdle(3500);
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
  <div
    v-if="themeStore.theme != undefined || themeStore.theme != null"
    @mouseenter="idleWrapper = true"
    @mouseleave="idleWrapper = false"
    class="home-post"
    :class="themeStore.theme">
    <div class="fr-container mx-auto w-full px-4 py-10 md:px-0 md:py-16">
      <div class="flex w-full flex-col gap-16">
        <h2
          class="relative text-4xl font-bold leading-none after:absolute after:-bottom-6 after:left-0 after:h-1.5 after:w-16 after:rounded-full after:bg-fr-red"
          :class="
            themeStore.theme == 'black' ? 'text-fr-black' : 'text-fr-black'
          ">
          Articles
        </h2>
        <!-- List Articles -->
        <div class="flex flex-col gap-6">
          <div class="swiper w-full" ref="post">
            <div class="swiper-wrapper">
              <div v-for="d in data" class="swiper-slide">
                <a :href="'artikel/' + d.slug" class="group">
                  <img
                    width="auto"
                    height="auto"
                    class="relative aspect-square object-cover object-center"
                    :src="d.image"
                    :alt="d.title" />
                  <div
                    :class="
                      themeStore.theme == 'black'
                        ? 'from-fr-red via-fr-red/80 group-hover:bg-fr-red/30'
                        : 'from-fr-red via-fr-red/80 group-hover:bg-fr-red/30'
                    "
                    class="absolute bottom-0 left-0 right-0 flex aspect-square h-3/4 w-full items-center justify-center bg-gradient-to-t from-15% via-50% to-transparent transition-all duration-500 ease-in-out group-hover:h-full">
                    <div class="flex flex-col items-center gap-3 text-white">
                      <h3
                        class="px-3 text-center text-lg font-semibold text-white">
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
            <!-- Arrow Slider -->
            <div
              class="prev"
              :style="{
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
              <v-icon name="fa-chevron-left" />
            </div>
            <div
              class="next"
              :style="{
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
              <v-icon name="fa-chevron-right" />
            </div>
          </div>
          <!-- See All Button -->
          <div class="text-end">
            <a
              href="/artikel"
              class="cursor-pointer transition-all duration-700 ease-in-out"
              :class="
                themeStore.theme == 'black' ? 'button red' : 'button red'
              ">
              SEE ALL ARTICLES
              <v-icon
                class="h-4 w-4 stroke-2 py-[2px]"
                name="fa-chevron-right" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
