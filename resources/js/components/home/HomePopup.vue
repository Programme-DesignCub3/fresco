<script setup>
import { ref } from 'vue';

const { data } = defineProps(['data']);
const show = ref(true);
</script>

<template>
    <div @click="show = false" v-show="show" class="fixed z-[99999] top-0 left-0 right-0 bottom-0 w-full h-full bg-fr-black/80 flex justify-center items-center overflow-hidden px-4 md:px-12 lg:px-0">
        <div class="relative flex flex-col w-[1000px]">
            <div class="h-[300px]">
                <img class="w-[1000px] h-[350px] object-cover object-center" width="auto" height="auto" :src="data.image" :alt="data.title">
            </div>
            <div class="p-4 bg-fr-yellow md:p-8 lg:p-10">
                <h2 v-if="data.type == 'promotion'" class="text-fr-green text-[24px] font-bold">CONSUMER PROMO</h2>
                <h2 v-if="data.type == 'article'" class="text-fr-green text-[24px] font-bold">NEW ARTICLE</h2>
                <div class="space-y-3">
                    <h1 class="text-fr-red text-[28px] font-bold leading-8 md:leading-10 lg:text-[32px]">{{ data.title }}</h1>
                    <p>{{ data.excerpt }}</p>
                    <a
                        :href="'artikel/' + data.slug"
                        class="inline-block px-6 py-2.5 mt-12 text-sm font-medium text-white transition-all duration-700 ease-in-out border rounded-lg border-fr-red bg-fr-red hover:border-fr-darker-red hover:bg-fr-darker-red md:px-8 group-hover:border group-hover:border-white">
                        LIHAT DETAIL
                        <v-icon
                            class="h-4 w-4 stroke-2 py-[2px]"
                            name="fa-chevron-right" />
                    </a>
                </div>
            </div>
            <button class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 border-b border-l border-white rounded-bl-lg bg-fr-black md:rounded-full md:-top-10 md:-right-10 md:border" @click="show = false">
                <v-icon
                    class="text-white"
                    name="fa-times" />
            </button>
        </div>
    </div>
</template>
