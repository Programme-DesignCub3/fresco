<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
  <div
    class="px-4 py-10 transition-all duration-700 ease-in-out sm:px-0 md:py-20"
    :class="themeStore.theme == 'black' ? 'bg-radial-red' : 'bg-radial-green'">
    <div
      class="fr-container mx-auto flex flex-col gap-y-3 md:gap-y-5 lg:gap-y-8">
      <!-- Double element for refresh AOS Animation -->
      <h2
        v-if="themeStore.theme == 'black'"
        class="flex justify-center gap-x-4 text-[40px] font-bold leading-none md:text-[50px] lg:text-[60px]">
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
      <h2
        v-if="themeStore.theme == 'cappuccino'"
        class="flex justify-center gap-x-4 text-[40px] font-bold leading-none md:text-[50px] lg:text-[60px]">
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

      <!-- Black Coffee Marketplace -->
      <div v-if="themeStore.theme == 'black'" class="flex justify-center gap-5">
        <a
          data-aos="flip-up"
          data-aos-delay="200"
          data-aos-duration="500"
          :href="data.tokopedia_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/tokopedia.png"
            alt="Tokopedia" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="300"
          data-aos-duration="500"
          :href="data.shopee_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/shopee.png"
            alt="Shopee" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.lazada_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/lazada.png"
            alt="Lazada" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.kapalapi_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/kapal-api-store.png"
            alt="Kapal Api Store" />
        </a>
      </div>

      <!-- Cappuccino Marketplace -->
      <div
        v-if="themeStore.theme == 'cappuccino'"
        class="flex justify-center gap-5">
        <a
          data-aos="flip-up"
          data-aos-delay="200"
          data-aos-duration="500"
          :href="data.tokopedia_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/tokopedia.png"
            alt="Tokopedia" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="300"
          data-aos-duration="500"
          :href="data.shopee_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/shopee.png"
            alt="Shopee" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.lazada_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/lazada.png"
            alt="Lazada" />
        </a>
        <a
          data-aos="flip-up"
          data-aos-delay="400"
          data-aos-duration="500"
          :href="data.kapalapi_store"
          target="_blank">
          <img
            width="auto"
            height="auto"
            class="box-shadow w-36 rounded-2xl md:w-44 lg:w-52"
            src="/assets/images/icons/kapal-api-store.png"
            alt="Kapal Api Store" />
        </a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.text-shadow {
  text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}

.box-shadow {
  box-shadow: 8px 8px 6px 0px rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 8px 8px 6px 0px rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 8px 8px 6px 0px rgba(0, 0, 0, 0.5);
}
</style>
