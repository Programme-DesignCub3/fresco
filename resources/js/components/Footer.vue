<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { ref } from 'vue';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const socials = ref([
  {
    name: 'facebook',
    icon: 'fa-facebook-f',
    alias: data.facebook_alias,
    link: data.facebook_link,
  },
  {
    name: 'instagram',
    icon: 'fa-instagram',
    alias: data.instagram_alias,
    link: data.instagram_link,
  },
  {
    name: 'twitter',
    icon: 'fa-twitter',
    alias: data.x_alias,
    link: data.x_link,
  },
  {
    name: 'tiktok',
    icon: 'fa-tiktok',
    alias: data.tiktok_alias,
    link: data.tiktok_link,
  },
  {
    name: 'youtube',
    icon: 'fa-youtube',
    alias: data.youtube_alias,
    link: data.youtube_link,
  },
]);
</script>

<template>
  <footer
    v-if="themeStore.theme != undefined || themeStore.theme != null"
    class="pb-24 pt-14 transition-all duration-700 ease-in-out"
    :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-radial-red'">
    <div class="flex flex-col items-center justify-center gap-y-6 px-4">
      <div class="footer-list">
        <!-- Social Media -->
        <a
          v-for="social in socials"
          class="footer-item"
          :href="social.link ? social.link : '#'"
          target="_blank">
          <v-icon
            class="text-fr-black"
            :class="[
              social.name == 'facebook' && 'h-9 w-9 pt-2',
              social.name == 'instagram' && 'h-9 w-9 p-1',
              social.name == 'twitter' && 'h-9 w-9 p-1.5',
              social.name == 'tiktok' && 'h-9 w-9 p-1.5',
              social.name == 'youtube' && 'h-9 w-9 p-1.5',
            ]"
            :name="social.icon" />
        </a>
      </div>
      <p class="text-center font-medium text-white">
        PT. SANTOS JAYA ABADI (KAPAL API GROUP). ALL RIGHTS RESERVED
      </p>
    </div>
  </footer>
</template>
