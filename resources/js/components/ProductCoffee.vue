<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
    <div v-if="themeStore.theme == 'black'" class="product-coffee bg-fr-yellow px-0 py-24 md:px-10">
        <div class="fr-container mx-auto w-full">
            <div class="grid grid-cols-2 gap-y-10 px-10 md:flex md:justify-between md:px-0">
                <div
                    class="flex flex-col items-center justify-center space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        data-aos="fade-up"
                        data-aos-delay="100"
                        class="w-[120px] sm:w-[150px] md:w-[120px] lg:w-[150px]"
                        src="/assets/images/bubuk-hitam.png"
                        alt="Kopi Bubuk Hitam" />
                    <div data-aos="fade-down" data-aos-delay="200" class="text-center font-bold">
                        <p>Fresco</p>
                        <p>Kopi Bubuk Hitam</p>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center justify-center space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        data-aos="fade-up"
                        data-aos-delay="100"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                        src="/assets/images/krim-moka.png"
                        alt="Kopi Krim Moka" />
                    <div data-aos="fade-down" data-aos-delay="200" class="text-center font-bold">
                        <p>Fresco</p>
                        <p>Kopi Krim Moka</p>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center justify-center space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        data-aos="fade-up"
                        data-aos-delay="100"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                        src="/assets/images/krim-susu.png"
                        alt="Kopi Krim Susu" />
                    <div data-aos="fade-down" data-aos-delay="200" class="text-center font-bold">
                        <p>Fresco</p>
                        <p>Kopi Krim Susu</p>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center justify-center space-y-4 md:transition md:hover:scale-[1.1]">
                    <img
                        data-aos="fade-up"
                        data-aos-delay="100"
                        class="w-[150px] sm:w-[180px] md:w-[150px] lg:w-[180px]"
                        src="/assets/images/kopi-gula.png"
                        alt="Kopi + Gula" />
                    <div data-aos="fade-down" data-aos-delay="200" class="text-center font-bold">
                        <p>Fresco</p>
                        <p>Kopi + Gula</p>
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
