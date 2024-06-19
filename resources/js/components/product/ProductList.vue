<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { splitBlack, splitCappuccino } from '@/misc/utils.js';
import { useProductStore } from '@/stores/product-store';
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle } from '@vueuse/core';
import { Navigation } from 'swiper/modules';
import ProductPopup from '@/components/product/ProductPopup.vue';
import SplitType from 'split-type';
import 'swiper/css';

const { data, black, cappuccino } = defineProps([
  'data',
  'black',
  'cappuccino',
]);
const { idle } = useIdle(1000);
const idleWrapper = ref(false);
const productStore = useProductStore();
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const product = ref();
const swiper = ref();
const blackTitle = ref();
const cappuccinoTitle = ref();

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
    640: {
      slidesPerView: 2,
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

const splitterText = (target) => {
  let split = new SplitType(target, {
    types: 'lines',
    tagName: 'span',
  });
  let lines = split.lines;
  let delay = 100;

  for (let index = 0; index < lines.length; index++) {
    let element = target.children[index];
    delay += 100;
    themeStore.theme == 'black'
      ? splitBlack(element, index, delay, 1, '#product-title-anchor')
      : splitCappuccino(element, index, delay, 1, '#product-title-anchor');
  }
};

const initSwiper = () => {
  swiper.value = new Swiper(product.value, swiperOption);
};

const showPopup = (data) => {
  productStore.setPopUp(data);
};

onMounted(() => {
  splitterText(blackTitle.value);
  splitterText(cappuccinoTitle.value);

  if (!swiper.value) {
    initSwiper();
  }
});

watch(theme, () => {
  swiper.value = null;
  setTimeout(() => {
    initSwiper();
    splitterText(blackTitle.value);
    splitterText(cappuccinoTitle.value);
  });
});

window.addEventListener('resize', () => {
  splitterText(blackTitle.value);
  splitterText(cappuccinoTitle.value);
});
</script>

<template>
  <ProductPopup />
  <!-- Product List -->
  <div
    class="product-list"
    @mouseenter="idleWrapper = true"
    @mouseleave="idleWrapper = false"
    :style="{
      'background-image':
        themeStore.theme == 'black'
          ? `url(/${data.pd_black_banner_image})`
          : `url(/${data.pd_cappuccino_banner_image})`,
    }"
    :class="[
      themeStore.theme,
      themeStore.theme == 'black'
        ? `bg-fr-black ${data.pd_black_banner_position}`
        : `bg-fr-yellow ${data.pd_cappuccino_banner_position}`,
    ]">
    <div class="product-list-wrapper">
      <div
        class="fr-container mx-auto w-full px-4 pt-[50px] md:px-0 md:pt-0"
        id="product-title-anchor">
        <h1
          :class="themeStore.theme == 'black' && 'text-shadow'"
          v-if="themeStore.theme == 'black'"
          ref="blackTitle"
          v-html="data.pd_black_banner_title"></h1>
        <h1
          v-else
          ref="cappuccinoTitle"
          v-html="data.pd_cappuccino_banner_title"></h1>
        <div
          data-aos="fade-right"
          data-aos-delay="200"
          data-aos-duration="500"
          data-aos-offset="0"
          class="my-6 h-1.5 w-16 rounded-full bg-fr-red"
          :class="[
            themeStore.theme == 'black'
              ? data.pd_black_banner_position == 'text-left' && 'mr-auto'
              : data.pd_cappuccino_banner_position == 'text-left' && 'mr-auto',
            themeStore.theme == 'black'
              ? data.pd_black_banner_position == 'text-center' && 'mx-auto'
              : data.pd_cappuccino_banner_position == 'text-center' &&
                'mx-auto',
            themeStore.theme == 'black'
              ? data.pd_black_banner_position == 'text-right' && 'ml-auto'
              : data.pd_cappuccino_banner_position == 'text-right' && 'ml-auto',
          ]"></div>
      </div>
      <!-- Grid Layout (Desktop View) -->
      <div
        class="fr-container mx-auto hidden w-full gap-y-10 px-10 text-white md:flex md:items-baseline md:justify-between md:px-0">
        <div
          v-for="(d, i) in themeStore.theme == 'black' ? black : cappuccino"
          :key="i"
          @click="showPopup(d)"
          class="flex cursor-pointer flex-col items-center justify-between space-y-4 md:transition-all md:duration-300 md:ease-in-out md:hover:scale-110">
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
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            "
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
          :class="[
            themeStore.theme == 'black'
              ? 'bg-fr-red text-white'
              : 'bg-fr-yellow text-fr-black',
            idleWrapper
              ? idle && idleWrapper
                ? 'opacity-0'
                : 'opacity-100'
              : 'opacity-0',
          ]">
          <v-icon name="fa-chevron-left" />
        </div>
        <div
          class="fr-product-slider-next absolute right-[2%] top-1/2 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
          :class="[
            themeStore.theme == 'black'
              ? 'bg-fr-red text-white'
              : 'bg-fr-yellow text-fr-black',
            idleWrapper
              ? idle && idleWrapper
                ? 'opacity-0'
                : 'opacity-100'
              : 'opacity-0',
          ]">
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
                @click="showPopup(d)"
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
          class="swiper text-fr-black"
          ref="product">
          <div class="swiper-wrapper items-end py-0 md:py-6">
            <template v-for="n in 2">
              <div
                v-for="(d, i) in cappuccino"
                :key="i"
                @click="showPopup(d)"
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
