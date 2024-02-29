<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { header } = defineProps(['header']);
const themeStore = useThemeStore();
</script>

<template>
    <!-- Article Header -->
    <div
        v-if="header == 'article'"
        class="mt-0 bg-header-article bg-cover bg-bottom bg-no-repeat lg:mt-20"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="fr-container mx-auto px-4 py-10 md:mt-[164px] md:px-0 md:py-12 lg:mt-0 lg:py-32">
            <h1
                class="text-shadow flex flex-col pt-14 text-[40px] font-bold leading-none sm:text-[50px] md:pt-0 lg:text-[60px] xl:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >ENAKIN TIAP MOMEN</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >ENAKNYA NGOPI FRESCO</span
                >
            </h1>
        </div>
    </div>

    <!-- Article Detail Header -->
    <div
        v-if="header == 'article-detail'"
        class="mt-0 bg-black bg-header-article bg-cover bg-bottom bg-no-repeat lg:mt-20">
        <div
            class="fr-container mx-auto px-4 py-10 md:mt-[164px] md:px-0 md:py-12 lg:mt-0 lg:py-32">
            <h1
                class="text-shadow flex flex-col pt-14 text-[40px] font-bold leading-none sm:text-[50px] md:pt-0 lg:text-[60px] xl:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >ENAKIN TIAP MOMEN</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >ENAKNYA NGOPI FRESCO</span
                >
            </h1>
        </div>
    </div>

    <!-- Activity Header -->
    <div
        v-if="header == 'activity'"
        class="mt-0 bg-black bg-header-activity bg-cover bg-bottom bg-no-repeat lg:mt-20">
        <div
            class="fr-container mx-auto px-4 py-10 md:mt-[164px] md:px-0 md:py-12 lg:mt-0 lg:py-32">
            <h1
                class="text-shadow flex flex-col pt-14 text-[40px] font-bold leading-none sm:text-[50px] md:pt-0 lg:text-[60px] xl:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >IKUTAN BERAGAM AKTIVITAS</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >MENANGKAN HADIAH MENARIK</span
                >
            </h1>
        </div>
    </div>

    <!-- Contact Header -->
    <div
        v-if="header == 'contact'"
        class="mt-0 bg-header-contact bg-cover bg-bottom bg-no-repeat transition-all duration-700 ease-in-out lg:mt-20"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="fr-container mx-auto px-4 py-10 md:mt-[164px] md:px-0 md:py-12 lg:mt-0 lg:py-32">
            <h1
                class="text-shadow flex flex-col pt-14 text-[40px] font-bold leading-none sm:text-[50px] md:pt-0 lg:text-[60px] xl:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >KENALI KAMI</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >LEBIH DEKAT</span
                >
            </h1>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
