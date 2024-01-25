<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();

const enableCustomLayout = (theme) => themeStore.setTheme(theme);
</script>

<template>
    <header v-if="themeStore.theme == undefined || themeStore.theme == null" class="relative">
        <img
            src="/assets/images/logo.png"
            alt="Fresco Logo"
            width="200"
            class="fixed left-1/2 right-1/2 top-2 z-[3] w-[200px] -translate-x-1/2 transform" />
        <div class="relative flex h-[100vh] w-full flex-nowrap overflow-hidden">
            <div
                class="relative h-full w-1/2 transform cursor-pointer bg-[#eb222a] transition-all duration-700 ease-in-out hover:w-2/3">
                <div
                    class="relative h-[80vh] w-full cursor-pointer overflow-hidden bg-cover bg-center bg-no-repeat"
                    @click="enableCustomLayout('black')">
                    <slot name="black-menu-background" />
                </div>

                <div class="absolute inset-x-0 bottom-0">
                    <slot name="black-coffee" />
                </div>
            </div>
            <div
                class="relative h-full w-1/2 transform cursor-pointer bg-[#fdc64b] transition-all duration-700 ease-in-out hover:w-2/3">
                <div
                    class="relative h-[80vh] w-full cursor-pointer overflow-hidden bg-cover bg-center bg-no-repeat"
                    @click="enableCustomLayout('cappuccino')">
                    <slot name="cappuccino-menu-background" />
                </div>

                <div class="absolute inset-x-0 bottom-0">
                    <slot name="cappuccino-coffee" />
                </div>
            </div>
        </div>
        <img
            src="/assets/images/pilih-mana.png"
            alt="Fresco Pilih Mana"
            width="400"
            class="fixed bottom-5 left-1/2 right-1/2 z-[3] w-[200px] -translate-x-1/2 transform" />
    </header>
</template>
