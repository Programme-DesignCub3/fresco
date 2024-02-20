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
    <!-- Black Coffee Theme -->
    <div
        v-if="themeStore.theme == 'black'"
        class="bg-black bg-article bg-cover bg-top bg-no-repeat py-20">
        <div class="fr-container mx-auto space-y-12">
            <!-- Toolbar -->
            <div class="flex justify-between">
                <div class="space-y-6">
                    <h1
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-shadow text-[50px] font-bold leading-none text-white">
                        ARTIKEL
                    </h1>
                    <div
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                </div>
                <div class="relative">
                    <input
                        class="w-[300px] rounded-lg border-2 border-white bg-transparent py-2 pl-10 pr-2 text-white outline-none placeholder:text-white"
                        type="text"
                        placeholder="Search Keywords...." />
                    <button class="absolute left-3 translate-y-2.5 text-white">
                        <v-icon name="fa-search" />
                    </button>
                </div>
            </div>

            <!-- Card -->
            <div class="grid grid-cols-3 gap-6">
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
                class="flex justify-center gap-x-3 text-xl font-medium text-white">
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

    <!-- Cappuccino Theme -->
    <div v-else class="bg-fr-yellow bg-cover bg-top bg-no-repeat py-20">
        <div class="fr-container mx-auto space-y-12">
            <!-- Toolbar -->
            <div class="flex justify-between">
                <div class="space-y-6">
                    <h1
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-shadow text-[50px] font-bold leading-none text-fr-green">
                        ARTIKEL
                    </h1>
                    <div
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                </div>
                <div class="relative">
                    <input
                        class="w-[300px] rounded-lg border-2 border-white bg-white py-2 pl-10 pr-2 text-black outline-none placeholder:text-black"
                        type="text"
                        placeholder="Search Keywords...." />
                    <button class="absolute left-3 translate-y-2.5">
                        <v-icon name="fa-search" />
                    </button>
                </div>
            </div>

            <!-- Card -->
            <div class="grid grid-cols-3 gap-6">
                <template v-for="n in 3">
                    <ArticleCard
                        v-for="article in articles"
                        :title="article.title"
                        :image="article.image"
                        :desc="article.desc" />
                </template>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center gap-x-3 text-xl font-medium">
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
