<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, watch } from 'vue';
import { Pagination } from 'swiper/modules';
import { useThemeStore } from '@/stores/theme-store.js';
import 'swiper/css';
import 'swiper/css/pagination';

const { activity, article } = defineProps(['activity', 'article']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const feed = ref();
const swiper = ref();

const swiperOption = {
  autoHeight: true,
  centeredSlides: true,
  slidesPerView: 1,
  loop: true,
  modules: [Pagination],
  autoplay: {
    delay: 5000,
  },
  pagination: {
    clickable: true,
    el: '.fr-activity-pagination',
  },
};

const initSwiper = () => {
  swiper.value = new Swiper(feed.value, swiperOption);
};

onMounted(() => {
  if (!swiper.value) {
    initSwiper();
  }
});

watch(theme, () => {
  swiper.value = null;
  setTimeout(() => {
    initSwiper();
  }, 10);
});
</script>

<template>
  <div
    v-if="themeStore.theme != undefined || themeStore.theme != null"
    class="post-feed transition-all duration-700 ease-in-out"
    :class="themeStore.theme">
    <div class="fr-container mx-auto w-full px-4 py-10 md:px-0 md:py-24">
      <div class="flex flex-col gap-y-10 lg:flex-row lg:gap-x-10 lg:gap-y-0">
        <!-- Activities -->
        <div
          class="w-full transition-all duration-700 ease-in-out lg:w-1/2 xl:w-2/5">
          <!-- Title -->
          <h2
            class="text-4xl font-bold leading-none"
            :class="
              themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
            ">
            Activities
          </h2>

          <!-- Divider -->
          <div
            class="my-6 h-[4px] w-16 rounded-full"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-yellow'
            "></div>

          <!-- Black Activity Slider -->
          <div v-if="themeStore.theme == 'black'" class="swiper" ref="feed">
            <div class="swiper-wrapper">
              <div v-for="(d, i) in activity" :key="i" class="swiper-slide">
                <a :href="d.link" target="_blank">
                  <img
                    width="auto"
                    height="auto"
                    v-if="d.image_portrait"
                    :src="d.image_portrait"
                    class="mx-auto"
                    alt="FresCo Activity" />
                  <img
                    v-else
                    width="auto"
                    height="auto"
                    :src="d.image"
                    class="mx-auto"
                    alt="FresCo Activity" />
                </a>
              </div>
            </div>
          </div>

          <!-- Cappuccino Activity Slider -->
          <div
            v-if="themeStore.theme == 'cappuccino'"
            class="swiper"
            ref="feed">
            <div class="swiper-wrapper">
              <div v-for="(d, i) in activity" :key="i" class="swiper-slide">
                <a :href="d.link" target="_blank">
                  <img
                    width="auto"
                    height="auto"
                    v-if="d.image_portrait"
                    :src="d.image_portrait"
                    class="mx-auto"
                    alt="FresCo Activity" />
                  <img
                    v-else
                    width="auto"
                    height="auto"
                    :src="d.image"
                    class="mx-auto"
                    alt="FresCo Activity" />
                </a>
              </div>
            </div>
          </div>

          <!-- Pagination -->
          <div class="fr-activity-pagination" :class="themeStore.theme"></div>
        </div>

        <!-- === Articles === -->
        <div class="flex w-full flex-col lg:w-1/2 xl:w-3/5">
          <!-- Title -->
          <div>
            <h2
              class="text-4xl font-bold leading-none"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              ">
              Articles
            </h2>
            <div
              class="my-6 h-[4px] w-16 rounded-full"
              :class="
                themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-yellow'
              "></div>
          </div>
          <!-- List Articles -->
          <div class="flex flex-col gap-6">
            <div v-for="(d, i) in article" :key="i">
              <div
                class="box-shadow flex flex-col space-x-0 space-y-6 p-5 transition-all duration-700 ease-in-out sm:flex-row sm:space-x-6 sm:space-y-0 lg:flex-col lg:space-x-0 lg:space-y-6 xl:flex-row xl:space-x-6 xl:space-y-0"
                :class="
                  themeStore.theme == 'black'
                    ? 'bg-diagonal-yellow'
                    : 'bg-fr-darker-red'
                ">
                <!-- Image -->
                <div class="flex-grow">
                  <img
                    width="auto"
                    height="auto"
                    class="aspect-square w-full object-cover object-center sm:w-[220px] lg:w-full xl:w-[220px]"
                    :src="d.image"
                    :alt="d.title" />
                </div>

                <!-- Content -->
                <div class="flex w-full flex-col gap-y-5 lg:w-full xl:w-3/5">
                  <div class="space-y-1">
                    <!-- Title -->
                    <h3
                      class="text-xl font-semibold"
                      :class="
                        themeStore.theme == 'black'
                          ? 'text-fr-red'
                          : 'text-fr-yellow'
                      ">
                      {{ d.title }}
                    </h3>
                    <!-- Excerpt -->
                    <p
                      v-html="d.excerpt"
                      class="font-medium"
                      :class="
                        themeStore.theme == 'black'
                          ? 'text-fr-black'
                          : 'text-white'
                      "></p>
                  </div>
                  <!-- Read More Button -->
                  <div>
                    <a
                      :href="'artikel/' + d.slug"
                      class="transition-all duration-700 ease-in-out"
                      :class="
                        themeStore.theme == 'black'
                          ? 'button red'
                          : 'button green'
                      ">
                      READ MORE
                      <v-icon
                        class="h-4 w-4 stroke-2 py-[2px]"
                        name="fa-chevron-right" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- See All Button -->
          <div class="mt-6 text-end">
            <a
              href="/artikel"
              class="transition-all duration-700 ease-in-out"
              :class="
                themeStore.theme == 'black' ? 'button red' : 'button green'
              ">
              SEE ALL ARTICLES
              <v-icon
                class="h-4 w-4 stroke-2 py-[2px]"
                name="fa-chevron-right" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.box-shadow {
  box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.3);
}
</style>
