<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const { black, cappuccino } = defineProps(['black', 'cappuccino']);
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
      slidesPerView: 3,
      spaceBetween: 0,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 0,
    },
    550: {
      slidesPerView: 1,
      spaceBetween: -300,
    },
    425: {
      slidesPerView: 1,
      spaceBetween: -200,
    },
    375: {
      spaceBetween: -160,
    },
    320: {
      spaceBetween: -140,
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
  }),
    10;
});
</script>

<template>
  <div
    v-if="
      themeStore.getTheme().value != undefined &&
      themeStore.getTheme().value != null
    "
    class="product-coffee relative px-0 py-10 transition-all duration-700 ease-in-out md:px-10 md:py-16"
    :class="themeStore.theme == 'black' ? 'bg-radial-red' : 'bg-radial-green'">
    <!-- Navigation Swiper (Arrow Left) -->
    <div
      class="fr-product-slider-prev absolute left-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:left-[6%] md:left-[8%] lg:left-[10%] 2xl:left-[12%]"
      :class="
        themeStore.theme == 'black'
          ? 'bg-fr-yellow text-fr-black'
          : 'bg-fr-yellow text-fr-black'
      ">
      <v-icon name="fa-chevron-left" />
    </div>

    <!-- Navigation Swiper (Arrow Right) -->
    <div
      class="fr-product-slider-next absolute right-[4%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:right-[6%] md:right-[8%] lg:right-[10%] 2xl:right-[12%]"
      :class="
        themeStore.theme == 'black'
          ? 'bg-fr-yellow text-fr-black'
          : 'bg-fr-yellow text-fr-black'
      ">
      <v-icon name="fa-chevron-right" />
    </div>

    <div class="fr-container mx-auto w-full space-y-16 text-center">
      <!-- === Slide Black Coffee === -->
      <div v-if="themeStore.theme == 'black'" class="swiper" ref="product">
        <div class="swiper-wrapper items-end py-4 md:py-8">
          <template v-for="n in 2">
            <div v-for="(d, i) in black" class="swiper-slide" :key="i">
              <div
                class="flex flex-col items-center justify-between space-y-12">
                <img
                  width="auto"
                  height="auto"
                  :src="d.image"
                  :alt="d.product"
                  data-aos="fade-up"
                  class="reflect-image-product w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]" />
                <div
                  data-aos="fade-down"
                  class="text-center font-medium text-white">
                  <p>FresCo</p>
                  <p>{{ d.product }}</p>
                  <div class="pt-4">
                    <a
                      :href="d.links[0].link"
                      target="_blank"
                      class="button green">
                      TEMUKAN PRODUK
                      <v-icon
                        class="h-4 w-4 stroke-2 py-[2px]"
                        name="fa-chevron-right" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>

      <!-- === Slide Cappuccino === -->
      <div v-if="themeStore.theme == 'cappuccino'" class="swiper" ref="product">
        <div class="swiper-wrapper items-end py-4 md:py-8">
          <template v-for="n in 2">
            <div v-for="(d, i) in cappuccino" class="swiper-slide" :key="i">
              <div
                class="flex flex-col items-center justify-between space-y-12">
                <img
                  width="auto"
                  height="auto"
                  :src="d.image"
                  :alt="d.product"
                  data-aos="fade-up"
                  class="reflect-image-product w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]" />
                <div
                  data-aos="fade-down"
                  class="text-center font-bold text-white">
                  <p>FresCo</p>
                  <p>{{ d.product }}</p>
                  <div class="pt-4">
                    <a
                      :href="d.links[0].link"
                      target="_blank"
                      class="button yellow">
                      BELI SEKARANG
                      <v-icon
                        class="h-4 w-4 stroke-2 py-[2px]"
                        name="fa-chevron-right" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
