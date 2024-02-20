<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, ref } from 'vue';

const url = window.location;
const themeStore = useThemeStore();
const scroll = ref();
const { type } = defineProps(['type']);

const enableCustomLayout = (theme) => themeStore.setTheme(theme);

window.addEventListener('scroll', () => {
    scroll.value = window.scrollY;
});
</script>

<template>
    <header
        v-if="themeStore.theme != undefined || themeStore.theme != null"
        class="navigation fixed z-[9999] transition-all duration-700 ease-in-out"
        id="navigation-sticky"
        :class="[
            themeStore.theme,
            url.pathname == '/'
                ? scroll > 20
                    ? themeStore.theme == 'black'
                        ? 'bg-black'
                        : 'bg-fr-yellow'
                    : 'bg-transparent'
                : themeStore.theme == 'black'
                  ? 'bg-black'
                  : 'bg-fr-yellow',
        ]">
        <div class="fr-container relative mx-auto flex justify-end">
            <div class="absolute -bottom-12 left-0">
                <a
                    :href="url.pathname != '/' ? '/' : '#'"
                    @click="url.pathname == '/' && themeStore.setTheme(null)">
                    <img src="/assets/images/logo.png" alt="FresCo Logo" />
                </a>
            </div>
            <div>
                <ul class="flex items-start gap-4 pb-2">
                    <li
                        class="nav-item"
                        :class="url.pathname == '/' && 'nav-active'">
                        <a class="block h-[40px]" href="/">BERANDA</a>
                    </li>
                    <li
                        class="nav-item"
                        :class="url.pathname == '/produk' && 'nav-active'">
                        <a class="block" href="/produk">ENAKNYA NGOPI FRESCO</a>
                    </li>
                    <li
                        class="nav-item"
                        :class="
                            url.pathname == '/artikel' ||
                            url.pathname.startsWith('/artikel/')
                                ? 'nav-active'
                                : ''
                        ">
                        <a class="block" href="/artikel">ENAKIN TIAP MOMEN</a>
                    </li>
                    <li
                        class="nav-item"
                        :class="url.pathname == '/aktivitas' && 'nav-active'">
                        <a class="block" href="/aktivitas"
                            >SERBA-SERBI FRESCO</a
                        >
                    </li>
                    <li
                        class="nav-item"
                        :class="url.pathname == '/hubungi' && 'nav-active'">
                        <a class="block" href="/hubungi">HUBUNGI FRESCO</a>
                    </li>
                </ul>
            </div>
        </div>
        <Transition name="slide" mode="out-in">
            <div
                class="float-animate absolute right-24 top-2/4 z-50 cursor-pointer overflow-hidden rounded-full border-[5px] border-white shadow-lg transition-transform hover:scale-105"
                v-if="themeStore.theme && themeStore.theme == 'black'">
                <div
                    class="flex h-24 w-24 items-center justify-center bg-[#fdc64a] p-2"
                    @click="enableCustomLayout('cappuccino')">
                    <img
                        src="/assets/images/cappuccino-toggler.png"
                        class="max-w-full" />
                </div>
            </div>
        </Transition>
        <Transition name="slide" mode="out-in">
            <div
                class="float-animate absolute right-24 top-2/4 z-50 cursor-pointer overflow-hidden rounded-full border-[5px] border-white shadow-lg transition-transform hover:scale-105"
                v-if="themeStore.theme && themeStore.theme == 'cappuccino'">
                <div
                    class="flex h-24 w-24 items-center justify-center bg-[#3b2314] p-3"
                    @click="enableCustomLayout('black')">
                    <img
                        src="/assets/images/black-toggler.png"
                        class="max-w-full" />
                </div>
            </div>
        </Transition>
    </header>
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

@keyframes float-animation {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
    100% {
        transform: translateY(0);
    }
}

.float-animate {
    animation: float-animation 3s ease-in-out infinite;
}

.float-animate:hover {
    animation-play-state: paused;
}

.slide-leave-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse;
    display: none;
}

.slide-enter-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}
</style>
