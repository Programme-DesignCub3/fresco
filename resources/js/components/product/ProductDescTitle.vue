<script setup>
import { splitBlack, splitCappuccino } from '@/misc/utils';
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, watch, ref } from 'vue';
import { storeToRefs } from 'pinia';
import SplitType from 'split-type';
import AOS from 'aos';

const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const manifest = ref(null);
const delayAos = ref(0);

onMounted(() => {
    let split = new SplitType(manifest.value, { types: 'lines' });
    let lines = split.lines;
    let delay = 100;

    for (let index = 0; index < lines.length; index++) {
        let element = manifest.value.children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitBlack(element, index, delay, 1, '#product-title-head-anchor')
            : splitCappuccino(
                  element,
                  index,
                  delay,
                  1,
                  '#product-title-head-anchor',
              );
    }

    delayAos.value = delay + 100;

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

watch(theme, () => {
    setTimeout(() => {
        let split = new SplitType(manifest.value, { types: 'lines' });
        let lines = split.lines;
        let delay = 100;

        for (let index = 0; index < lines.length; index++) {
            let element = manifest.value.children[index];
            delay += 100;
            themeStore.theme == 'black'
                ? splitBlack(
                      element,
                      index,
                      delay,
                      1,
                      '#product-title-head-anchor',
                  )
                : splitCappuccino(
                      element,
                      index,
                      delay,
                      1,
                      '#product-title-head-anchor',
                  );
        }

        delayAos.value = delay + 100;
    }, 10);
});
</script>

<template>
    <div
        class="py-16"
        :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
        <div class="fr-container mx-auto" id="product-title-head-anchor">
            <h1
                class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
                <span
                    data-aos="fade-right"
                    data-aos-delay="200"
                    :class="
                        themeStore.theme == 'black'
                            ? 'text-white'
                            : 'text-fr-green'
                    "
                    >KELEBIHAN</span
                >
                <span
                    data-aos="fade-right"
                    data-aos-delay="400"
                    :class="
                        themeStore.theme == 'black'
                            ? 'text-fr-yellow'
                            : 'text-fr-red'
                    "
                    >KOPI FRESCO</span
                >
            </h1>
            <div class="my-6 h-[4px] w-16 rounded-full bg-fr-red"></div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
