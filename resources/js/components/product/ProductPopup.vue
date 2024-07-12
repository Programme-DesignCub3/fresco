<script setup>
import { useProductStore } from '@/stores/product-store';
import { useThemeStore } from '@/stores/theme-store';
import { storeToRefs } from 'pinia';

const themeStore = useThemeStore();
const productStore = useProductStore();
const { popup } = storeToRefs(productStore);

const closePopup = () => {
    productStore.setPopUp(null);
    document.body.style = 'overflow-y: auto';
};
</script>

<template>
    <div
        v-if="popup"
        @click.self="closePopup"
        class="fixed bottom-0 left-0 right-0 top-0 z-[99999999] flex h-full w-full items-center justify-center overflow-hidden bg-fr-black/80 px-4 md:px-12 lg:px-0">
        <div
            :class="
                themeStore.theme == 'black'
                    ? 'bg-radial-red'
                    : 'bg-radial-green'
            "
            class="relative grid max-w-screen-md grid-flow-row gap-5 rounded-xl p-5 text-white lg:max-w-screen-lg lg:grid-cols-12 lg:gap-2">
            <div
                class="row-span-3 flex items-center justify-center gap-3 lg:col-span-4 2xl:col-span-4">
                <img
                    class="w-1/3 lg:w-5/6"
                    :src="popup.image"
                    :alt="popup.product" />
            </div>
            <div class="row-span-3 text-white lg:col-span-8 2xl:col-span-8">
                <div class="space-y-3">
                    <h3
                        class="text-[32px] font-semibold leading-none md:text-[40px] lg:text-[60px]">
                        Fresco {{ popup.product }}
                    </h3>
                    <div
                        class="h-[170px] overflow-y-scroll leading-7 md:h-auto md:overflow-auto"
                        v-html="popup.content"></div>
                </div>
                <a
                    :href="popup.links[0].link"
                    target="_blank"
                    class="button yellow group-hover:yellow dark:group-hover:green dark:green mt-3 flex items-center">
                    <span class="flex items-center">
                        <v-icon
                            class="mr-2 h-4 w-4 stroke-2"
                            name="fa-shopping-cart" />
                        BELI SEKARANG
                    </span>
                </a>
            </div>
            <button
                class="absolute right-2 top-2 flex h-8 w-8 items-center justify-center rounded-full border border-white bg-fr-black xl:-right-10 xl:-top-10 xl:left-auto xl:translate-x-0"
                @click="closePopup">
                <v-icon class="text-white" name="fa-times" />
            </button>
        </div>
    </div>
</template>
