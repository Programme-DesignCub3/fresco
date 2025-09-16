<script setup>
import { Swiper } from 'swiper';
import { splitBlack, splitCappuccino } from '@/misc/utils.js';
import { useThemeStore } from '@/stores/theme-store.js';
import { useMediaQuery } from '@vueuse/core';
import { onMounted, ref } from 'vue';
import { Navigation } from 'swiper/modules';
import { Icon } from '@iconify/vue';
import SplitType from 'split-type';
import 'swiper/css';

const { data } = defineProps(['data']);
const idleWrapper = ref(false);
const isTablet = useMediaQuery('(min-width: 1024px)');
const themeStore = useThemeStore();
const first = ref(null);
const second = ref(null);
const stroke = ref(null);
const stroke2 = ref(null);
const delayAos = ref(0);
const swiper = ref();
const home = ref();

const swiperOption = {
    autoHeight: false,
    slidesPerView: 1,
    spaceBetween: 100,
    modules: [Navigation],
    navigation: {
        nextEl: '.home-intro-product .next',
        prevEl: '.home-intro-product .prev',
        hideOnClick: true,
    },
};

const initSwiper = () => {
    if (swiper.value) {
        swiper.value = null;
    }
    swiper.value = new Swiper(home.value, swiperOption);
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
            ? splitBlack(
                element,
                index,
                delay,
                isTablet.value ? 2 : 1,
                '#black-anchor',
            )
            : splitCappuccino(
                element,
                index,
                delay,
                isTablet.value ? 2 : 1,
                '#cappuccino-anchor',
            );
    }

    delayAos.value = delay + 100;
};

const splitterStroke = (target) => {
    let strokeSplit = new SplitType(target, {
        types: 'lines',
        tagName: 'span',
    });
    strokeSplit.lines;
};

onMounted(() => {
    initSwiper();
    splitterText(first.value);
    splitterText(second.value);
    splitterStroke(stroke.value);
    splitterStroke(stroke2.value);
    setTimeout(() => {
        splitterText(first.value);
        splitterText(second.value);
        splitterStroke(stroke.value);
        splitterStroke(stroke2.value);
    }, 1000);
});

window.addEventListener('resize', () => {
    splitterText(first.value);
    splitterText(second.value);
    splitterStroke(stroke.value);
    splitterStroke(stroke2.value);
});
</script>

<template>
    <!-- Home Intro Product -->
    <div v-if="
        themeStore.getTheme().value != undefined &&
        themeStore.getTheme().value != null
    " class="home-intro-product" @mouseenter="idleWrapper = true" @mouseleave="idleWrapper = false"
        :class="themeStore.theme">
        <!-- Home Intro Wrapper -->
        <div class="home-intro-product-wrapper">
            <div class="py-5 md:py-24">
                <!-- Black Theme -->
                <template v-if="themeStore.theme == 'black'">
                    <div class="black-slider">
                        <div class="heading-wrapper" id="black-anchor">
                            <h1 ref="first">{{ data.black_intro_title }}</h1>
                            <div class="space-y-5" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">
                                <div v-html="data.black_intro_desc" class="description-wrapper home-intro-body"></div>
                                <div class="text-center lg:text-left">
                                    <a href="/produk"
                                        class="button red cursor-pointer transition-all duration-700 ease-in-out">
                                        TEMUKAN PRODUK
                                        <Icon class="inline-block h-4 w-4 stroke-2 py-[2px]"
                                            icon="fa-solid:chevron-right" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="image-wrapper">
                            <img width="auto" height="auto" :src="data.black_intro_image" :alt="data.black_intro_title"
                                data-aos-offset="0" data-aos="zoom-in" data-aos-delay="150" />
                        </div>
                    </div>
                </template>

                <!-- Cappuccino Theme -->
                <template v-if="themeStore.theme == 'cappuccino'">
                    <div class="cappuccino-slider">
                        <div class="heading-wrapper" id="cappuccino-anchor">
                            <h1 ref="first">{{ data.cappuccino_intro_title }}</h1>
                            <div class="space-y-5" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">
                                <div v-html="data.cappuccino_intro_desc" class="description-wrapper home-intro-body">
                                </div>
                                <div class="text-center lg:text-left">
                                    <a href="/produk"
                                        class="button red cursor-pointer transition-all duration-700 ease-in-out">
                                        TEMUKAN PRODUK
                                        <Icon class="inline-block h-4 w-4 stroke-2 py-[2px]"
                                            icon="fa-solid:chevron-right" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="image-wrapper">
                            <img width="auto" height="auto" :src="data.cappuccino_intro_image"
                                :alt="data.cappuccino_intro_title" data-aos-offset="0" data-aos="zoom-in"
                                data-aos-delay="150" />
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
