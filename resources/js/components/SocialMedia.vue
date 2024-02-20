<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div
        v-if="
            themeStore.getTheme().value != undefined ||
            themeStore.getTheme().value != null
        "
        class="fixed right-0 top-0 z-40 mr-4 mt-40 flex flex-col space-y-2 transition-all duration-700 ease-in-out">
        <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.facebook_link ? data.facebook_link : '#'">
            <v-icon
                class="h-9 w-9 pt-2"
                :class="
                    themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
                "
                name="fa-facebook-f" />
        </a>
        <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.instagram_link ? data.instagram_link : '#'">
            <v-icon
                class="h-9 w-9 p-1"
                :class="
                    themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
                "
                name="fa-instagram" />
        </a>
        <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.x_link ? data.x_link : '#'">
            <v-icon
                class="h-9 w-9 p-1.5"
                :class="
                    themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
                "
                name="fa-twitter" />
        </a>
        <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.tiktok_link ? data.tiktok_link : '#'">
            <v-icon
                class="h-9 w-9 p-1.5"
                :class="
                    themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
                "
                name="fa-tiktok" />
        </a>
        <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.youtube_link ? data.youtube_link : '#'">
            <v-icon
                class="h-9 w-9 p-1.5"
                :class="
                    themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
                "
                name="fa-youtube" />
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

<style scoped>
.box-shadow {
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
}
</style>
