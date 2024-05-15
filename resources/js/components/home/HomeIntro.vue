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
      <!-- Video -->
      <div class="fr-container mx-auto">
        <video
          autoplay
          muted
          loop
          playsinline
          id="black-coffee"
          class="z-40 px-4 sm:px-0 md:pt-0"
          poster="/assets/images/placeholder-video.webp">
          <source
            src="/assets/videos/black-coffee-video.mp4"
            type="video/mp4" />
          Your browser does not support HTML5 video.
        </video>
      </div>
      <div class="shadow-up-black h-20 w-full"></div>
    </div>
    <!-- Home Intro Product Component -->
    <HomeIntroProduct :data="data" />
  </div>

  <!-- Cappuccino Theme -->
  <div v-if="themeStore.theme == 'cappuccino'">
    <!-- Home Intro Video -->
    <div class="home-intro-video" :class="themeStore.theme">
      <!-- Video -->
      <div class="fr-container mx-auto">
        <video
          autoplay
          muted
          loop
          playsinline
          id="cappuccino-coffee"
          class="z-40 px-4 sm:px-0"
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

<style scoped>
.shadow-up-black {
  background: rgb(5, 5, 5);
  background: linear-gradient(
    0deg,
    rgba(5, 5, 5, 1) 10%,
    rgba(5, 5, 5, 0.9) 20%,
    rgba(5, 5, 5, 0.8) 30%,
    rgba(5, 5, 5, 0.6) 55%,
    rgba(5, 5, 5, 0.3) 75%,
    rgba(5, 5, 5, 0) 95%
  );
}

.shadow-up-cappuccino {
  background: rgb(253, 198, 75);
  background: linear-gradient(
    0deg,
    rgba(253, 198, 75, 1) 10%,
    rgba(253, 198, 75, 0.9) 20%,
    rgba(253, 198, 75, 0.8) 30%,
    rgba(253, 198, 75, 0.6) 55%,
    rgba(253, 198, 75, 0.3) 75%,
    rgba(253, 198, 75, 0) 95%
  );
}
</style>
