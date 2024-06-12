<script setup>
import { Swiper } from 'swiper';
import { onMounted, ref, watch } from 'vue';
import { useThemeStore } from '@/stores/theme-store.js';
import { storeToRefs } from 'pinia';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const menu = ref();
const swiper = ref();

const swiperOption = {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: -300,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: -300,
    },
  },
};

const enableCustomLayout = (theme) => themeStore.setTheme(theme);

const initSwiper = () => {
  swiper.value = new Swiper(menu.value, swiperOption);
};

onMounted(() => {
  if (!swiper.value) {
    initSwiper();
  }
});

watch(theme, () => {
  swiper.value = null;
  setTimeout(() => {
    initSwiper();
  }, 10);
});
</script>

<template>
  <header
    v-if="themeStore.theme == undefined || themeStore.theme == null"
    class="relative z-[999999999] flex h-dvh flex-col">
    <div
      class="bg-radial-darker-red relative flex h-full max-h-[75%] w-full items-center justify-center overflow-hidden py-8">
      <div
        class="absolute bottom-[27%] h-12 w-full bg-gradient-to-t from-[#470610] to-transparent"></div>
      <div
        class="absolute bottom-[20%] h-12 w-full bg-gradient-to-b from-[#470610] to-transparent"></div>
      <div class="flex flex-col items-center justify-center gap-5 md:gap-6">
        <img
          class="mx-auto w-[140px] md:w-[160px] xl:w-[180px]"
          src="/assets/images/logo.png"
          alt="FresCo Logo" />
        <h1
          class="text-shadow px-3 text-center text-4xl font-black tracking-wide text-white md:px-0 md:text-5xl xl:text-6xl">
          TEMUKAN RASA PILIHANMU!
        </h1>
        <!-- (Desktop) -->
        <div class="relative hidden items-end justify-center lg:flex">
          <img
            v-for="d in data"
            width="auto"
            height="auto"
            class="w-[160px] xl:w-[180px]"
            :src="d.image"
            :alt="d.product" />
          <div class="product-reflect">
            <img
              v-for="d in data"
              width="auto"
              height="auto"
              class="w-[160px] xl:w-[180px]"
              :src="d.image"
              :alt="d.product" />
          </div>
        </div>
        <!-- (Mobile) -->
        <div class="block w-full lg:hidden">
          <div class="swiper" ref="menu" :style="{ width: '100vw' }">
            <div class="swiper-wrapper items-end">
              <template v-for="n in 2">
                <div v-for="(d, i) in data" class="swiper-slide" :key="i">
                  <div class="relative flex w-full items-end justify-center">
                    <img
                      width="auto"
                      height="auto"
                      :src="d.image"
                      :alt="d.product"
                      class="w-[160px] md:w-[150px] lg:w-[180px]" />
                    <div class="product-reflect">
                      <img
                        width="auto"
                        height="auto"
                        :src="d.image"
                        :alt="d.product"
                        class="w-[160px] md:w-[150px] lg:w-[180px]" />
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
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
        class="flex w-1/2 items-start justify-end gap-x-12 bg-fr-red p-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3 sm:items-center xl:p-8">
        <div
          class="flex flex-col items-end justify-center gap-3 md:flex-row md:items-center md:gap-6">
          <span
            class="flex h-9 w-9 rotate-180 items-center justify-center rounded-full bg-fr-yellow text-fr-black">
            <v-icon class="arrow-slide-fade-right" name="fa-chevron-right" />
          </span>
          <h4
            class="text-shadow z-[999] flex w-full flex-col text-right text-3xl font-black leading-none text-white sm:text-4xl md:w-[200px] md:text-left md:text-5xl lg:mr-[220px] xl:mr-[250px]">
            CARI TAHU ENAKNYA
          </h4>
        </div>
        <img
          class="absolute top-1/2 hidden w-[220px] -translate-y-2/3 lg:block xl:w-[250px]"
          src="/assets/images/menu-black.png"
          alt="Black Coffee Theme" />
      </button>

      <!-- Cappuccino Theme -->
      <button
        @click="
          () => {
            enableCustomLayout('cappuccino');
            cappuccinoHover = false;
          }
        "
        class="flex w-1/2 items-start justify-start gap-x-12 bg-fr-yellow p-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3 sm:items-center xl:p-8">
        <img
          class="absolute top-1/2 hidden w-[110px] -translate-y-2/3 lg:block xl:w-[140px]"
          src="/assets/images/menu-cappuccino.png"
          alt="Cappuccino Theme" />
        <div
          class="flex flex-col-reverse items-start justify-center gap-3 md:flex-row md:items-center md:gap-6">
          <h4
            class="text-shadow z-[999] flex w-full flex-col text-left text-3xl font-black leading-none text-white sm:text-4xl md:w-[270px] md:text-right md:text-5xl lg:ml-[150px] xl:ml-[180px]">
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
