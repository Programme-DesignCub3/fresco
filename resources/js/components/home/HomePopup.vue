<script setup>
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';

const { data } = defineProps(['data']);
const show = ref(true);

const closePopup = () => {
    show.value = false;
    document.body.style = 'overflow-y: auto';
};

onMounted(() => {
    document.body.style = 'overflow: hidden';
});
</script>

<template>
    <div
        v-show="show"
        @click.self="closePopup"
        class="fixed bottom-0 left-0 right-0 top-0 z-[99999999] flex h-full w-full items-center justify-center overflow-hidden bg-fr-black/80 px-4 md:px-12 lg:px-0">
        <div class="relative flex w-full flex-col md:w-2/3 lg:w-[550px]">
            <img
                class="object-cover object-center"
                width="auto"
                height="auto"
                :src="data.image"
                :alt="data.title" />
            <div
                class="bg-linear-red space-y-1 rounded-xl px-6 py-4 md:px-8 md:py-6">
                <h2 class="home-popup-title">CONSUMER PROMO</h2>
                <h1
                    class="text-center text-3xl font-bold tracking-wider text-white md:text-5xl lg:text-7xl">
                    {{ data.title }}
                </h1>
                <div
                    class="text-center text-xl font-semibold tracking-wider text-fr-yellow"
                    v-html="data.description"></div>
            </div>
            <a
                :href="data.links[0].link"
                target="_blank"
                class="button green absolute -bottom-14 left-1/2 -translate-x-1/2">
                BELI SEKARANG
            </a>
            <button
                class="absolute -bottom-28 left-1/2 flex h-8 w-8 -translate-x-1/2 items-center justify-center rounded-full border border-white bg-fr-black md:-right-10 md:-top-10 md:left-auto md:translate-x-0"
                @click="closePopup">
                <Icon class="text-white" icon="fa-solid:times" />
            </button>
        </div>
    </div>
</template>
