<script setup>
import { Swiper } from 'swiper';
import { storeToRefs } from 'pinia';
import { splitBlack, splitCappuccino } from '@/misc/utils.js';
import { useThemeStore } from '@/stores/theme-store.js';
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
const stroke2 = ref(null);
const delayAos = ref(0);
const swiper = ref();
const home = ref();

const swiperOption = {
  autoHeight: true,
  slidesPerView: 1,
  spaceBetween: 100,
  loop: true,
  modules: [Navigation],
  navigation: {
    nextEl: '.home-intro-product .next',
    prevEl: '.home-intro-product .prev',
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
      ? splitBlack(element, index, delay, 1, '#black-anchor')
      : splitCappuccino(element, index, delay, 1, '#cappuccino-anchor');
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
    AOS.refresh();
  }, 10);
});

watch(theme, () => {
  initSwiper();
  splitterText(first.value);
  splitterText(second.value);
  splitterStroke(stroke.value);
  splitterStroke(stroke2.value);

  setTimeout(() => {
    AOS.refresh();
  }, 10);
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
  <div
    v-if="
      themeStore.getTheme().value != undefined &&
      themeStore.getTheme().value != null
    "
    class="home-intro-product"
    :class="themeStore.theme">
    <!-- Arrow Slider -->
    <div class="prev">
      <v-icon name="fa-chevron-left" />
    </div>
    <div class="next">
      <v-icon name="fa-chevron-right" />
    </div>
    <!-- Home Intro Wrapper -->
    <div class="home-intro-product-wrapper">
      <div class="swiper" ref="home">
        <div class="swiper-wrapper">
          <!-- Black Theme -->
          <template v-if="themeStore.theme == 'black'">
            <!-- First Slide -->
            <div class="swiper-slide">
              <div class="black-slider" :class="data.black_intro_layout">
                <!-- Title (Black) -->
                <div class="heading-wrapper" id="black-anchor">
                  <h1 ref="first">{{ data.black_intro_title }}</h1>
                  <!-- Description (Black) -->
                  <div
                    class="description-wrapper home-intro-body"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-offset="0"
                    v-html="data.black_intro_desc"></div>
                </div>
                <!-- Image (Black) -->
                <div class="image-wrapper">
                  <img
                    width="auto"
                    height="auto"
                    :src="data.black_intro_image"
                    :alt="data.black_intro_title"
                    data-aos-offset="0"
                    data-aos="zoom-in"
                    data-aos-delay="150" />
                </div>
              </div>
            </div>
            <!-- Second Slide -->
            <div class="swiper-slide">
              <div class="black-slider" :class="data.black_intro_layout">
                <!-- Title (Black) -->
                <div class="heading-wrapper" id="black-anchor">
                  <h1 ref="second">{{ data.cappuccino_intro_title }}</h1>
                  <!-- Description (Black) -->
                  <div
                    class="description-wrapper home-intro-body"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-offset="0"
                    v-html="data.cappuccino_intro_desc"></div>
                </div>
                <!-- Image (Black) -->
                <div class="image-wrapper">
                  <img
                    width="auto"
                    height="auto"
                    :src="data.cappuccino_intro_image"
                    :alt="data.cappuccino_intro_title"
                    data-aos-offset="0"
                    data-aos="zoom-in"
                    data-aos-delay="150" />
                </div>
              </div>
            </div>
          </template>

          <!-- Cappuccino Theme -->
          <template v-if="themeStore.theme == 'cappuccino'">
            <!-- First Slide -->
            <div class="swiper-slide">
              <div
                class="cappuccino-slider"
                :class="data.cappuccino_intro_layout">
                <!-- Title (Cappuccino) -->
                <div class="heading-wrapper" id="cappuccino-anchor">
                  <div class="relative">
                    <h1 ref="first">{{ data.cappuccino_intro_title }}</h1>
                    <h2
                      ref="stroke"
                      data-aos="fade-in"
                      :data-aos-delay="delayAos"
                      data-aos-duration="1200"
                      data-aos-anchor="#cappuccino-anchor"
                      data-aos-offset="100">
                      {{ data.cappuccino_intro_title }}
                    </h2>
                  </div>
                  <!-- Description (Cappuccino) -->
                  <div
                    class="description-wrapper home-intro-body"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-offset="0"
                    v-html="data.cappuccino_intro_desc"></div>
                </div>
                <!-- Image (Cappuccino) -->
                <div class="image-wrapper">
                  <img
                    width="auto"
                    height="auto"
                    :src="data.cappuccino_intro_image"
                    :alt="data.cappuccino_intro_title"
                    data-aos-offset="0"
                    data-aos="zoom-in"
                    data-aos-delay="150" />
                </div>
              </div>
            </div>
            <!-- Second Slide -->
            <div class="swiper-slide">
              <div
                class="cappuccino-slider"
                :class="data.cappuccino_intro_layout">
                <!-- Title (Cappuccino) -->
                <div class="heading-wrapper" id="cappuccino-anchor">
                  <div class="relative">
                    <h1 ref="second">{{ data.black_intro_title }}</h1>
                    <h2
                      ref="stroke2"
                      data-aos="fade-in"
                      :data-aos-delay="delayAos"
                      data-aos-duration="1200"
                      data-aos-anchor="#cappuccino-anchor"
                      data-aos-offset="100">
                      {{ data.black_intro_title }}
                    </h2>
                  </div>
                  <!-- Description (Cappuccino) -->
                  <div
                    class="description-wrapper home-intro-body"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-offset="0"
                    v-html="data.black_intro_desc"></div>
                </div>
                <!-- Image (Cappuccino) -->
                <div class="image-wrapper">
                  <img
                    width="auto"
                    height="auto"
                    :src="data.black_intro_image"
                    :alt="data.black_intro_title"
                    data-aos-offset="0"
                    data-aos="zoom-in"
                    data-aos-delay="150" />
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
