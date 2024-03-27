<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { ref } from 'vue';

const themeStore = useThemeStore();
const blackHover = ref(false);
const cappuccinoHover = ref(false);

const enableCustomLayout = (theme) => themeStore.setTheme(theme);
</script>

<template>
  <header
    v-if="themeStore.theme == undefined || themeStore.theme == null"
    class="relative z-[999999] flex h-[100dvh] flex-col">
    <div class="relative h-full w-full bg-menu bg-cover bg-center bg-no-repeat">
      <div class="space-y-6 p-8 text-center">
        <img
          class="mx-auto w-[180px]"
          src="/assets/images/logo.png"
          alt="FresCo Logo" />
        <div
          class="inline-block -skew-x-12 border-4 border-[#ce9638] bg-fr-red px-8">
          <h1 class="text-shadow text-[50px] font-black text-white">
            TENTUKAN PILIHANMU!
          </h1>
        </div>
        <div class="flex items-end justify-center">
          <div>
            <img
              class="w-[180px]"
              src="/assets/images/bubuk-hitam.png"
              alt="Kopi Bubuk Hitam" />
          </div>
          <div>
            <img
              class="w-[180px]"
              src="/assets/images/kopi-gula.png"
              alt="Kopi + Gula" />
          </div>
          <div>
            <img
              class="w-[180px]"
              src="/assets/images/krim-moka.png"
              alt="Kopi Krim Moka" />
          </div>
          <div>
            <img
              class="w-[180px]"
              src="/assets/images/krim-susu.png"
              alt="Kopi Krim Susu" />
          </div>
          <div>
            <img
              class="w-[180px]"
              src="/assets/images/cappuccino.png"
              alt="Cappuccino" />
          </div>
        </div>
      </div>
    </div>

    <div class="relative flex w-full">
      <!-- === Black Coffee Theme === -->
      <button
        @mouseenter="blackHover = true"
        @mouseleave="blackHover = false"
        @click="
          () => {
            enableCustomLayout('black');
            blackHover = false;
          }
        "
        class="relative flex h-[200px] w-1/2 justify-end gap-x-8 bg-fr-red px-8 pb-24 pt-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
        <div class="absolute mr-24 flex items-center justify-center gap-x-6">
          <span
            class="flex h-9 w-9 items-center justify-center rounded-full bg-fr-yellow">
            <v-icon class="arrow-slide-fade-left" name="fa-chevron-left" />
          </span>
          <h4
            class="text-shadow z-[999] flex w-[300px] flex-col text-left text-[50px] font-black italic leading-[1] text-white">
            ENAKNYA SELALU ASIK
          </h4>
        </div>
        <div class="w-[350px]"></div>
        <img
          :class="blackHover && 'float-animate'"
          class="absolute -top-24 w-[350px]"
          src="/assets/images/menu-black.png"
          alt="Black Coffee Theme" />
      </button>

      <!-- === Cappuccino Theme === -->
      <button
        @mouseenter="cappuccinoHover = true"
        @mouseleave="cappuccinoHover = false"
        @click="
          () => {
            enableCustomLayout('cappuccino');
            cappuccinoHover = false;
          }
        "
        class="group flex h-[200px] w-1/2 gap-x-8 bg-fr-yellow px-8 pb-24 pt-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
        <img
          :class="cappuccinoHover && 'float-animate'"
          class="absolute -top-24 w-[350px]"
          src="/assets/images/menu-cappuccino.png"
          alt="Cappuccino Theme" />
        <div class="w-[350px]"></div>
        <div class="absolute ml-24 flex items-center justify-center gap-x-6">
          <h4
            class="text-shadow z-[999] flex w-[300px] flex-col text-right text-[50px] font-black italic leading-[1] text-white">
            ENAKNYA MAKIN EPIK
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
  text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
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
