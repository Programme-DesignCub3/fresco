<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const themeStore = useThemeStore();
</script>

<template>
  <div
    class="px-4 py-10 transition-all duration-700 ease-in-out md:px-0 md:py-16"
    :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
    <div class="fr-container mx-auto">
      <h2
        class="flex flex-col text-[40px] font-bold leading-none md:text-5xl lg:text-6xl">
        <span
          data-aos="fade-right"
          data-aos-delay="200"
          data-aos-duration="500"
          :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-green'"
          >KELEBIHAN</span
        >
        <span
          data-aos="fade-right"
          data-aos-delay="400"
          data-aos-duration="500"
          :class="
            themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-red'
          "
          >KOPI FRESCO</span
        >
      </h2>
      <div
        data-aos="fade-right"
        data-aos-delay="200"
        data-aos-duration="500"
        class="my-6 h-1.5 w-16 rounded-full bg-fr-red"></div>
    </div>
  </div>
</template>
