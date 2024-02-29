<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import HomeIntroProduct from '@/components/home/HomeIntroProduct.vue';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <!-- === Black Theme === -->
    <div v-if="themeStore.theme == 'black'">
        <div
            class="w-full pt-20 space-y-2 bg-black bg-center bg-no-repeat bg-cover bg-black-home md:space-y-12 md:pt-48 lg:pt-40 2xl:pt-44">
            <div class="mx-auto fr-container">
                <video
                    autoplay
                    muted
                    loop
                    playsinline
                    id="black-coffee"
                    class="z-40 px-4 pt-6 sm:px-0 md:pt-0"
                    poster="/assets/images/placeholder-video.webp">
                    <source
                        src="/assets/videos/black-coffee-video.mp4"
                        type="video/mp4" />
                    Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="w-full h-20 shadow-up-black"></div>
        </div>
        <HomeIntroProduct :data="data">
            <template #black>
                <slot name="black-slide-image" />
            </template>
            <template #cappuccino>
                <slot name="cappuccino-slide-image" />
            </template>
        </HomeIntroProduct>
    </div>

    <!-- === Cappuccino Theme === -->
    <div v-if="themeStore.theme == 'cappuccino'">
        <div
            class="relative w-full py-20 space-y-12 overflow-hidden bg-fr-yellow pt-14 md:space-y-20 md:pt-28 lg:pt-20 xl:py-32 2xl:py-24">
            <img
                class="absolute -left-24 top-36 scale-[1.75] sm:scale-[1.5] md:-left-20 md:scale-[1.25] md:top-40 lg:-left-24 lg:scale-[1.2] lg:top-28 xl:top-40 xl:-left-32 2xl:scale-[1.15] 2xl:-left-[120px] 2xl:rotate-[3deg] 2xl:top-20 min-[1950px]:scale-100 min-[1950px]:w-[1800px] min-[1950px]:top-24 min-[1950px]:left-1/2 min-[1950px]:-translate-x-1/2"
                src="/assets/images/bg-cappuccino-home.svg"
                alt="Background Cappuccino Home" />
            <div class="mx-auto fr-container">
                <video
                    autoplay
                    muted
                    loop
                    playsinline
                    id="cappuccino-coffee"
                    class="relative z-40 px-4 sm:px-0"
                    poster="/assets/images/placeholder-video.webp">
                    <source
                        src="/assets/videos/cappuccino-video.mp4"
                        type="video/mp4" />
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>
        <HomeIntroProduct :data="data">
            <template #black>
                <slot name="black-slide-image" />
            </template>
            <template #cappuccino>
                <slot name="cappuccino-slide-image" />
            </template>
        </HomeIntroProduct>
    </div>
</template>

<style scoped>
.right-enter-active {
    animation: wipe-in-right 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}

.right-leave-from {
    opacity: 0;
}
.left-enter-active {
    animation: wipe-in-left 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}
.left-leave-from {
    opacity: 0;
}

.shadow-up-black {
    background: rgb(5, 5, 5);
    background: linear-gradient(
        0deg,
        rgba(5, 5, 5, 1) 10%,
        rgba(5, 5, 5, 0.9) 20%,
        rgba(5, 5, 5, 0.8) 30%,
        rgba(5, 5, 5, 0.6) 55%,
        rgba(5, 5, 5, 0.3) 75%,
        rgba(5, 5, 5, 0) 95%
    );
}

.shadow-up-cappuccino {
    background: rgb(253, 198, 75);
    background: linear-gradient(
        0deg,
        rgba(253, 198, 75, 1) 10%,
        rgba(253, 198, 75, 0.9) 20%,
        rgba(253, 198, 75, 0.8) 30%,
        rgba(253, 198, 75, 0.6) 55%,
        rgba(253, 198, 75, 0.3) 75%,
        rgba(253, 198, 75, 0) 95%
    );
}

@keyframes wipe-in-right {
    from {
        clip-path: inset(0 100% 0 0);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}

@keyframes wipe-in-left {
    from {
        clip-path: inset(0 0 0 100%);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}
</style>
