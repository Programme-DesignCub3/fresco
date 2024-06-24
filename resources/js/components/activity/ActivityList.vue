<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle, useMediaQuery } from '@vueuse/core';
import { EffectCoverflow, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/effect-coverflow';

const { data } = defineProps(['data']);
const { idle } = useIdle(3500);
const idleWrapper = ref(false);
const isDesktop = useMediaQuery('(min-width: 768px)');
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
    slideShadows: false,
  },
  navigation: {
    nextEl: '.activity-list .next',
    prevEl: '.activity-list .prev',
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
  activityLink.value = data[0].links[0].link;

  swiper.value.on('realIndexChange', () => {
    activityLink.value = data[swiper.value.realIndex].links[0].link;
  });
});

watch(theme, () => {
  initSwiper();
  activityLink.value = data[0].links[0].link;

  swiper.value.on('realIndexChange', () => {
    activityLink.value = data[swiper.value.realIndex].links[0].link;
  });
});
</script>

<template>
  <!-- Activity List -->
  <div
    @mouseenter="idleWrapper = true"
    @mouseleave="idleWrapper = false"
    class="activity-list"
    :class="themeStore.theme">
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
    <!-- Activity List Wrapper -->
    <div class="activity-list-wrapper">
      <!-- Page Title -->
      <h2
        data-aos="flip-down"
        data-aos-delay="400"
        data-aos-duration="1000"
        data-aos-offset="0"
        class="page-title-center"
        :class="themeStore.theme">
        AKTIVITAS
      </h2>
      <!-- Slider -->
      <div class="swiper" ref="activity">
        <div class="swiper-wrapper">
          <div v-for="(d, i) in data" :key="i" class="swiper-slide">
            <div class="activity-list-slide">
              <a :href="activityLink" target="_blank">
                <img
                  :src="d.image"
                  :alt="d.title ? d.title : 'Fresco Activity'"
                  width="auto"
                  height="auto" />
              </a>
              <div class="activity-list-slide-detail">
                <h3>{{ d.title }}</h3>
                <p v-html="d.description"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
