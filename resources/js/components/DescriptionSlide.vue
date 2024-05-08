<script setup>
import {
  splitDescriptionBlack,
  splitDescriptionCappuccino,
} from '@/misc/utils.js';
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
import { Navigation } from 'swiper/modules';
import SplitType from 'split-type';
import AOS from 'aos';
import 'swiper/css';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const description = ref();
const swiper = ref();
const manifest = ref(null);
const delayAos = ref(0);

const swiperOption = {
  autoHeight: true,
  slidesPerView: 1,
  modules: [Navigation],
  navigation: {
    nextEl: '.fr-description-slider-next',
    prevEl: '.fr-description-slider-prev',
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
      ? splitDescriptionBlack(element, index, delay, 1, target)
      : splitDescriptionCappuccino(element, index, delay, 1, target);
  }

  delayAos.value = delay + 50;
};

const initSwiper = () => {
  swiper.value = new Swiper(description.value, swiperOption);
};

onMounted(() => {
  if (!swiper.value) {
    initSwiper();
  }

  if (manifest.value != null) {
    for (let i = 0; i < manifest.value.length; i++) {
      splitterText(manifest.value[i]);
    }
  }

  setTimeout(() => {
    AOS.refresh();
  }, 10);
});

watch(theme, () => {
  swiper.value = null;
  setTimeout(() => {
    initSwiper();
  });

  setTimeout(() => {
    for (let i = 0; i < manifest.value.length; i++) {
      splitterText(manifest.value[i]);
    }
  }, 10);
});

window.addEventListener('resize', () => {
  for (let i = 0; i < manifest.value.length; i++) {
    splitterText(manifest.value[i]);
  }
});
</script>

<template>
  <div
    class="relative block h-full w-full lg:hidden"
    :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
    <!-- === Slide Black Coffee === -->
    <div v-if="themeStore.theme == 'black'" class="swiper" ref="description">
      <div class="swiper-wrapper">
        <div
          v-for="(d, i) in data.black_desc_list"
          :key="i"
          class="swiper-slide">
          <div class="grid grid-rows-1">
            <img
              class="aspect-square object-cover object-center"
              width="auto"
              height="auto"
              :src="d.black_desc_image"
              :alt="d.black_desc_title" />
            <div
              class="relative flex w-full flex-col justify-between space-y-4 px-4 py-8">
              <div id="navigation-description">
                <!-- Navigation Swiper (Arrow Left) -->
                <div
                  class="fr-description-slider-prev absolute -top-4 left-0 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                  :class="
                    themeStore.theme == 'black'
                      ? 'bg-fr-yellow text-fr-black'
                      : 'bg-fr-red text-white'
                  ">
                  <v-icon name="fa-chevron-left" />
                </div>

                <!-- Navigation Swiper (Arrow Right) -->
                <div
                  class="fr-description-slider-next absolute -top-4 right-0 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                  :class="
                    themeStore.theme == 'black'
                      ? 'bg-fr-yellow text-fr-black'
                      : 'bg-fr-red text-white'
                  ">
                  <v-icon name="fa-chevron-right" />
                </div>
              </div>
              <h2
                class="text-center text-[40px] font-bold leading-none text-white"
                ref="manifest">
                {{ d.black_desc_title }}
              </h2>
              <p
                data-aos="fade-down"
                data-aos-offset="0"
                class="text-center font-medium leading-8 text-white">
                {{ d.black_desc_explanation }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- === Slide Cappuccino === -->
    <div
      v-if="themeStore.theme == 'cappuccino'"
      class="swiper"
      ref="description">
      <div class="swiper-wrapper">
        <div
          v-for="(d, i) in data.cappuccino_desc_list"
          :key="i"
          class="swiper-slide">
          <div class="grid grid-rows-1">
            <img
              class="aspect-square object-cover object-center"
              width="auto"
              height="auto"
              :src="d.cappuccino_desc_image"
              :alt="d.cappuccino_desc_title" />
            <div
              class="relative flex w-full flex-col justify-between space-y-4 px-4 py-8">
              <div id="navigation-description">
                <!-- Navigation Swiper (Arrow Left) -->
                <div
                  class="fr-description-slider-prev absolute -top-4 left-0 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                  :class="
                    themeStore.theme == 'black'
                      ? 'bg-fr-yellow text-fr-black'
                      : 'bg-fr-red text-white'
                  ">
                  <v-icon name="fa-chevron-left" />
                </div>

                <!-- Navigation Swiper (Arrow Right) -->
                <div
                  class="fr-description-slider-next absolute -top-4 right-0 z-[90] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full transition-all duration-700 ease-in-out"
                  :class="
                    themeStore.theme == 'black'
                      ? 'bg-fr-yellow text-fr-black'
                      : 'bg-fr-red text-white'
                  ">
                  <v-icon name="fa-chevron-right" />
                </div>
              </div>
              <h2
                class="text-center text-[40px] font-bold leading-none text-white"
                ref="manifest">
                {{ d.cappuccino_desc_title }}
              </h2>
              <p
                data-aos="fade-down"
                data-aos-offset="0"
                class="text-center font-medium leading-8 text-fr-black">
                {{ d.cappuccino_desc_explanation }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
