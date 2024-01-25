<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div v-if="themeStore.getTheme().value != undefined || themeStore.getTheme().value != null" class="fixed right-0 top-0 z-40 mr-4 mt-40 flex flex-col space-y-2">
        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.facebook_link ? data.facebook_link : '#'">
            <img
                class="h-9 w-9 px-[10px] pt-2"
                src="/assets/images/icons/facebook.png"
                alt="Facebook" />
        </a>
        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.instagram_link ? data.instagram_link : '#'">
            <img
                class="h-9 w-9 p-2"
                src="/assets/images/icons/instagram.png"
                alt="Instagram" />
        </a>
        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.x_link ? data.x_link : '#'">
            <img
                class="h-9 w-9 p-2"
                src="/assets/images/icons/Twitter.png"
                alt="Twitter" />
        </a>
        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.tiktok_link ? data.tiktok_link : '#'">
            <img
                class="h-9 w-9 px-[10px] py-2"
                src="/assets/images/icons/tiktok.png"
                alt="Tiktok" />
        </a>
        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.youtube_link ? data.youtube_link : '#'">
            <img
                class="h-9 w-9 px-2 py-[11px]"
                src="/assets/images/icons/youtube.png"
                alt="Youtube" />
        </a>
    </div>
    <div class="fixed bottom-4 right-4 z-40">
        <a :href="data.whatsapp_link ? data.whatsapp_link : '#'">
            <img
                class="h-16 w-16"
                src="/assets/images/icons/whatsapp.png"
                alt="WhatsApp" />
        </a>
    </div>
</template>
