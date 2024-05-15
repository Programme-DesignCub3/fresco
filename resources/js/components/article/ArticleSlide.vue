<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const article = ref();
const swiper = ref();

const swiperOption = {
  autoHeight: true,
  spaceBetween: 30,
  slidesPerView: 1,
  slidesPerGroup: 1,
  modules: [Navigation],
  navigation: {
    nextEl: '.article-slide .next',
    prevEl: '.article-slide .prev',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      slidesPerGroup: 2,
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
  <!-- Article Slide -->
  <div class="article-slide" :class="themeStore.theme">
    <!-- Arrow Slider -->
    <div class="prev">
      <v-icon name="fa-chevron-left" />
    </div>
    <div class="next">
      <v-icon name="fa-chevron-right" />
    </div>
    <!-- Article Slide Wrapper -->
    <div class="article-slide-wrapper">
      <!-- Section Title -->
      <h1>Artikel lainnya</h1>
      <!-- Slider -->
      <div class="swiper" ref="article">
        <div class="swiper-wrapper">
          <div v-for="(d, i) in data" :key="i" class="swiper-slide">
            <div class="article-slide-content">
              <div class="w-full">
                <img
                  width="auto"
                  height="auto"
                  class="aspect-square object-cover object-center"
                  :src="d.image"
                  :alt="d.title" />
              </div>
              <div
                class="flex w-full flex-col gap-y-3 transition-all duration-700 ease-in-out">
                <div class="space-y-1">
                  <h2 class="text-xl font-semibold text-fr-yellow">
                    {{ d.title }}
                  </h2>
                  <p class="text-white">
                    {{ d.excerpt }}
                  </p>
                </div>
                <div>
                  <a
                    :href="d.slug"
                    class="button"
                    :class="themeStore.theme == 'black' ? 'yellow' : 'red'">
                    READ MORE
                    <v-icon
                      class="h-4 w-4 stroke-2 py-[2px]"
                      name="fa-chevron-right" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
