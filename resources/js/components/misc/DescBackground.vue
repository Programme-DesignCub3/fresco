<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { themes } = defineProps(['themes']);
const themeStore = useThemeStore();
const currentTheme = themeStore.getTheme();
</script>
<template>
    <section class="grid grid-cols-2" v-if="currentTheme == 'black' && themes == 'black'">
        <div>
            Black
        </div>
            <slot/>
    </section>
    <section class="grid grid-cols-2" v-else-if="currentTheme == 'cappuccino' && themes == 'cappuccino'">
        <div>
            Cappuccino
        </div>
            <slot/>
    </section>
</template>
