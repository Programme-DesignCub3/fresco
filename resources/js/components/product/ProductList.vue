<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
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
  <!-- Product List -->
  <div class="product-list">
    <div class="product-list-wrapper">
      <div class="px-4 pt-[50px] sm:px-0 md:pt-0" id="product-title-anchor">
        <h1>
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
        <div
          data-aos="fade-right"
          data-aos-delay="200"
          data-aos-duration="500"
          data-aos-offset="0"
          class="my-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
      </div>
      <!-- Grid Layout (Desktop View) -->
      <div
        class="hidden gap-y-10 px-10 text-white md:flex md:items-baseline md:justify-between md:px-0">
        <div
          v-for="(d, i) in themeStore.theme == 'black' ? black : cappuccino"
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
            class="text-center font-medium">
            <p>Fresco</p>
            <p>{{ d.product }}</p>
          </div>
        </div>
      </div>
      <!-- Slider Layout (Mobile View) -->
      <div class="relative block w-full md:hidden">
        <div
          class="fr-product-slider-prev absolute left-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
          :class="
            themeStore.theme == 'black'
              ? 'bg-fr-red text-white'
              : 'bg-fr-yellow text-fr-black'
          ">
          <v-icon name="fa-chevron-left" />
        </div>
        <div
          class="fr-product-slider-next absolute right-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
          :class="
            themeStore.theme == 'black'
              ? 'bg-fr-red text-white'
              : 'bg-fr-yellow text-fr-black'
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
                v-for="(d, i) in themeStore.theme == 'black'
                  ? black
                  : cappuccino"
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
              <div v-for="(d, i) in cappuccino" :key="i" class="swiper-slide">
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
