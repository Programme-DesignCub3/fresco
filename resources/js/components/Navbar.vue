<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const url = window.location;
const themeStore = useThemeStore();
const enableCustomLayout = (theme) => {
    themeStore.setTheme(theme);
};
</script>

<template>
    <Transition>
        <header class="navigation" :class="themeStore.theme">
            <div class="mx-auto max-w-7xl">
                <ul class="flex items-baseline justify-center space-x-20">
                    <li class="nav-item" :class="url.pathname == '/' && 'nav-active'">
                        <a href="/">BERANDA</a>
                    </li>
                    <li class="nav-item" :class="url.pathname == '/produk' && 'nav-active'">
                        <a href="produk">PRODUK</a>
                    </li>
                    <li class="nav-item">
                        <a href="">ARTIKEL</a>
                    </li>
                    <li class="relative z-50 h-[60px] w-[200px]">
                        <a><img src="/assets/images/logo.png" class="absolute top-[20%]" /></a>
                    </li>
                    <li class="nav-item">
                        <a href="">AKTIVITAS</a>
                    </li>
                    <li class="nav-item">
                        <a href="">GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a href="">HUBUNGI</a>
                    </li>
                </ul>
            </div>
            <Transition name="slide" mode="out-in">
                <div
                    class="absolute right-10 top-2/4 z-50 cursor-pointer overflow-hidden rounded-full border-2 border-white shadow-lg transition-transform hover:translate-x-2 hover:scale-105"
                    v-if="themeStore.theme && themeStore.theme == 'black'">
                    <div
                        class="flex h-24 w-24 items-center justify-center bg-[#fdc64a]"
                        @click="enableCustomLayout('cappucino')">
                        <img src="/assets/images/theme-changer-cappuccino.png" class="max-w-full" />
                    </div>
                </div>
            </Transition>
            <Transition name="slide" mode="out-in">
                <div
                    class="absolute right-10 top-2/4 z-50 cursor-pointer overflow-hidden rounded-full border-2 border-white shadow-lg transition-transform hover:translate-x-2 hover:scale-105"
                    v-if="themeStore.theme && themeStore.theme == 'cappucino'">
                    <div
                        class="flex h-24 w-24 items-center justify-center bg-[#3b2314]"
                        @click="enableCustomLayout('black')">
                        <img
                            src="/assets/images/theme-changer-black-coffee.png"
                            class="max-w-full" />
                    </div>
                </div>
            </Transition>
        </header>
    </Transition>
</template>

<style scoped>
@keyframes slide-in-top {
    0% {
        -webkit-transform: translateY(-1000px);
        transform: translateY(-1000px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        opacity: 1;
    }
}

.slide-leave-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse;
}

.slide-enter-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}
</style>
