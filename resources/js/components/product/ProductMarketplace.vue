<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div
        class="px-4 py-10 transition-all duration-700 ease-in-out sm:px-0 md:py-20"
        :class="themeStore.theme == 'black' ? 'bg-fr-red' : 'bg-fr-green'">
        <div
            class="flex flex-col mx-auto fr-container gap-y-3 md:gap-y-5 lg:gap-y-8">
            <div
                class="text-shadow flex flex-col text-[40px] font-bold leading-none md:text-[50px] lg:text-[60px] xl:text-[80px]">
                <span
                    data-aos="fade-right"
                    data-aos-delay="200"
                    data-aos-duration="500"
                    class="text-white"
                    >YUK SEGERA</span
                >
                <span
                    data-aos="fade-right"
                    data-aos-delay="400"
                    data-aos-duration="500"
                    class="text-fr-yellow"
                    >DAPATKAN KOPINYA</span
                >
            </div>
            <div
                class="my-6 h-[4px] w-16 rounded-full transition-all duration-700 ease-in-out"
                :class="
                    themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-red'
                "></div>
            <div class="flex flex-wrap gap-5">
                <a :href="data.tokopedia_store" target="_blank">
                    <img
                        width="auto"
                        height="auto"
                        class="w-36 md:w-44 lg:w-52"
                        src="/assets/images/icons/tokopedia.png"
                        alt="Tokopedia" />
                </a>
                <a :href="data.shopee_store" target="_blank">
                    <img
                        width="auto"
                        height="auto"
                        class="w-36 md:w-44 lg:w-52"
                        src="/assets/images/icons/shopee.png"
                        alt="Shopee" />
                </a>
                <a :href="data.lazada_store" target="_blank">
                    <img
                        width="auto"
                        height="auto"
                        class="w-36 md:w-44 lg:w-52"
                        src="/assets/images/icons/lazada.png"
                        alt="Lazada" />
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
