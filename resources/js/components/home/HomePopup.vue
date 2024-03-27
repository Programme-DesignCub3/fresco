<script setup>
import { ref } from 'vue';

const { data } = defineProps(['data']);
const show = ref(true);
</script>

<template>
  <div
    @click="show = false"
    v-show="show"
    class="fixed bottom-0 left-0 right-0 top-0 z-[99999] flex h-full w-full items-center justify-center overflow-hidden bg-fr-black/80 px-4 md:px-12 lg:px-0">
    <div class="relative flex w-[1000px] flex-col">
      <div class="h-[300px]">
        <img
          class="h-[350px] w-[1000px] object-cover object-center"
          width="auto"
          height="auto"
          :src="data.image"
          :alt="data.title" />
      </div>
      <div class="bg-fr-yellow p-4 md:p-8 lg:p-10">
        <h2
          v-if="data.type == 'promotion'"
          class="text-[24px] font-bold text-fr-green">
          CONSUMER PROMO
        </h2>
        <h2
          v-if="data.type == 'article'"
          class="text-[24px] font-bold text-fr-green">
          NEW ARTICLE
        </h2>
        <div class="space-y-3">
          <h1
            class="text-[28px] font-bold leading-8 text-fr-red md:leading-10 lg:text-[32px]">
            {{ data.title }}
          </h1>
          <p>{{ data.excerpt }}</p>
          <a
            :href="'artikel/' + data.slug"
            class="mt-12 inline-block rounded-lg border border-fr-red bg-fr-red px-6 py-2.5 text-sm font-medium text-white transition-all duration-700 ease-in-out hover:border-fr-darker-red hover:bg-fr-darker-red group-hover:border group-hover:border-white md:px-8">
            LIHAT DETAIL
            <v-icon class="h-4 w-4 stroke-2 py-[2px]" name="fa-chevron-right" />
          </a>
        </div>
      </div>
      <button
        class="absolute right-0 top-0 flex h-8 w-8 items-center justify-center rounded-bl-lg border-b border-l border-white bg-fr-black md:-right-10 md:-top-10 md:rounded-full md:border"
        @click="show = false">
        <v-icon class="text-white" name="fa-times" />
      </button>
    </div>
  </div>
</template>
