<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { ref, onMounted, nextTick, watch } from 'vue';
import { useThemeStore } from '@/stores/user-theme.js';
import { Navigation } from 'swiper/modules';
import 'swiper/css';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const product = ref();
const swiper = ref();

const swiperOption = {
    slidesPerView: 4,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-slider-next',
        prevEl: '.fr-slider-prev',
    },
};

const initSwiper = () => {
    if (swiper.value) {
        swiper.value.destroy();
    }
    swiper.value = new Swiper(product.value, swiperOption);
};

onMounted(() => {
    nextTick();

    initSwiper();
});

watch(theme, () => {
    initSwiper();
});
</script>

<template>
    <Transition :name="themeStore.theme == 'black' ? 'right' : 'left'">
        <div
            class="product-coffee relative px-0 py-16 md:px-10"
            :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-red'">
            <div
                class="fr-slider-prev absolute left-[12.5%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full"
                :class="
                    themeStore.theme == 'black'
                        ? 'bg-fr-red text-white'
                        : 'bg-fr-yellow text-black'
                ">
                <v-icon name="fa-chevron-left" />
            </div>
            <div
                class="fr-slider-next absolute right-[12.5%] top-1/2 z-[999] flex h-9 w-9 cursor-pointer items-center justify-center rounded-full"
                :class="
                    themeStore.theme == 'black'
                        ? 'bg-fr-red text-white'
                        : 'bg-fr-yellow text-black'
                ">
                <v-icon name="fa-chevron-right" />
            </div>
            <div class="fr-container mx-auto w-full space-y-16 text-center">
                <div class="swiper" ref="product">
                    <div class="swiper-wrapper items-end py-6">
                        <slot
                            v-if="themeStore.theme == 'black'"
                            name="black-product-coffee" />
                        <slot v-else name="cappuccino-product-coffee" />
                    </div>
                </div>
                <a
                    href="#"
                    class="inline-block rounded-lg border px-8 py-2.5 text-sm font-medium text-white group-hover:border group-hover:border-white"
                    :class="
                        themeStore.theme == 'black'
                            ? 'border-fr-red bg-fr-red'
                            : 'border-fr-green bg-fr-green'
                    ">
                    BELI SEKARANG >
                </a>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
.right-enter-active {
    animation: wipe-in-right 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}

.right-leave-from {
    opacity: 0;
}
.left-enter-active {
    animation: wipe-in-left 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}
.left-leave-from {
    opacity: 0;
}

@keyframes wipe-in-right {
    from {
        clip-path: inset(0 100% 0 0);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}

@keyframes wipe-in-left {
    from {
        clip-path: inset(0 0 0 100%);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}
</style>
