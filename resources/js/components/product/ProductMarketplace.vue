<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div class="px-4 py-10 transition-all duration-700 ease-in-out sm:px-0 md:py-20"
        :class="themeStore.theme == 'black' ? 'bg-radial-red' : 'bg-radial-green'">
        <div class="fr-container mx-auto flex flex-col gap-y-5 lg:gap-y-8">
            <h2
                class="text-shadow flex flex-col items-center justify-center gap-x-3 text-center text-[40px] font-bold leading-none md:flex-row md:text-5xl lg:text-6xl">
                <span data-aos="fade-right" data-aos-delay="200" data-aos-duration="500" class="text-white">YUK
                    SEGERA</span>
                <span data-aos="fade-right" data-aos-delay="400" data-aos-duration="500" class="text-fr-yellow">DAPATKAN
                    KOPINYA</span>
            </h2>
            <div class="flex flex-wrap justify-center gap-5">
                <a v-for="(d, i) in data.marketplaces" data-aos="zoom-in" data-aos-duration="500"
                    :data-aos-delay="200 + i * 100" :href="d.marketplace_url" target="_blank">
                    <div
                        class="box-shadow flex h-[60px] w-[180px] items-center justify-center rounded-2xl bg-white transition-all duration-300 ease-in-out hover:scale-105 md:h-[80px] md:w-[220px]">
                        <img width="auto" height="auto" class="w-32 md:w-40" :src="d.marketplace_image"
                            :alt="d.marketplace_name" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
