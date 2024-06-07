<script setup>
import { useThemeStore } from '@/stores/theme-store.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
  <div
    v-if="themeStore.theme != undefined || themeStore.theme != null"
    class="video-coffee overflow-hidden py-10 transition-all duration-700 ease-in-out md:py-24"
    :class="themeStore.theme">
    <div class="fr-container mx-auto w-full px-4 md:px-0">
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
        :class="
          data.black_video_collab[0].type == 'text' ||
          data.cappuccino_video_collab[0].type == 'text'
            ? 'grid-flow-col'
            : 'grid-cols-3'
        "
        class="grid w-full items-center justify-center gap-x-3 md:gap-x-10">
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
            :class="
              themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
            "
            data-aos="zoom-out"
            data-aos-delay="350"
            data-aos-duration="1000"
            class="font-medium text-fr-black">
            IN COLLABORATION WITH
            {{
              themeStore.theme == 'black'
                ? data.black_video_collab[0].data.text
                : data.cappuccino_video_collab[0].data.text
            }}
          </p>
        </div>
        <!-- Collaboration Logo -->
        <div
          v-if="
            themeStore.theme == 'black' &&
            data.black_video_collab[0].type == 'image'
          "
          class="grid items-center justify-center md:justify-start">
          <img
            width="auto"
            height="auto"
            :src="data.black_video_collab"
            alt="Collaboration"
            data-aos="zoom-out"
            data-aos-delay="500"
            data-aos-duration="1000"
            class="block w-[220px]" />
        </div>
        <div
          v-if="
            themeStore.theme == 'cappuccino' &&
            data.cappuccino_video_collab[0].type == 'image'
          "
          class="grid items-center justify-center md:justify-start">
          <img
            width="auto"
            height="auto"
            :src="data.cappuccino_video_collab[0].data.image"
            alt="Collaboration"
            data-aos="zoom-out"
            data-aos-delay="500"
            data-aos-duration="1000"
            class="block w-[220px]" />
        </div>
      </div>
      <!-- Description` -->
      <div class="pt-10 text-center font-medium leading-8">
        <div
          class="home-video-body text-fr-black"
          data-aos="fade-up"
          data-aos-delay="500"
          data-aos-offset="0"
          v-if="themeStore.theme == 'black'"
          v-html="data.black_video_desc"></div>
        <div
          v-else
          class="home-video-body text-white"
          v-html="data.cappuccino_video_desc"
          data-aos="fade-up"
          data-aos-delay="500"
          data-aos-offset="0"></div>
      </div>
    </div>
  </div>
</template>
