<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { splitBlack, splitCappuccino } from '@/misc/utils.js';
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, ref, watch } from 'vue';
import { Navigation } from 'swiper/modules';
import SplitType from 'split-type';
import AOS from 'aos';
import 'swiper/css';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const first = ref(null);
const second = ref(null);
const stroke = ref(null);
const delayAos = ref(0);
const swiper = ref();
const home = ref();

const swiperOption = {
    slidesPerView: 1,
    spaceBetween: 100,
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.fr-intro-slider-next',
        prevEl: '.fr-intro-slider-prev',
    },
};

const initSwiper = () => {
    if (swiper.value) {
        swiper.value.destroy(true, true);
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
            ? splitBlack(element, index, delay, 1, '#black-anchor')
            : splitCappuccino(element, index, delay, 2, '#cappuccino-anchor');
    }

    delayAos.value = delay + 100;
};

const splitterStroke = () => {
    let strokeSplit = new SplitType(stroke.value, {
        types: 'lines',
        tagName: 'span'
    });
    strokeSplit.lines;
};

onMounted(() => {
    initSwiper();

    splitterText(first.value);
    splitterText(second.value);

    splitterStroke();

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

watch(theme, () => {
    initSwiper();

    splitterText(first.value);
    splitterText(second.value);

    splitterStroke();

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

window.addEventListener('resize', () => {
    splitterText(first.value);
    splitterText(second.value);

    splitterStroke();
});
</script>

<template>
    <div
        v-if="
            themeStore.getTheme().value != undefined &&
            themeStore.getTheme().value != null
        "
        class="relative py-10 pt-0 pb-10 overflow-x-hidden transition-all duration-700 ease-in-out introduction lg:py-24"
        :class="themeStore.theme">
        <!-- Navigation Swiper (Arrow) -->
        <div
            class="fr-intro-slider-prev absolute left-[2%] top-1/2 z-40 flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:left-[4%] md:left-[6%] lg:left-[8%] 2xl:left-[10%]"
            :class="
                themeStore.theme == 'black'
                    ? 'border-2 border-white bg-transparent text-white'
                    : 'border-2 border-black text-black'
            ">
            <v-icon name="fa-chevron-left" />
        </div>
        <div
            class="fr-intro-slider-next absolute right-[2%] top-1/2 z-40 flex h-9 w-9 cursor-pointer items-center justify-center rounded-full sm:right-[4%] md:right-[6%] lg:right-[8%] 2xl:right-[10%]"
            :class="
                themeStore.theme == 'black'
                    ? 'border-2 border-white bg-transparent text-white'
                    : 'border-2 border-black text-black'
            ">
            <v-icon name="fa-chevron-right" />
        </div>

        <div class="relative w-full px-4 mx-auto fr-container md:px-0">
            <div class="swiper" ref="home">
                <div class="swiper-wrapper">
                    <!-- === Black Theme === -->
                    <template v-if="themeStore.theme == 'black'">
                        <!-- First Slide -->
                        <div class="swiper-slide">
                            <div
                                class="flex flex-col md:relative md:flex-row md:items-center md:gap-x-52">
                                <div class="mb-10 md:mb-0 md:w-1/4">
                                    <!-- Title -->
                                    <div id="black-anchor">
                                        <h1
                                            class="text-center text-[45px] font-bold leading-none sm:text-[50px] md:text-left md:text-[60px] lg:text-[80px] xl:text-[100px]"
                                            ref="first">
                                            {{ data.black_intro_title }}
                                        </h1>
                                    </div>
                                </div>
                                <!-- Image -->
                                <div class="w-full bg-glow-yellow">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="data.black_intro_image"
                                        :alt="data.black_intro_title"
                                        class="w-full"
                                        data-aos-offset="0"
                                        data-aos="zoom-in"
                                        data-aos-delay="150">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mt-12 overflow-y-hidden">
                                <div
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                    data-aos-offset="0"
                                    class="flex justify-center font-medium leading-8 text-center">
                                    <p
                                        v-html="data.black_intro_desc"
                                        class="text-white md:text-lg"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Slide -->
                        <div class="swiper-slide">
                            <div
                                class="flex flex-col md:relative md:flex-row md:items-center md:gap-x-52">
                                <div class="mb-10 md:mb-0 md:w-1/4">
                                    <!-- Title -->
                                    <div id="black-anchor">
                                        <h1
                                            class="text-center text-[45px] font-bold leading-none sm:text-[50px] md:text-left md:text-[60px] lg:text-[80px] xl:text-[100px]"
                                            ref="second">
                                            {{ data.cappuccino_intro_title }}
                                        </h1>
                                    </div>
                                </div>
                                <!-- Image -->
                                <div class="w-full bg-glow-yellow">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="data.cappuccino_intro_image"
                                        :alt="data.cappuccino_intro_title"
                                        class="w-full"
                                        data-aos-offset="0"
                                        data-aos="zoom-in"
                                        data-aos-delay="150">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mt-12 overflow-y-hidden">
                                <div
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                    data-aos-offset="0"
                                    class="flex justify-center font-medium leading-8 text-center">
                                    <p
                                        v-html="data.cappuccino_intro_desc"
                                        class="text-white md:text-lg"></p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- === Cappuccino Theme === -->
                    <template v-if="themeStore.theme == 'cappuccino'">
                        <!-- First Slide -->
                        <div class="p-2 swiper-slide">
                            <div
                                class="flex flex-col md:relative md:flex-row md:items-center md:gap-x-52">
                                <div class="mb-10 md:mb-0 md:w-1/4">
                                    <!-- Title -->
                                    <div
                                        class="relative"
                                        id="cappuccino-anchor">
                                        <h1
                                            class="text-center text-[45px] font-bold leading-none sm:text-[50px] md:text-left md:text-[60px] lg:text-[80px] xl:text-[100px]"
                                            ref="first">
                                            {{ data.cappuccino_intro_title }}
                                        </h1>
                                        <h2
                                            ref="stroke"
                                            data-aos="fade-in"
                                            :data-aos-delay="delayAos"
                                            data-aos-duration="1200"
                                            data-aos-anchor="#cappuccino-anchor"
                                            data-aos-offset="100"
                                            class="text-stroke absolute -left-1 -right-1 -top-1 text-center text-[45px] font-bold leading-none text-white sm:text-[50px] md:text-left md:text-[60px] lg:-left-1.5 lg:-right-1.5 lg:-top-1.5 lg:text-[80px] xl:text-[100px]">
                                            {{ data.cappuccino_intro_title }}
                                        </h2>
                                    </div>
                                </div>
                                <!-- Image -->
                                <div class="w-full">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="data.cappuccino_intro_image"
                                        :alt="data.cappuccino_intro_title"
                                        class="w-full"
                                        data-aos-offset="0"
                                        data-aos="zoom-in"
                                        data-aos-delay="150">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mt-12 overflow-y-hidden">
                                <div
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                    data-aos-offset="0"
                                    class="flex justify-center font-medium leading-8 text-center">
                                    <p
                                        v-html="data.cappuccino_intro_desc"
                                        class="text-fr-black md:text-lg"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Slide -->
                        <div class="p-2 swiper-slide">
                            <div
                                class="flex flex-col md:relative md:flex-row md:items-center md:gap-x-52">
                                <div class="mb-10 md:mb-0 md:w-1/4">
                                    <!-- Title -->
                                    <div
                                        class="relative"
                                        id="cappuccino-anchor">
                                        <h1
                                            class="text-center text-[45px] font-bold leading-none sm:text-[50px] md:text-left md:text-[60px] lg:text-[80px] xl:text-[100px]"
                                            ref="second">
                                            {{ data.black_intro_title }}
                                        </h1>
                                        <h2
                                            data-aos="fade-in"
                                            :data-aos-delay="delayAos"
                                            data-aos-duration="1200"
                                            data-aos-anchor="#cappuccino-anchor"
                                            data-aos-offset="100"
                                            class="text-stroke absolute -left-1 -right-1 -top-1 text-center text-[45px] font-bold leading-none text-white sm:text-[50px] md:text-left md:text-[60px] lg:-left-1.5 lg:-right-1.5 lg:-top-1.5 lg:text-[80px] xl:text-[100px]">
                                            {{ data.black_intro_title }}
                                        </h2>
                                    </div>
                                </div>
                                <!-- Image -->
                                <div class="w-full">
                                    <img
                                        width="auto"
                                        height="auto"
                                        :src="data.black_intro_image"
                                        :alt="data.black_intro_title"
                                        class="w-full"
                                        data-aos-offset="0"
                                        data-aos="zoom-in"
                                        data-aos-delay="150">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mt-12 overflow-y-hidden">
                                <div
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                    data-aos-offset="0"
                                    class="flex justify-center font-medium leading-8 text-center">
                                    <p
                                        v-html="data.black_intro_desc"
                                        class="text-fr-black md:text-lg"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-glow-yellow {
    background: rgb(253, 198, 75);
    background: radial-gradient(
        circle,
        rgba(253, 198, 75, 1) 5%,
        rgba(0, 212, 255, 0) 45%
    );
}

.text-stroke {
    -webkit-text-stroke: 1px white;
    -webkit-text-fill-color: transparent;
}
</style>
