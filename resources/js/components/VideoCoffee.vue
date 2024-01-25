<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" class="video-coffee py-24" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-10 md:px-0">
            <div class="w-full pb-16">
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
                class="grid w-full grid-cols-1 grid-rows-3 items-center justify-center md:grid-cols-3 md:grid-rows-1">
                <div class="grid items-center justify-center md:justify-end">
                    <img
                        data-aos="zoom-out"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="block w-[220px]"
                        src="/assets/images/logo.png"
                        alt="Fresco" />
                </div>
                <div class="grid items-center justify-center">
                    <p
                        data-aos="zoom-out"
                        data-aos-delay="350"
                        data-aos-duration="1000"
                        class="font-medium text-white">
                        IN COLLABORATION WITH
                    </p>
                </div>
                <div
                    v-if="themeStore.theme == 'black'"
                    class="grid items-center justify-center md:justify-start">
                    <slot name="black-video-collab" />
                </div>
                <div
                    v-else
                    class="grid items-center justify-center md:justify-start">
                    <slot name="cappuccino-video-collab" />
                </div>
            </div>
            <div class="pt-16">
                <p
                    data-aos="fade-up"
                    data-aos-delay="500"
                    data-aos-offset="0"
                    v-if="themeStore.theme == 'black'"
                    class="text-center font-medium leading-8 text-white">
                    {{ data.black_video_desc }}
                </p>
                <p
                    v-else
                    class="text-center font-medium leading-8 text-white"
                    data-aos="fade-up"
                    data-aos-delay="500"
                    data-aos-offset="0">
                    {{ data.cappuccino_video_desc }}
                </p>
            </div>
        </div>
    </div>
</template>
