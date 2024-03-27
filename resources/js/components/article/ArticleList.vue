<script setup>
import { ref } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import ArticleCard from '@/components/article/ArticleCard.vue';

const themeStore = useThemeStore();
const articles = ref([
  {
    title: 'INSPIRASI UNTUK SEMANGAT LAGI, SAMBIL DITEMANI KOPI FRESCO',
    image: '/assets/images/article-1.png',
    desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan.',
  },
  {
    title: 'INSPIRASI UNTUK SEMANGAT LAGI, SAMBIL DITEMANI KOPI FRESCO',
    image: '/assets/images/article-2.png',
    desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan.',
  },
  {
    title: 'INSPIRASI UNTUK SEMANGAT LAGI, SAMBIL DITEMANI KOPI FRESCO',
    image: '/assets/images/article-3.png',
    desc: 'Nikmati Sensasi Kopi Terbaru bersama Kopi FresCo: Dengan biji segar dan aroma yang memikat, setiap tegukan adalah perjalanan rasa yang menggairahkan.',
  },
]);
</script>

<template>
  <div
    class="bg-cover bg-top bg-no-repeat px-4 py-10 sm:px-0 md:py-20"
    :class="
      themeStore.theme == 'black' ? 'bg-black bg-article' : 'bg-fr-yellow'
    ">
    <div class="fr-container mx-auto space-y-8 md:space-y-12">
      <!-- Toolbar -->
      <div
        class="flex flex-col justify-between gap-y-8 md:flex-row md:gap-y-12">
        <div class="space-y-6">
          <h2
            v-if="themeStore.theme == 'black'"
            data-aos="flip-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-offset="0"
            class="text-shadow text-[30px] font-bold leading-none text-white sm:text-[40px] md:text-[50px]">
            ARTIKEL
          </h2>
          <h2
            v-else
            data-aos="flip-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-offset="0"
            class="text-shadow text-[30px] font-bold leading-none text-fr-green sm:text-[40px] md:text-[50px]">
            ARTIKEL
          </h2>
          <div
            v-if="themeStore.theme == 'black'"
            data-aos="fade-right"
            data-aos-delay="200"
            data-aos-duration="500"
            data-aos-offset="0"
            class="h-[4px] w-16 rounded-full bg-fr-red"></div>
          <div
            v-else
            data-aos="fade-right"
            data-aos-delay="200"
            data-aos-duration="500"
            data-aos-offset="0"
            class="h-[4px] w-16 rounded-full bg-fr-red"></div>
        </div>
        <div class="relative">
          <input
            class="w-full rounded-lg border-2 border-white bg-transparent py-2 pl-10 pr-2 outline-none md:w-[300px]"
            :class="
              themeStore.theme == 'black'
                ? 'text-white placeholder:text-white'
                : 'bg-white text-black placeholder:text-black'
            "
            type="text"
            placeholder="Search Keywords...." />
          <button
            class="absolute left-3 translate-y-2.5"
            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
            <v-icon name="fa-search" />
          </button>
        </div>
      </div>

      <!-- Card -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <template v-for="n in 3">
          <ArticleCard
            v-for="article in articles"
            :title="article.title"
            :image="article.image"
            :desc="article.desc" />
        </template>
      </div>

      <!-- Pagination -->
      <div
        class="flex justify-center gap-x-3 text-xl font-medium"
        :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
        <div class="cursor-pointer">&lt;&lt;</div>
        <div class="cursor-pointer">&lt;</div>
        <div class="space-x-3">
          <a
            class="inline-block h-6 w-6 rounded-full bg-fr-red text-center text-white"
            href="#"
            >1</a
          >
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
        </div>
        <div class="cursor-pointer">></div>
        <div class="cursor-pointer">>></div>
      </div>
    </div>
  </div>
</template>
