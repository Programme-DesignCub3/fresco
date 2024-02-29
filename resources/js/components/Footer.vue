<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <footer
        v-if="themeStore.theme != undefined || themeStore.theme != null"
        class="border-t-[5px] border-white bg-fr-black">
        <div
            class="fr-container mx-auto flex flex-col justify-between gap-12 px-4 py-10 md:flex-row md:px-0 md:py-20">
            <!-- Logo Image -->
            <div class="w-full md:w-2/5">
                <img
                    class="w-[160px] max-md:mx-auto sm:w-[200px]"
                    src="/assets/images/logo.png"
                    alt="FresCo Logo" />
            </div>

            <div class="w-full space-y-10 md:w-3/5">
                <!-- Marketplace -->
                <div class="flex flex-wrap gap-4">
                    <a href="#" target="_blank">
                        <img
                            class="w-32 md:w-36"
                            src="/assets/images/icons/tokopedia.png"
                            alt="Tokopedia" />
                    </a>
                    <a href="#" target="_blank">
                        <img
                            class="w-32 md:w-36"
                            src="/assets/images/icons/shopee.png"
                            alt="Shopee" />
                    </a>
                    <a href="#" target="_blank">
                        <img
                            class="w-32 md:w-36"
                            src="/assets/images/icons/kapal-api-store.png"
                            alt="Kapal Api Store" />
                    </a>
                </div>

                <!-- Company Detail -->
                <div class="space-y-4">
                    <h4 class="space-x-5 font-bold">
                        <span class="text-fr-yellow">PT SANTOS JAYA ABADI</span>
                        <span class="text-white">LAYANAN KONSUMEN</span>
                    </h4>
                    <div class="flex flex-wrap gap-4">
                        <div class="space-x-2">
                            <span
                                class="rounded-full bg-fr-yellow p-1 text-fr-black"
                                ><v-icon name="fa-phone-alt"
                            /></span>
                            <p class="inline-block text-white">0800-1-726867</p>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="rounded-full bg-fr-yellow p-1 text-fr-black"
                                ><v-icon name="fa-envelope"
                            /></span>
                            <p class="inline-block text-white">
                                santos@kapalapi.co.id
                            </p>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="rounded-full bg-fr-yellow p-1 text-fr-black"
                                ><v-icon name="fa-whatsapp"
                            /></span>
                            <p class="inline-block text-white">08111 726 867</p>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="rounded-full bg-fr-yellow p-1 text-fr-black"
                                ><v-icon name="fa-line"
                            /></span>
                            <p class="inline-block text-white">@halosantos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
