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
            class="flex flex-col justify-between gap-12 px-4 py-10 mx-auto fr-container md:flex-row md:px-0 md:py-20">

            <!-- Logo Image -->
            <div class="w-full md:w-2/5">
                <img
                    width="auto"
                    height="auto"
                    class="w-[160px] max-md:mx-auto sm:w-[200px]"
                    src="/assets/images/logo.png"
                    alt="FresCo Logo" />
            </div>

            <div class="w-full space-y-10 md:w-3/5">

                <!-- Marketplace -->
                <div class="flex flex-wrap gap-4">
                    <a :href="data.tokopedia_store" target="_blank">
                        <img
                            width="auto"
                            height="auto"
                            class="w-32 md:w-36"
                            src="/assets/images/icons/tokopedia.png"
                            alt="Tokopedia" />
                    </a>
                    <a :href="data.shopee_store" target="_blank">
                        <img
                            width="auto"
                            height="auto"
                            class="w-32 md:w-36"
                            src="/assets/images/icons/shopee.png"
                            alt="Shopee" />
                    </a>
                    <a :href="data.kapalapi_store" target="_blank">
                        <img
                            width="auto"
                            height="auto"
                            class="w-32 md:w-36"
                            src="/assets/images/icons/kapal-api-store.png"
                            alt="Kapal Api Store" />
                    </a>
                </div>

                <!-- Company Detail -->
                <div class="space-y-4">
                    <h3 class="space-x-5 font-bold">
                        <span class="text-fr-yellow">PT SANTOS JAYA ABADI</span>
                        <span class="text-white">LAYANAN KONSUMEN</span>
                    </h3>
                    <div class="flex flex-wrap gap-4">
                        <div class="space-x-2">
                            <span
                                class="p-1 rounded-full bg-fr-yellow text-fr-black"
                                ><v-icon name="fa-phone-alt"
                            /></span>
                            <a :href="'tel:' + data.phone_link" class="inline-block text-white">{{ data.phone_alias }}</a>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="p-1 rounded-full bg-fr-yellow text-fr-black"
                                ><v-icon name="fa-envelope"
                            /></span>
                            <a :href="'mailto:' + data.email_link" class="inline-block text-white">
                                {{ data.email_alias }}
                            </a>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="p-1 rounded-full bg-fr-yellow text-fr-black"
                                ><v-icon name="fa-whatsapp"
                            /></span>
                            <a :href="data.whatsapp_link" target="_blank" class="inline-block text-white">{{ data.whatsapp_alias }}</a>
                        </div>
                        <div class="space-x-2">
                            <span
                                class="p-1 rounded-full bg-fr-yellow text-fr-black"
                                ><v-icon name="fa-line"
                            /></span>
                            <a :href="data.line_link" target="_blank" class="inline-block text-white">{{ data.line_alias }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</template>
