<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { title, image, desc } = defineProps(['title', 'image', 'desc']);
const themeStore = useThemeStore();
</script>

<template>
  <div class="group flex flex-col">
    <div
      class="transition-all duration-300 ease-in-out md:group-hover:scale-110">
      <!-- Image -->
      <div class="w-full object-cover">
        <img width="auto" height="auto" :src="image" alt="FresCo" />
      </div>

      <!-- Body -->
      <div
        class="space-y-3 p-6 transition-all duration-700 ease-in-out group-hover:bg-fr-red group-hover:transition-all group-hover:duration-300 group-hover:ease-in-out"
        :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'">
        <!-- Title -->
        <h3
          class="text-xl font-bold group-hover:text-white"
          :class="themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'">
          {{ title }}
        </h3>

        <!-- Excerpt -->
        <p
          class="font-medium group-hover:text-white"
          :class="themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'">
          {{ desc }}
        </p>

        <!-- Read More Button -->
        <div class="pt-3">
          <a
            href="artikel/ini-contoh-artikel"
            class="inline rounded-lg border border-fr-red bg-fr-red px-6 py-2 text-xs font-medium text-white transition-all duration-300 ease-in-out group-hover:border md:text-sm"
            :class="
              themeStore.theme == 'black'
                ? 'group-hover:border-fr-yellow group-hover:bg-fr-yellow group-hover:font-medium group-hover:text-fr-black'
                : 'group-hover:border-fr-green group-hover:bg-fr-green group-hover:font-medium group-hover:text-white'
            ">
            READ MORE >
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
