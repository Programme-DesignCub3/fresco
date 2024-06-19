<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import HomeIntroProduct from '@/components/home/HomeIntroProduct.vue';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
  <!-- Black Theme -->
  <div v-if="themeStore.theme == 'black'">
    <div class="home-intro-video" :class="themeStore.theme">
      <div class="home-intro-video-wrapper">
        <img
          data-aos="fade-down"
          data-aos-offset="0"
          data-aos-duration="2000"
          width="auto"
          height="auto"
          class="absolute left-0 top-0 h-auto w-full -translate-y-[500px] object-cover object-bottom brightness-75 md:h-[320px]"
          src="/assets/images/black-bg-home.webp"
          alt="Black Coffee Home Background" />
        <div
          class="absolute left-0 top-0 h-28 w-full bg-gradient-to-b from-fr-black/75 to-transparent"></div>
        <video
          autoplay
          muted
          loop
          playsinline
          id="black-coffee"
          poster="/assets/images/placeholder-black-coffee.webp">
          <source
            src="/assets/videos/black-coffee-video.mp4"
            type="video/mp4" />
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
    <HomeIntroProduct :data="data" />
  </div>

  <!-- Cappuccino Theme -->
  <div v-if="themeStore.theme == 'cappuccino'">
    <div class="home-intro-video" :class="themeStore.theme">
      <div class="home-intro-video-wrapper">
        <video
          autoplay
          muted
          loop
          playsinline
          id="cappuccino-coffee"
          poster="/assets/images/placeholder-cappuccino-coffee.webp">
          <source src="/assets/videos/cappuccino-video.mp4" type="video/mp4" />
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
    <HomeIntroProduct :data="data" />
  </div>
</template>
