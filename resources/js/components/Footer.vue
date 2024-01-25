<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
</script>

<template>
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" class="bg-fr-black text-white">
        <div class="fr-container mx-auto px-8 py-20 md:px-0">
            <div class="flex w-full justify-between max-md:flex-col">
                <div class="max-md:mx-auto">
                    <img src="/assets/images/logo.png" alt="Fresco Logo" />
                </div>
                <!-- Desktop -->
                <div class="hidden md:block">
                    <h1 class="font-bold">PT SANTOS JAYA ABADI</h1>
                    <p>0800-1-726867 (SANTOS)</p>
                    <p>Senin s/d Jumat 09.00 – 17.00 WIB</p>
                    <p>Email: santos@kapalapi.co.id</p>
                </div>
                <div class="hidden md:block">
                    <h1 class="font-bold">LAYANAN KONSUMEN</h1>
                    <p>0800-1-726867 (SANTOS)</p>
                    <div class="mb-8 mt-2 flex flex-wrap space-x-2">
                        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.facebook_link ? data.facebook_link : '#'">
                            <img
                                class="h-9 w-9 px-[10px] pt-2"
                                src="/assets/images/icons/facebook.png"
                                alt="Facebook" />
                        </a>
                        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.instagram_link ? data.instagram_link : '#'">
                            <img
                                class="h-9 w-9 p-2"
                                src="/assets/images/icons/instagram.png"
                                alt="Instagram" />
                        </a>
                        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.x_link ? data.x_link : '#'">
                            <img
                                class="h-9 w-9 p-2"
                                src="/assets/images/icons/Twitter.png"
                                alt="Twitter" />
                        </a>
                        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.tiktok_link ? data.tiktok_link : '#'">
                            <img
                                class="h-9 w-9 px-[10px] py-2"
                                src="/assets/images/icons/tiktok.png"
                                alt="Tiktok" />
                        </a>
                        <a class="h-9 w-9 rounded-lg bg-fr-yellow" :href="data.youtube_link ? data.youtube_link : '#'">
                            <img
                                class="h-9 w-9 px-2 py-[11px]"
                                src="/assets/images/icons/youtube.png"
                                alt="Youtube" />
                        </a>
                    </div>
                    <strong class="text-lg">DESIGN BY DESIGNCUB3.COM</strong>
                </div>
                <!-- Mobile -->
                <div
                    class="hidden flex-row justify-center max-md:mt-12 max-md:flex max-md:space-x-4 max-[528px]:flex-col max-[528px]:space-x-0 max-[528px]:space-y-4">
                    <div class="flex-grow">
                        <h1 class="font-bold">PT SANTOS JAYA ABADI</h1>
                        <p>0800-1-726867 (SANTOS)</p>
                        <p>Senin s/d Jumat 09.00 – 17.00 WIB</p>
                        <p>Email: santos@kapalapi.co.id</p>
                    </div>
                    <div class="flex-grow">
                        <h1 class="font-bold">LAYANAN KONSUMEN</h1>
                        <p>0800-1-726867 (SANTOS}</p>
                        <div class="mb-8 mt-2 flex flex-wrap space-x-2">
                            <a href=""
                                ><img
                                    src="/assets/images/icons/facebook-width.png"
                                    alt=""
                            /></a>
                            <a href=""
                                ><img
                                    src="/assets/images/icons/instagram-width.png"
                                    alt=""
                            /></a>
                            <a href=""
                                ><img
                                    src="/assets/images/icons/twitter-width.png"
                                    alt=""
                            /></a>
                            <a href=""
                                ><img
                                    src="/assets/images/icons/tiktok-width.png"
                                    alt=""
                            /></a>
                            <a href=""
                                ><img
                                    src="/assets/images/icons/youtube-width.png"
                                    alt=""
                            /></a>
                        </div>
                        <strong class="text-lg"
                            >DESIGN BY DESIGNCUB3.COM</strong
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
