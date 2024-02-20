<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { header } = defineProps(['header']);
const themeStore = useThemeStore();
</script>

<template>
    <!-- Article Header -->
    <div
        v-if="header == 'article'"
        class="mt-20 bg-header-article bg-cover bg-bottom bg-no-repeat"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="fr-container mx-auto px-8 py-20 md:px-0 md:py-32"
            id="article-title-anchor">
            <h1
                class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >INSPIRASI UNTUK SEMANGAT LAGI</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >SAMBIL DITEMANI KOPI FRESCO</span
                >
            </h1>
        </div>
    </div>

    <!-- Article Detail Header -->
    <div
        v-if="header == 'article-detail'"
        class="mt-20 bg-black bg-header-article bg-cover bg-bottom bg-no-repeat">
        <div
            class="fr-container mx-auto px-8 py-20 md:px-0 md:py-32"
            id="article-title-anchor">
            <h1
                class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
                <span
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-white"
                    >INSPIRASI UNTUK SEMANGAT LAGI</span
                >
                <span
                    data-aos="fade-down"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="text-fr-yellow"
                    >SAMBIL DITEMANI KOPI FRESCO</span
                >
            </h1>
        </div>
    </div>

    <!-- Activity Header -->
    <div
        v-if="header == 'activity'"
        class="mt-20 bg-black bg-header-activity bg-cover bg-bottom bg-no-repeat">
        <div
            class="fr-container mx-auto px-8 py-20 md:px-0 md:py-32"
            id="article-title-anchor">
            <h1
                class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
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
        class="mt-20 bg-header-contact bg-cover bg-bottom bg-no-repeat"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="fr-container mx-auto px-8 py-20 md:px-0 md:py-32"
            id="article-title-anchor">
            <h1
                class="text-shadow flex flex-col bg-[url('https://fresco-assets.s3.ap-southeast-1.amazonaws.com/assets/images/bg-header-contact.png')] text-[60px] font-bold leading-none md:text-[80px]">
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
