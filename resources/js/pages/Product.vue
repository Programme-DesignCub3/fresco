<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore().getTheme();
</script>

<template>
    <section>
        <Navbar></Navbar>
        <p>Ini halaman produk bjirr</p>
    </section>
</template>
