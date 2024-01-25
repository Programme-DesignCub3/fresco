<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
    <div
        v-if="themeStore.theme == 'black'"
        class="product-coffee bg-fr-yellow px-0 py-24 md:px-10">
        <div class="fr-container mx-auto w-full">
            <div
                class="grid grid-cols-2 gap-y-10 px-10 md:flex md:justify-between md:px-0">
                <slot name="black-product" />
            </div>
        </div>
    </div>
    <div v-else-if="themeStore.theme != undefined || themeStore.theme != null" class="h-[425px] w-full">
        <img
            src="/assets/images/cappuccino-banner.png"
            alt="Cappuccino Banner"
            class="h-full w-full object-cover" />
    </div>
</template>
