<script setup>
import {
    splitDescriptionBlack,
    splitDescriptionCappuccino,
} from '@/misc/utils.js';
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, watch, ref } from 'vue';
import { storeToRefs } from 'pinia';
import SplitType from 'split-type';
import AOS from 'aos';

const { data, index, themes } = defineProps(['data', 'index', 'themes']);
const themeStore = useThemeStore();
const { theme } = storeToRefs(themeStore);
const manifest = ref(null);
const delayAos = ref(0);

onMounted(() => {
    let split = new SplitType(manifest.value, {
        types: 'lines',
        tagName: 'span',
    });
    let lines = split.lines;
    let delay = 100;

    for (let index = 0; index < lines.length; index++) {
        let element = manifest.value.children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitDescriptionBlack(element, index, delay, 1, manifest.value)
            : splitDescriptionCappuccino(
                  element,
                  index,
                  delay,
                  1,
                  manifest.value,
              );
    }

    delayAos.value = delay + 50;

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

watch(theme, () => {
    setTimeout(() => {
        let split = new SplitType(manifest.value, {
            types: 'lines',
            tagName: 'span',
        });
        let lines = split.lines;
        let delay = 100;

        for (let index = 0; index < lines.length; index++) {
            let element = manifest.value.children[index];
            delay += 100;
            themeStore.theme == 'black'
                ? splitDescriptionBlack(
                      element,
                      index,
                      delay,
                      1,
                      manifest.value,
                  )
                : splitDescriptionCappuccino(
                      element,
                      index,
                      delay,
                      1,
                      manifest.value,
                  );
        }

        delayAos.value = delay + 50;
    }, 10);
});
</script>

<template>
    <div
        v-if="themeStore.theme != undefined || themeStore.theme != null"
        class="grid overflow-x-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div
                :class="
                    data.black_desc_position
                        ? data.black_desc_position == 'right' && 'order-last'
                        : data.cappuccino_desc_position == 'right' &&
                          'order-last'
                ">
                <div
                    class="relative w-full"
                    :class="
                        themeStore.theme == 'black'
                            ? 'bg-fr-black'
                            : 'bg-fr-yellow'
                    ">
                    <!-- Image Slot -->
                    <slot
                        v-if="themeStore.theme == 'black'"
                        name="black-desc-image" />
                    <slot v-else name="cappuccino-desc-image" />
                </div>
            </div>

            <!-- Text -->
            <div
                class="relative z-20 hidden h-full w-full bg-fr-black lg:block"
                :class="
                    themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'
                ">
                <div
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <h1
                        class="text-shadow text-[110px] font-bold leading-none lg:w-[450px] lg:text-[78px] xl:w-[630px] xl:text-[90px] 2xl:text-[80px]"
                        ref="manifest">
                        <template v-if="data.black_desc_title">
                            {{ data.black_desc_title }}
                        </template>
                        <template v-else>
                            {{ data.cappuccino_desc_title }}
                        </template>
                    </h1>
                    <div class="w-[450px]">
                        <div
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="my-8 h-[4px] w-[60px] rounded-full bg-fr-red lg:my-4 xl:my-8"></div>
                        <p
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="font-medium leading-8"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'text-white'
                                    : 'text-black'
                            ">
                            <template v-if="data.black_desc_explanation">
                                {{ data.black_desc_explanation }}
                            </template>
                            <template v-else>
                                {{ data.cappuccino_desc_explanation }}
                            </template>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
