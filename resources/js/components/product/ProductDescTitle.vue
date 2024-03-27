<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
  <div
    class="px-4 py-10 transition-all duration-700 ease-in-out sm:px-0 md:py-16"
    :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
    <div class="fr-container mx-auto">
      <!-- Double element for refresh AOS Animation -->
      <h2
        v-if="themeStore.theme == 'black'"
        class="flex flex-col text-[40px] font-bold leading-none md:text-[50px] lg:text-[60px] xl:text-[80px]">
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
      <h2
        v-if="themeStore.theme == 'cappuccino'"
        class="flex flex-col text-[40px] font-bold leading-none md:text-[50px] lg:text-[60px] xl:text-[80px]">
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

      <!-- Double element for refresh AOS Animation -->
      <div
        v-if="themeStore.theme == 'black'"
        data-aos="fade-right"
        data-aos-delay="200"
        data-aos-duration="500"
        class="mt-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
      <div
        v-if="themeStore.theme == 'cappuccino'"
        data-aos="fade-right"
        data-aos-delay="200"
        data-aos-duration="500"
        class="mt-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
    </div>
  </div>
</template>

<style scoped>
.text-shadow {
  text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
