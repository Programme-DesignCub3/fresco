<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { ref } from 'vue';

const themeStore = useThemeStore();

const enableCustomLayout = (theme) => themeStore.setTheme(theme);
</script>

<template>
  <header
    v-if="themeStore.theme == undefined || themeStore.theme == null"
    class="relative z-[999999999] flex h-dvh flex-col">
    <div class="bg-radial-darker-red relative h-full max-h-[75%] w-full py-8">
      <div
        class="absolute bottom-[27%] h-12 w-full bg-gradient-to-t from-[#470610] to-transparent"></div>
      <div
        class="absolute bottom-[20%] h-12 w-full bg-gradient-to-b from-[#470610] to-transparent"></div>
      <div class="flex flex-col items-center justify-center gap-6">
        <img
          class="mx-auto w-[180px]"
          src="/assets/images/logo.png"
          alt="FresCo Logo" />
        <h1 class="text-shadow text-6xl font-black tracking-wide text-white">
          TEMUKAN RASA PILIHANMU!
        </h1>
        <div class="relative flex items-end justify-center">
          <img
            class="reflect-image-product w-[180px]"
            src="/assets/images/bubuk-hitam.png"
            alt="Kopi Bubuk Hitam" />
          <img
            class="reflect-image-product w-[180px]"
            src="/assets/images/kopi-gula.png"
            alt="Kopi + Gula" />
          <img
            class="reflect-image-product w-[180px]"
            src="/assets/images/krim-moka.png"
            alt="Kopi Krim Moka" />
          <img
            class="reflect-image-product w-[180px]"
            src="/assets/images/krim-susu.png"
            alt="Kopi Krim Susu" />
          <img
            class="reflect-image-product w-[180px]"
            src="/assets/images/cappuccino.png"
            alt="Cappuccino" />
        </div>
      </div>
    </div>

    <div class="relative flex h-full max-h-[25%] w-full">
      <!-- Black Coffee Theme -->
      <button
        @click="
          () => {
            enableCustomLayout('black');
            blackHover = false;
          }
        "
        class="flex w-1/2 items-center justify-end gap-x-12 bg-fr-red p-8 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
        <div class="flex items-center justify-center gap-x-6">
          <span
            class="flex h-9 w-9 rotate-180 items-center justify-center rounded-full bg-fr-yellow text-fr-black">
            <v-icon class="arrow-slide-fade-right" name="fa-chevron-right" />
          </span>
          <h4
            class="text-shadow z-[999] mr-[260px] flex w-[200px] flex-col text-left text-5xl font-black leading-none text-white">
            CARI TAHU ENAKNYA
          </h4>
        </div>
        <img
          class="absolute top-1/2 w-[250px] -translate-y-2/3"
          src="/assets/images/menu-black.png"
          alt="Cappuccino Theme" />
      </button>

      <!-- Cappuccino Theme -->
      <button
        @click="
          () => {
            enableCustomLayout('cappuccino');
            cappuccinoHover = false;
          }
        "
        class="flex w-1/2 items-center gap-x-12 bg-fr-yellow p-8 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
        <img
          class="absolute top-1/2 w-[140px] -translate-y-2/3"
          src="/assets/images/menu-cappuccino.png"
          alt="Cappuccino Theme" />
        <div class="flex items-center justify-center gap-x-6">
          <h4
            class="text-shadow z-[999] ml-[260px] flex w-[270px] flex-col text-right text-5xl font-black leading-none text-white">
            BANYAK CARA NIKMATINNYA
          </h4>
          <span
            class="flex h-9 w-9 items-center justify-center rounded-full bg-fr-red text-white">
            <v-icon class="arrow-slide-fade-right" name="fa-chevron-right" />
          </span>
        </div>
      </button>
    </div>
  </header>
</template>

<style scoped>
@keyframes float-animation {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
  100% {
    transform: translateY(0);
  }
}

@keyframes arrow-slide-fade {
  0% {
    opacity: 0;
    transform: translateX(-50%);
  }
  50% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
    transform: translateX(50%);
  }
}

.text-shadow {
  text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7);
}

.float-animate {
  animation: float-animation 3s ease-in-out infinite;
}

.arrow-slide-fade-left {
  animation: arrow-slide-fade 2s ease-in-out infinite reverse;
}

.arrow-slide-fade-right {
  animation: arrow-slide-fade 2s ease-in-out infinite;
}
</style>
