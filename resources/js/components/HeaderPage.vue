<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { splitBlack, splitCappuccino } from '@/misc/utils.js';
import { onMounted, ref, watch } from 'vue';
import { storeToRefs } from 'pinia';
import SplitType from 'split-type';

const { data, header } = defineProps(['data', 'header']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const blackTitle = ref();
const cappuccinoTitle = ref();

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
            ? splitBlack(element, index, delay, 1, '#product-title-anchor')
            : splitCappuccino(
                  element,
                  index,
                  delay,
                  1,
                  '#product-title-anchor',
              );
    }
};

onMounted(() => {
    splitterText(blackTitle.value);
    splitterText(cappuccinoTitle.value);
});

watch(theme, () => {
    setTimeout(() => {
        splitterText(blackTitle.value);
        splitterText(cappuccinoTitle.value);
    });
});

window.addEventListener('resize', () => {
    splitterText(blackTitle.value);
    splitterText(cappuccinoTitle.value);
});
</script>

<template>
    <!-- Article Header -->
    <div
        v-if="header == 'article'"
        class="header-page-wrapper"
        :class="
            themeStore.theme == 'black'
                ? `bg-fr-black ${data.ar_black_banner_position}`
                : `bg-fr-yellow ${data.ar_cappuccino_banner_position}`
        "
        :style="{
            'background-image':
                themeStore.theme == 'black'
                    ? `url(/${data.ar_black_banner_image})`
                    : `url(/${data.ar_cappuccino_banner_image})`,
        }">
        <div
            class="header-page-title-wrapper"
            :class="themeStore.theme == 'black' && 'text-shadow'">
            <h1
                ref="blackTitle"
                v-if="themeStore.theme == 'black'"
                v-html="data.ar_black_banner_title"></h1>
            <h1
                ref="cappuccinoTitle"
                v-if="themeStore.theme == 'cappuccino'"
                v-html="data.ar_cappuccino_banner_title"></h1>
        </div>
    </div>

    <!-- Activity Header -->
    <div
        v-if="header == 'activity'"
        class="header-page-wrapper"
        :class="
            themeStore.theme == 'black'
                ? `bg-fr-black ${data.ac_black_banner_position}`
                : `bg-fr-yellow ${data.ac_cappuccino_banner_position}`
        "
        :style="{
            'background-image':
                themeStore.theme == 'black'
                    ? `url(/${data.ac_black_banner_image})`
                    : `url(/${data.ac_cappuccino_banner_image})`,
        }">
        <div
            class="header-page-title-wrapper"
            :class="themeStore.theme == 'black' && 'text-shadow'">
            <h1
                ref="blackTitle"
                v-if="themeStore.theme == 'black'"
                v-html="data.ac_black_banner_title"></h1>
            <h1
                ref="cappuccinoTitle"
                v-if="themeStore.theme == 'cappuccino'"
                v-html="data.ac_cappuccino_banner_title"></h1>
        </div>
    </div>

    <!-- Contact Header -->
    <div
        v-if="header == 'contact'"
        class="header-page-wrapper"
        :class="
            themeStore.theme == 'black'
                ? `bg-fr-black ${data.cn_black_banner_position}`
                : `bg-fr-yellow ${data.cn_cappuccino_banner_position}`
        "
        :style="{
            'background-image':
                themeStore.theme == 'black'
                    ? `url(/${data.cn_black_banner_image})`
                    : `url(/${data.cn_cappuccino_banner_image})`,
        }">
        <div
            class="header-page-title-wrapper"
            :class="themeStore.theme == 'black' && 'text-shadow'">
            <h1
                ref="blackTitle"
                v-if="themeStore.theme == 'black'"
                v-html="data.cn_black_banner_title"></h1>
            <h1
                ref="cappuccinoTitle"
                v-if="themeStore.theme == 'cappuccino'"
                v-html="data.cn_cappuccino_banner_title"></h1>
        </div>
    </div>
</template>
