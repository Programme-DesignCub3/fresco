<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { title, image, desc } = defineProps(['title', 'image', 'desc']);
const themeStore = useThemeStore();
</script>

<template>
    <div class="group flex flex-col">
        <div
            class="transition-all duration-300 ease-in-out group-hover:scale-110">
            <div class="w-full object-cover">
                <img :src="image" alt="FresCo" />
            </div>
            <div
                class="space-y-3 p-6 group-hover:bg-fr-red"
                :class="
                    themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
                ">
                <h1
                    class="text-xl font-bold group-hover:text-white"
                    :class="
                        themeStore.theme == 'black'
                            ? 'text-black'
                            : 'text-white'
                    ">
                    {{ title }}
                </h1>
                <p
                    class="font-medium group-hover:text-white"
                    :class="
                        themeStore.theme == 'black'
                            ? 'text-black'
                            : 'text-white'
                    ">
                    {{ desc }}
                </p>
                <a
                    href="artikel/ini-contoh-artikel"
                    class="inline-block rounded-lg border border-fr-red bg-fr-red px-6 py-2 text-sm font-medium text-white transition-all duration-300 ease-in-out hover:bg-white hover:text-fr-red group-hover:border group-hover:border-white">
                    READ MORE >
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
