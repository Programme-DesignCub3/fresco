<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div
        v-if="themeStore.theme != undefined || themeStore.theme != null"
        class="py-10 transition-all duration-700 ease-in-out video-coffee md:py-24"
        :class="themeStore.theme">
        <div class="w-full px-4 mx-auto fr-container md:px-0">
            <!-- Video -->
            <div class="w-full pb-10">
                <iframe
                    v-if="themeStore.theme == 'black'"
                    class="h-[360px] w-full lg:h-[660px]"
                    :src="`https://www.youtube.com/embed/${data.black_video_url}`"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <iframe
                    v-else
                    class="h-[360px] w-full lg:h-[660px]"
                    :src="`https://www.youtube.com/embed/${data.cappuccino_video_url}`"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div
                class="grid items-center justify-center w-full grid-cols-3 gap-x-3 md:gap-x-6">
                <!-- FresCo Logo -->
                <div class="grid items-center justify-center md:justify-end">
                    <img
                        width="auto"
                        height="auto"
                        data-aos="zoom-out"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="block w-[220px]"
                        src="/assets/images/logo.png"
                        alt="FresCo" />
                </div>
                <!-- Text (In Collaboration With) -->
                <div class="grid items-center justify-center text-center">
                    <p
                        data-aos="zoom-out"
                        data-aos-delay="350"
                        data-aos-duration="1000"
                        class="font-medium text-white max-sm:text-[14px]">
                        IN COLLABORATION WITH
                    </p>
                </div>
                <!-- Collaboration Logo -->
                <div
                    v-if="themeStore.theme == 'black'"
                    class="grid items-center justify-center md:justify-start">
                    <img
                        width="auto"
                        height="auto"
                        :src="data.black_video_collab"
                        alt="Collaboration"
                        data-aos="zoom-out"
                        data-aos-delay="500"
                        data-aos-duration="1000"
                        class="block w-[220px]">
                </div>
                <div
                    v-else
                    class="grid items-center justify-center md:justify-start">
                    <img
                        width="auto"
                        height="auto"
                        :src="data.cappuccino_video_collab"
                        alt="Collaboration"
                        data-aos="zoom-out"
                        data-aos-delay="500"
                        data-aos-duration="1000"
                        class="block w-[220px]">
                </div>
            </div>
            <!-- Description` -->
            <div
                class="pt-10 font-medium leading-8 text-center text-white md:text-lg lg:text-xl">
                <p
                    data-aos="fade-up"
                    data-aos-delay="500"
                    data-aos-offset="0"
                    v-if="themeStore.theme == 'black'"
                    v-html="data.black_video_desc">
                </p>
                <p
                    v-else
                    v-html="data.cappuccino_video_desc"
                    data-aos="fade-up"
                    data-aos-delay="500"
                    data-aos-offset="0">
                </p>
            </div>
        </div>
    </div>
</template>
