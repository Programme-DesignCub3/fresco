<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
    <div class="mt-20 bg-black bg-product bg-cover bg-bottom bg-no-repeat">
        <div
            class="fr-container mx-auto flex flex-col justify-between gap-y-14 py-20">
            <div id="product-title-anchor">
                <h1
                    class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
                    <span
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="1000"
                        class="text-white"
                        >BERAGAM PILIHAN RASA,</span
                    >
                    <span
                        data-aos="fade-right"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-fr-yellow"
                        >UNTUK MENEMANI AKTIVITASMU</span
                    >
                </h1>
                <div class="my-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
            </div>
            <div
                class="grid grid-cols-2 gap-y-10 px-10 text-white md:flex md:items-baseline md:justify-between md:px-0">
                <slot
                    v-if="themeStore.theme == 'black'"
                    name="black-product-list" />
                <slot v-else name="cappuccino-product-list" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
