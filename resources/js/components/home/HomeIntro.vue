<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import HomeIntroProduct from '@/components/home/HomeIntroProduct.vue';
import Navbar from '@/components/Navbar.vue';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <Transition name="right">
        <div v-if="themeStore.theme == 'black'">
            <div
                class="w-full space-y-20 bg-black-home bg-cover bg-center bg-no-repeat pt-40">
                <div class="fr-container mx-auto">
                    <video
                        autoplay
                        muted
                        loop
                        playsinline
                        id="black-coffee"
                        class="z-40">
                        <source
                            src="/assets/videos/black-coffee-video.mp4"
                            type="video/mp4" />
                        Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="shadow-up-black h-20 w-full"></div>
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
    </Transition>

    <Transition name="left">
        <div v-if="themeStore.theme == 'cappuccino'">
            <div class="w-full space-y-20 bg-fr-yellow pt-40">
                <img
                    class="absolute -left-24 z-20 scale-[1.25]"
                    src="/assets/images/bg-cappuccino-home.svg"
                    alt="Background Cappuccino Home" />
                <div class="fr-container mx-auto">
                    <video
                        autoplay
                        muted
                        loop
                        playsinline
                        id="cappuccino-coffee"
                        class="relative z-40">
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
    </Transition>
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
    background: rgb(35, 31, 32);
    background: linear-gradient(
        0deg,
        rgba(35, 31, 32, 1) 10%,
        rgba(35, 31, 32, 0.9) 20%,
        rgba(35, 31, 32, 0.8) 30%,
        rgba(35, 31, 32, 0.6) 55%,
        rgba(35, 31, 32, 0.3) 75%,
        rgba(35, 31, 32, 0) 95%
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
