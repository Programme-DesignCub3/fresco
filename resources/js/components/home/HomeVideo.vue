<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <!-- Home Video -->
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" class="home-video" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-4 md:px-0">
            <div class="w-full pb-10">
                <iframe v-if="themeStore.theme == 'black'" class="h-[360px] w-full lg:h-[660px]"
                    :src="`https://www.youtube.com/embed/${data.black_video_url}`" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <iframe v-else class="h-[360px] w-full lg:h-[660px]"
                    :src="`https://www.youtube.com/embed/${data.cappuccino_video_url}`" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div :class="data.black_video_collab[0].type == 'text' ||
                    data.cappuccino_video_collab[0].type == 'text'
                    ? 'grid-flow-col'
                    : 'grid-cols-3'
                " class="grid w-full items-center justify-center gap-x-3 md:gap-x-10">
                <div class="grid items-center justify-center text-center">
                    <p :class="themeStore.theme == 'black'
                            ? 'text-white'
                            : 'text-white'
                        " data-aos-offset="0" data-aos="zoom-out" data-aos-duration="1000"
                        class="text-lg font-semibold md:text-xl">
                        Fresco in collaboration with
                        {{
                            themeStore.theme == 'black'
                                ? data.black_video_collab[0].data.text
                                : data.cappuccino_video_collab[0].data.text
                        }}
                    </p>
                </div>
                <div v-if="
                    themeStore.theme == 'black' &&
                    data.black_video_collab[0].type == 'image'
                " class="grid items-center justify-center md:justify-start">
                    <img width="auto" height="auto" :src="data.black_video_collab" alt="Collaboration"
                        data-aos="zoom-out" data-aos-delay="500" data-aos-duration="1000" class="block w-[220px]" />
                </div>
                <div v-if="
                    themeStore.theme == 'cappuccino' &&
                    data.cappuccino_video_collab[0].type == 'image'
                " class="grid items-center justify-center md:justify-start">
                    <img width="auto" height="auto" :src="data.cappuccino_video_collab[0].data.image"
                        alt="Collaboration" data-aos="zoom-out" data-aos-delay="500" data-aos-duration="1000"
                        class="block w-[220px]" />
                </div>
            </div>
            <div class="pt-3 text-center leading-8">
                <div v-if="themeStore.theme == 'black'" class="home-video-body text-white" data-aos="fade-up"
                    data-aos-delay="500" data-aos-offset="0" v-html="data.black_video_desc"></div>
                <div v-else class="home-video-body text-white" v-html="data.cappuccino_video_desc" data-aos="fade-up"
                    data-aos-delay="500" data-aos-offset="0"></div>
            </div>
        </div>
    </div>
</template>
