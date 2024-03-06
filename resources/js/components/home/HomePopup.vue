<script setup>
import { ref } from 'vue';

const { data } = defineProps(['data']);
const show = ref(true);
</script>

<template>
    <div v-show="show" class="fixed flex items-center justify-center top-0 w-full h-full overflow-y-hidden bg-fr-black/60 z-[99999] px-4 sm:px-0">
        <a :href="`artikel/${data.slug}`">
            <img class="aspect-square w-[400px] object-cover object-center" :src="data.image" :alt="data.title">
        </a>
        <button @click="show = false" class="absolute -translate-x-1/2 translate-y-64 text-fr-yellow bottom-1/2 left-1/2 min-[500px]:translate-y-80">
            <v-icon class="w-8 h-8" name="fa-times-circle" />
        </button>
    </div>
</template>
