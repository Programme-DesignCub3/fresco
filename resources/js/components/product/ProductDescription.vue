<script setup>
import {
    splitDescriptionBlack,
    splitDescriptionCappuccino,
} from '@/misc/utils.js';
import { Swiper } from 'swiper';
import { Navigation } from 'swiper/modules';
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle, useMediaQuery } from '@vueuse/core';
import { onMounted, watch, ref } from 'vue';
import { storeToRefs } from 'pinia';
import SplitType from 'split-type';
import AOS from 'aos';
import 'swiper/css';

const { data } = defineProps(['data']);
const { idle } = useIdle(3500);
const idleWrapper = ref(false);
const isDesktop = useMediaQuery('(min-width: 768px)');
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const description = ref();
const swiper = ref();
const manifest = ref(null);
const delayAos = ref(0);

const swiperOption = {
    autoHeight: false,
    slidesPerView: 1,
    modules: [Navigation],
    navigation: {
        nextEl: '.description-next',
        prevEl: '.description-prev',
    },
};

const splitterText = (target) => {
    let split = new SplitType(target, {
        types: 'lines',
        tagName: 'span',
    });
    let lines = split.lines;
    let delay = 100;

    for (let index = 0; index < lines.length; index++) {
        let element = target.children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitDescriptionBlack(element, index, delay, 1, target)
            : splitDescriptionCappuccino(element, index, delay, 1, target);
    }

    delayAos.value = delay + 50;
};

const initSwiper = () => {
    swiper.value = new Swiper(description.value, swiperOption);
};

onMounted(() => {
    if (!swiper.value) {
        initSwiper();
    }

    if (manifest.value != null) {
        for (let i = 0; i < manifest.value.length; i++) {
            splitterText(manifest.value[i]);
        }
    }

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

watch(theme, () => {
    swiper.value = null;
    setTimeout(() => {
        initSwiper();
        for (let i = 0; i < manifest.value.length; i++) {
            splitterText(manifest.value[i]);
        }
    }, 10);
});

window.addEventListener('resize', () => {
    if (manifest.value != null) {
        for (let i = 0; i < manifest.value.length; i++) {
            splitterText(manifest.value[i]);
        }
    }
});
</script>

<template>
    <template v-if="themeStore.theme != undefined || themeStore.theme != null">
        <!-- (Desktop) -->
        <div
            v-for="(d, i) in themeStore.theme == 'black'
                ? data.black_desc_list
                : data.cappuccino_desc_list"
            :key="i"
            class="hidden overflow-x-hidden lg:block">
            <div class="grid grid-cols-2">
                <div
                    :class="
                        themeStore.theme == 'black'
                            ? d.black_desc_position == 'right' && 'order-last'
                            : d.cappuccino_desc_position == 'right' &&
                              'order-last'
                    ">
                    <div
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-fr-black'
                                : 'bg-fr-yellow'
                        "
                        class="relative w-full">
                        <img
                            class="h-[600px] w-full object-cover object-center"
                            width="auto"
                            height="auto"
                            :src="
                                themeStore.theme == 'black'
                                    ? d.black_desc_image
                                    : d.cappuccino_desc_image
                            "
                            :alt="
                                themeStore.theme == 'black'
                                    ? d.black_desc_title
                                    : d.cappuccino_desc_title
                            " />
                    </div>
                </div>
                <div
                    class="z-20 my-auto flex h-full w-full flex-col justify-center px-16 transition-all duration-700 ease-in-out"
                    :class="[
                        themeStore.theme == 'black'
                            ? 'bg-fr-black'
                            : 'bg-fr-yellow',
                        d.black_desc_position == 'right' && 'items-end',
                        d.cappuccino_desc_position == 'right' && 'items-end',
                    ]">
                    <div class="w-full space-y-4 2xl:w-[600px]">
                        <h2
                            class="text-4xl font-bold leading-none xl:text-6xl"
                            ref="manifest">
                            {{
                                themeStore.theme == 'black'
                                    ? d.black_desc_title
                                    : d.cappuccino_desc_title
                            }}
                        </h2>
                        <div
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'text-white'
                                    : 'text-fr-black'
                            "
                            class="description-body font-medium leading-8"
                            v-html="
                                themeStore.theme == 'black'
                                    ? d.black_desc_explanation
                                    : d.cappuccino_desc_explanation
                            "></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- (Mobile) -->
        <div
            @mouseenter="idleWrapper = true"
            @mouseleave="idleWrapper = false"
            class="relative block h-full w-full lg:hidden"
            :class="
                themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'
            ">
            <!-- Black Coffee -->
            <div
                v-if="themeStore.theme == 'black'"
                class="swiper"
                ref="description">
                <div class="swiper-wrapper">
                    <div
                        v-for="(d, i) in data.black_desc_list"
                        :key="i"
                        class="swiper-slide">
                        <div class="grid grid-rows-1">
                            <img
                                class="aspect-square w-full object-cover object-center sm:h-[500px]"
                                width="auto"
                                height="auto"
                                :src="d.black_desc_image"
                                :alt="d.black_desc_title" />
                            <div
                                class="flex w-full flex-col justify-between space-y-4 px-4 py-8">
                                <h2
                                    class="text-center text-[40px] font-bold leading-none text-white"
                                    ref="manifest">
                                    {{ d.black_desc_title }}
                                </h2>
                                <div
                                    data-aos="fade-down"
                                    data-aos-offset="0"
                                    class="description-body text-center font-medium leading-8 text-white"
                                    v-html="d.black_desc_explanation"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Arrow Slider -->
                <div
                    class="description-prev black"
                    :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                              ? 0
                              : 1,
                    }">
                    <v-icon name="fa-chevron-left" />
                </div>
                <div
                    class="description-next black"
                    :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                              ? 0
                              : 1,
                    }">
                    <v-icon name="fa-chevron-right" />
                </div>
            </div>
            <!-- Cappuccino -->
            <div
                v-if="themeStore.theme == 'cappuccino'"
                class="swiper"
                ref="description">
                <div class="swiper-wrapper">
                    <div
                        v-for="(d, i) in data.cappuccino_desc_list"
                        :key="i"
                        class="swiper-slide">
                        <div class="grid grid-rows-1">
                            <img
                                class="aspect-square w-full object-cover object-center sm:h-[500px]"
                                width="auto"
                                height="auto"
                                :src="d.cappuccino_desc_image"
                                :alt="d.cappuccino_desc_title" />
                            <div
                                class="flex w-full flex-col justify-between space-y-4 px-4 py-8">
                                <h2
                                    class="text-center text-[40px] font-bold leading-none text-white"
                                    ref="manifest">
                                    {{ d.cappuccino_desc_title }}
                                </h2>
                                <div
                                    data-aos="fade-down"
                                    data-aos-offset="0"
                                    class="text-center font-medium leading-8 text-fr-black"
                                    v-html="
                                        d.cappuccino_desc_explanation
                                    "></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Arrow Slider -->
                <div
                    class="description-prev cappuccino"
                    :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                              ? 0
                              : 1,
                    }">
                    <v-icon name="fa-chevron-left" />
                </div>
                <div
                    class="description-next cappuccino"
                    :style="{
                        opacity: isDesktop
                            ? idleWrapper
                                ? idle && idleWrapper
                                    ? 0
                                    : 1
                                : 0
                            : idle
                              ? 0
                              : 1,
                    }">
                    <v-icon name="fa-chevron-right" />
                </div>
            </div>
        </div>
    </template>
</template>
