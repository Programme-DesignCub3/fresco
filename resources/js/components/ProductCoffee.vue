<script setup>
import { ref } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
const datas = ref([
    {
        image: '/assets/images/bubuk-hitam.png',
        alt: 'Kopi Bubuk Hitam',
        width: 'w-[120px] sm:w-[150px] md:w-[120px] lg:w-[150px]',
        name: 'Kopi Bubuk Hitam',
        delay: 200,
    },
    {
        image: '/assets/images/krim-moka.png',
        alt: 'Kopi Krim Moka',
        width: 'w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]',
        name: 'Kopi Krim Moka',
        delay: 300,
    },
    {
        image: '/assets/images/krim-susu.png',
        alt: 'Kopi Krim Susu',
        width: 'w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]',
        name: 'Kopi Krim Susu',
        delay: 400,
    },
    {
        image: '/assets/images/kopi-gula.png',
        alt: 'Kopi + Gula',
        width: 'w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]',
        name: 'Kopi + Gula',
        delay: 500,
    },
]);
</script>

<template>
    <div
        v-if="themeStore.theme == 'black'"
        class="product-coffee bg-fr-yellow px-0 py-24 md:px-10">
        <div class="fr-container mx-auto w-full">
            <div
                class="grid grid-cols-2 gap-y-10 px-10 md:flex md:justify-between md:px-0">
                <div
                    v-for="data in datas"
                    class="flex flex-col items-center justify-center space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        data-aos="fade-up"
                        :data-aos-delay="data.delay"
                        :class="data.width"
                        :src="data.image"
                        :alt="data.alt" />
                    <div
                        data-aos="fade-down"
                        :data-aos-delay="data.delay"
                        class="text-center font-bold">
                        <p>Fresco</p>
                        <p>{{ data.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="h-[425px] w-full">
        <img
            src="/assets/images/cappuccino-banner.png"
            alt="Cappuccino Banner"
            class="h-full w-full object-cover" />
    </div>
</template>
