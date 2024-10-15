<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { Icon } from '@iconify/vue';
import { ref } from 'vue';

const { data } = defineProps(['data']);
const scrollBottom = ref(false);
const themeStore = useThemeStore();
const socials = ref([
    {
        name: 'facebook',
        icon: 'fa:facebook',
        alias: data.facebook_alias,
        link: data.facebook_link,
    },
    {
        name: 'instagram',
        icon: 'fa:instagram',
        alias: data.instagram_alias,
        link: data.instagram_link,
    },
    {
        name: 'twitter',
        icon: 'fa6-brands:x-twitter',
        alias: data.x_alias,
        link: data.x_link,
    },
    {
        name: 'tiktok',
        icon: 'fa6-brands:tiktok',
        alias: data.tiktok_alias,
        link: data.tiktok_link,
    },
    {
        name: 'youtube',
        icon: 'fa-brands:youtube',
        alias: data.youtube_alias,
        link: data.youtube_link,
    },
]);

window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight) {
        scrollBottom.value = true;
    } else {
        scrollBottom.value = false;
    }
});
</script>

<template>
    <div
        v-if="
            themeStore.getTheme().value != undefined ||
            themeStore.getTheme().value != null
        "
        class="social-media-list"
        :class="scrollBottom && '-right-10'">
        <!-- Social Media -->
        <a
            v-for="social in socials"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="social.link ? social.link : '#'"
            target="_blank">
            <Icon
                class="h-9 w-9 pt-2"
                :class="[
                    themeStore.theme == 'black'
                        ? 'text-fr-black'
                        : 'text-white',
                    social.name == 'facebook' && 'h-9 w-9 pt-2',
                    social.name == 'instagram' && 'h-9 w-9 p-1.5',
                    social.name == 'twitter' && 'h-9 w-9 p-1.5',
                    social.name == 'tiktok' && 'h-9 w-9 p-1.5',
                    social.name == 'youtube' && 'h-9 w-9 p-1.5',
                ]"
                :icon="social.icon" />
        </a>
    </div>
</template>
