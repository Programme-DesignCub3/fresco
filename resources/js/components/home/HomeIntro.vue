<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import HomeIntroProduct from '@/components/home/HomeIntroProduct.vue';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
  <!-- Black Theme -->
  <div v-if="themeStore.theme == 'black'">
    <!-- Home Intro Video -->
    <div class="home-intro-video" :class="themeStore.theme">
      <div class="home-intro-video-wrapper">
        <!-- Video -->
        <video
          autoplay
          muted
          loop
          playsinline
          id="black-coffee"
          poster="/assets/images/placeholder-video.webp">
          <source
            src="/assets/videos/black-coffee-video.mp4"
            type="video/mp4" />
          Your browser does not support HTML5 video.
        </video>
      </div>
      <div class="home-intro-shadow-up"></div>
    </div>
    <!-- Home Intro Product Component -->
    <HomeIntroProduct :data="data" />
  </div>

  <!-- Cappuccino Theme -->
  <div v-if="themeStore.theme == 'cappuccino'">
    <!-- Home Intro Video -->
    <div class="home-intro-video" :class="themeStore.theme">
      <div class="home-intro-video-wrapper">
        <!-- Video -->
        <video
          autoplay
          muted
          loop
          playsinline
          id="cappuccino-coffee"
          poster="/assets/images/placeholder-video.webp">
          <source src="/assets/videos/cappuccino-video.mp4" type="video/mp4" />
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
    <!-- Home Intro Product Component -->
    <HomeIntroProduct :data="data" />
  </div>
</template>
