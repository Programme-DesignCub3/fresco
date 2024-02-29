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
        class="relative z-[99999] flex h-screen flex-col">
        <div class="h-full w-full bg-menu bg-cover bg-center bg-no-repeat">
            <div class="space-y-6 p-8 text-center">
                <img
                    class="mx-auto w-[180px]"
                    src="/assets/images/logo.png"
                    alt="FresCo Logo" />
                <h1 class="text-stroke text-[60px]">TENTUKAN PILIHANMU!</h1>
                <div class="flex items-end justify-center">
                    <div>
                        <img
                            class="w-[180px]"
                            src="/assets/images/kopi-gula.png"
                            alt="" />
                    </div>
                    <div>
                        <img
                            class="w-[180px]"
                            src="/assets/images/bubuk-hitam.png"
                            alt="" />
                    </div>
                    <div>
                        <img
                            class="w-[180px]"
                            src="/assets/images/cappuccino.png"
                            alt="" />
                    </div>
                    <div>
                        <img
                            class="w-[180px]"
                            src="/assets/images/krim-moka.png"
                            alt="" />
                    </div>
                    <div>
                        <img
                            class="w-[180px]"
                            src="/assets/images/krim-susu.png"
                            alt="" />
                    </div>
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
                class="flex w-1/2 justify-end gap-x-8 bg-fr-red px-8 pb-24 pt-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
                <span
                    class="flex h-9 w-9 items-center justify-center rounded-full bg-fr-yellow">
                    <v-icon
                        class="arrow-slide-fade-left"
                        name="fa-chevron-left" />
                </span>
                <h4
                    class="flex flex-col text-[40px] font-bold leading-10 text-white">
                    <span>JELAS</span>
                    <span>LEBIH</span>
                    <span>ENAK</span>
                </h4>
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
                class="group flex w-1/2 gap-x-8 bg-fr-yellow px-8 pb-24 pt-4 outline-none transition-all duration-700 ease-in-out hover:w-2/3">
                <img
                    :class="cappuccinoHover && 'float-animate'"
                    class="absolute -top-24 w-[350px]"
                    src="/assets/images/menu-cappuccino.png"
                    alt="Cappuccino Theme" />
                <div class="w-[350px]"></div>
                <h4
                    class="flex flex-col text-right text-[40px] font-bold leading-10 text-fr-green">
                    <span>ENAKIN</span>
                    <span>TIAP</span>
                    <span>MOMEN</span>
                </h4>
                <span
                    class="flex h-9 w-9 items-center justify-center rounded-full bg-fr-red text-white">
                    <v-icon
                        class="arrow-slide-fade-right"
                        name="fa-chevron-right" />
                </span>
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

.float-animate {
    animation: float-animation 3s ease-in-out infinite;
}

.arrow-slide-fade-left {
    animation: arrow-slide-fade 2s ease-in-out infinite reverse;
}

.arrow-slide-fade-right {
    animation: arrow-slide-fade 2s ease-in-out infinite;
}

.text-stroke {
    color: #fff;
    font-weight: 800;
    line-height: 1;
    overflow: hidden;
    position: relative;
    text-shadow:
        -4px -2px 0 #bb202f,
        -4px -1px 0 #bb202f,
        -4px 0 0 #bb202f,
        -4px 1px 0 #bb202f,
        -4px 2px 0 #bb202f,
        -3px -3px 0 #bb202f,
        -3px -2px 0 #bb202f,
        -3px -1px 0 #bb202f,
        -3px 0 0 #bb202f,
        -3px 1px 0 #bb202f,
        -3px 2px 0 #bb202f,
        -3px 3px 0 #bb202f,
        -2px -4px 0 #bb202f,
        -2px -3px 0 #bb202f,
        -2px -2px 0 #bb202f,
        -2px -1px 0 #bb202f,
        -2px 0 0 #bb202f,
        -2px 1px 0 #bb202f,
        -2px 2px 0 #bb202f,
        -2px 3px 0 #bb202f,
        -2px 4px 0 #bb202f,
        -1px -4px 0 #bb202f,
        -1px -3px 0 #bb202f,
        -1px -2px 0 #bb202f,
        -1px -1px 0 #bb202f,
        -1px 0 0 #bb202f,
        -1px 1px 0 #bb202f,
        -1px 2px 0 #bb202f,
        -1px 3px 0 #bb202f,
        -1px 4px 0 #bb202f,
        0 -4px 0 #bb202f,
        0 -3px 0 #bb202f,
        0 -2px 0 #bb202f,
        0 -1px 0 #bb202f,
        0 0 0 #bb202f,
        0 1px 0 #bb202f,
        0 2px 0 #bb202f,
        0 3px 0 #bb202f,
        0 4px 0 #bb202f,
        1px -4px 0 #bb202f,
        1px -3px 0 #bb202f,
        1px -2px 0 #bb202f,
        1px -1px 0 #bb202f,
        1px 0 0 #bb202f,
        1px 1px 0 #bb202f,
        1px 2px 0 #bb202f,
        1px 3px 0 #bb202f,
        1px 4px 0 #bb202f,
        2px -4px 0 #bb202f,
        2px -3px 0 #bb202f,
        2px -2px 0 #bb202f,
        2px -1px 0 #bb202f,
        2px 0 0 #bb202f,
        2px 1px 0 #bb202f,
        2px 2px 0 #bb202f,
        2px 3px 0 #bb202f,
        2px 4px 0 #bb202f,
        3px -3px 0 #bb202f,
        3px -2px 0 #bb202f,
        3px -1px 0 #bb202f,
        3px 0 0 #bb202f,
        3px 1px 0 #bb202f,
        3px 2px 0 #bb202f,
        3px 3px 0 #bb202f,
        4px -2px 0 #bb202f,
        4px -1px 0 #bb202f,
        4px 0 0 #bb202f,
        4px 1px 0 #bb202f,
        4px 2px 0 #bb202f;
    z-index: 0;
}

.text-outline-invers {
    color: #fff;
    font-weight: 800;
    line-height: 1;
    overflow: hidden;
    position: relative;
    text-shadow:
        -4px -2px 0 #bb202f,
        -4px -1px 0 #bb202f,
        -4px 0 0 #bb202f,
        -4px 1px 0 #bb202f,
        -4px 2px 0 #bb202f,
        -3px -3px 0 #bb202f,
        -3px -2px 0 #bb202f,
        -3px -1px 0 #bb202f,
        -3px 0 0 #bb202f,
        -3px 1px 0 #bb202f,
        -3px 2px 0 #bb202f,
        -3px 3px 0 #bb202f,
        -2px -4px 0 #bb202f,
        -2px -3px 0 #bb202f,
        -2px -2px 0 #bb202f,
        -2px -1px 0 #bb202f,
        -2px 0 0 #bb202f,
        -2px 1px 0 #bb202f,
        -2px 2px 0 #bb202f,
        -2px 3px 0 #bb202f,
        -2px 4px 0 #bb202f,
        -1px -4px 0 #bb202f,
        -1px -3px 0 #bb202f,
        -1px -2px 0 #bb202f,
        -1px -1px 0 #bb202f,
        -1px 0 0 #bb202f,
        -1px 1px 0 #bb202f,
        -1px 2px 0 #bb202f,
        -1px 3px 0 #bb202f,
        -1px 4px 0 #bb202f,
        0 -4px 0 #bb202f,
        0 -3px 0 #bb202f,
        0 -2px 0 #bb202f,
        0 -1px 0 #bb202f,
        0 0 0 #bb202f,
        0 1px 0 #bb202f,
        0 2px 0 #bb202f,
        0 3px 0 #bb202f,
        0 4px 0 #bb202f,
        1px -4px 0 #bb202f,
        1px -3px 0 #bb202f,
        1px -2px 0 #bb202f,
        1px -1px 0 #bb202f,
        1px 0 0 #bb202f,
        1px 1px 0 #bb202f,
        1px 2px 0 #bb202f,
        1px 3px 0 #bb202f,
        1px 4px 0 #bb202f,
        2px -4px 0 #bb202f,
        2px -3px 0 #bb202f,
        2px -2px 0 #bb202f,
        2px -1px 0 #bb202f,
        2px 0 0 #bb202f,
        2px 1px 0 #bb202f,
        2px 2px 0 #bb202f,
        2px 3px 0 #bb202f,
        2px 4px 0 #bb202f,
        3px -3px 0 #bb202f,
        3px -2px 0 #bb202f,
        3px -1px 0 #bb202f,
        3px 0 0 #bb202f,
        3px 1px 0 #bb202f,
        3px 2px 0 #bb202f,
        3px 3px 0 #bb202f,
        4px -2px 0 #bb202f,
        4px -1px 0 #bb202f,
        4px 0 0 #bb202f,
        4px 1px 0 #bb202f,
        4px 2px 0 #bb202f;
    z-index: 0;
}
</style>
