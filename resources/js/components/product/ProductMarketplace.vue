<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
  <div
    class="px-4 py-10 transition-all duration-700 ease-in-out sm:px-0 md:py-20"
    :class="themeStore.theme == 'black' ? 'bg-radial-red' : 'bg-radial-green'">
    <div class="fr-container mx-auto flex flex-col gap-y-5 lg:gap-y-8">
      <!-- Section Title -->
      <h2
        class="text-shadow flex flex-col items-center justify-center gap-x-3 text-center text-[40px] font-bold leading-none md:flex-row md:text-5xl lg:text-6xl">
        <span
          data-aos="fade-right"
          data-aos-delay="200"
          data-aos-duration="500"
          class="text-white"
          >YUK SEGERA</span
        >
        <span
          data-aos="fade-right"
          data-aos-delay="400"
          data-aos-duration="500"
          class="text-fr-yellow"
          >DAPATKAN KOPINYA</span
        >
      </h2>
      <!--  Marketplace -->
      <div class="flex flex-wrap justify-center gap-5">
        <a
          data-aos="zoom-in"
          data-aos-delay="200"
          data-aos-duration="500"
          :href="data.tokopedia_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl transition-all duration-300 ease-in-out hover:scale-105 md:w-44 lg:w-52"
            src="/assets/images/icons/tokopedia.png"
            alt="Tokopedia" />
        </a>
        <a
          data-aos="zoom-in"
          data-aos-delay="300"
          data-aos-duration="500"
          :href="data.shopee_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl transition-all duration-300 ease-in-out hover:scale-105 md:w-44 lg:w-52"
            src="/assets/images/icons/shopee.png"
            alt="Shopee" />
        </a>
        <a
          data-aos="zoom-in"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.lazada_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl transition-all duration-300 ease-in-out hover:scale-105 md:w-44 lg:w-52"
            src="/assets/images/icons/lazada.png"
            alt="Lazada" />
        </a>
        <a
          data-aos="zoom-in"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.kapalapi_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl transition-all duration-300 ease-in-out hover:scale-105 md:w-44 lg:w-52"
            src="/assets/images/icons/kapal-api-store.png"
            alt="Kapal Api Store" />
        </a>
      </div>
    </div>
  </div>
</template>
