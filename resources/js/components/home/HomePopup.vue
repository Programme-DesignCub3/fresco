<script setup>
import { onMounted, ref } from 'vue';

const { data } = defineProps(['data']);
const show = ref(true);

const closePopup = () => {
  show.value = false;
  document.body.style = 'overflow: auto';
};

onMounted(() => {
  document.body.style = 'overflow: hidden';
});
</script>

<template>
  <div
    v-show="show"
    class="fixed bottom-0 left-0 right-0 top-0 z-[99999999] flex h-full w-full items-center justify-center overflow-hidden bg-fr-black/80 px-4 md:px-12 lg:px-0">
    <div class="relative flex w-[800px] flex-col">
      <img
        class="object-cover object-center"
        width="auto"
        height="auto"
        :src="data.image"
        :alt="data.title" />
      <div class="bg-linear-red space-y-1 rounded-xl px-6 py-4 md:px-8 md:py-6">
        <h2
          class="relative text-center text-lg font-bold tracking-[0.2em] text-white before:absolute before:left-0 before:top-1/2 before:h-[2px] before:w-1/3 before:-translate-y-1/2 before:rounded-full before:bg-white before:content-[''] after:absolute after:right-0 after:top-1/2 after:h-[2px] after:w-1/3 after:-translate-y-1/2 after:rounded-full after:bg-white after:content-['']">
          CONSUMER PROMO
        </h2>
        <h1
          class="text-center text-3xl font-bold tracking-wider text-white md:text-5xl lg:text-7xl">
          {{ data.title }}
        </h1>
        <div
          class="text-center text-xl font-semibold tracking-wider text-fr-yellow"
          v-html="data.description"></div>
      </div>
      <a
        :href="data.link"
        class="button green absolute -bottom-14 left-1/2 -translate-x-1/2">
        BELI SEKARANG
      </a>
      <button
        class="absolute left-1/2 -translate-x-1/2 -bottom-28 flex h-8 w-8 items-center justify-center border-white bg-fr-black md:translate-x-0 md:left-auto md:-right-10 md:-top-10 rounded-full border"
        @click="closePopup">
        <v-icon class="text-white" name="fa-times" />
      </button>
    </div>
  </div>
</template>
