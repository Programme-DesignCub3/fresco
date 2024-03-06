<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { ref } from 'vue';

const themeStore = useThemeStore();
const blackHover = ref(false);
const cappuccinoHover = ref(false);

const enableCustomLayout = (theme) => themeStore.setTheme(theme);
</script>

<template>
    <header
        v-if="themeStore.theme == undefined || themeStore.theme == null"
        class="relative z-[9999999] flex h-[100dvh] flex-col">
        <div class="relative w-full h-full bg-center bg-no-repeat bg-cover bg-menu">
            <div class="p-8 space-y-6 text-center">
                <img
                    class="mx-auto w-[180px]"
                    src="/assets/images/logo.png"
                    alt="FresCo Logo" />
                <div class="inline-block px-8 -skew-x-12 bg-fr-red border-4 border-[#ce9638]">
                    <h1 class="text-white font-black text-[50px] text-shadow">TENTUKAN PILIHANMU!</h1>
                </div>
                    <div class="absolute left-[380px] -rotate-12 bottom-28">
                        <img
                            class="w-[180px]"
                            src="/assets/images/bubuk-hitam.png"
                            alt="Kopi Bubuk Hitam" />
                    </div>
                    <div class="absolute left-[600px] -rotate-12 bottom-28">
                        <img
                            class="w-[180px]"
                            src="/assets/images/krim-susu.png"
                            alt="Kopi Krim Susu" />
                    </div>
                    <div class="absolute left-[260px] -rotate-12 bottom-12">
                        <img
                            class="w-[180px]"
                            src="/assets/images/kopi-gula.png"
                            alt="Kopi + Gula" />
                    </div>
                    <div class="absolute left-[540px] -rotate-12 bottom-12">
                        <img
                            class="w-[180px]"
                            src="/assets/images/krim-moka.png"
                            alt="Kopi Krim Moka" />
                    </div>
                    <div class="absolute right-[320px] bottom-12 -rotate-12">
                        <img
                            class="w-[180px]"
                            src="/assets/images/cappuccino.png"
                            alt="Cappuccino" />
                    </div>
            </div>
        </div>

        <div class="relative flex w-full">
            <!-- === Black Coffee Theme === -->
            <button
                @mouseenter="blackHover = true"
                @mouseleave="blackHover = false"
                @click="
                    () => {
                        enableCustomLayout('black');
                        blackHover = false;
                    }
                "
                class="relative flex justify-end w-1/2 h-[200px] px-8 pt-4 pb-24 transition-all duration-700 ease-in-out outline-none gap-x-8 bg-fr-red hover:w-2/3">
                <div class="absolute flex items-center justify-center mr-24 gap-x-6">
                    <span
                        class="flex items-center justify-center rounded-full h-9 w-9 bg-fr-yellow">
                        <v-icon
                            class="arrow-slide-fade-left"
                            name="fa-chevron-left" />
                    </span>
                    <h4
                        class="flex flex-col text-[50px] text-white text-left z-[999] text-shadow font-black w-[300px] leading-[1] italic">
                        ENAKNYA SELALU ASIK
                    </h4>
                </div>
                <div class="w-[350px]"></div>
                <img
                    :class="blackHover && 'float-animate'"
                    class="absolute -top-24 w-[350px]"
                    src="/assets/images/menu-black.png"
                    alt="Black Coffee Theme" />
            </button>

            <!-- === Cappuccino Theme === -->
            <button
                @mouseenter="cappuccinoHover = true"
                @mouseleave="cappuccinoHover = false"
                @click="
                    () => {
                        enableCustomLayout('cappuccino');
                        cappuccinoHover = false;
                    }
                "
                class="flex w-1/2 h-[200px] px-8 pt-4 pb-24 transition-all duration-700 ease-in-out outline-none group gap-x-8 bg-fr-yellow hover:w-2/3">
                <img
                    :class="cappuccinoHover && 'float-animate'"
                    class="absolute -top-24 w-[350px]"
                    src="/assets/images/menu-cappuccino.png"
                    alt="Cappuccino Theme" />
                <div class="w-[350px]"></div>
                <div class="absolute flex items-center justify-center ml-24 gap-x-6">
                    <h4
                        class="flex flex-col text-[50px] text-white text-right z-[999] text-shadow font-black w-[300px] leading-[1] italic">
                        ENAKNYA MAKIN EPIK
                    </h4>
                    <span
                        class="flex items-center justify-center text-white rounded-full h-9 w-9 bg-fr-red">
                        <v-icon
                            class="arrow-slide-fade-right"
                            name="fa-chevron-right" />
                    </span>
                </div>
                <!-- <h4
                    class="flex flex-col text-right text-[40px] font-bold leading-10 text-fr-green">
                    <span>ENAKNYA</span>
                    <span>MAKIN EPIC</span>
                </h4> -->
            </button>
        </div>
    </header>
</template>

<style scoped>
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

@keyframes arrow-slide-fade {
    0% {
        opacity: 0;
        transform: translateX(-50%);
    }
    50% {
        opacity: 1;
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        transform: translateX(50%);
    }
}

.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}

.float-animate {
    animation: float-animation 3s ease-in-out infinite;
}

.arrow-slide-fade-left {
    animation: arrow-slide-fade 2s ease-in-out infinite reverse;
}

.arrow-slide-fade-right {
    animation: arrow-slide-fade 2s ease-in-out infinite;
}
</style>
