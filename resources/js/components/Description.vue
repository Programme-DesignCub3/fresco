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

onMounted(() => {
    splitterText(manifest.value);

    setTimeout(() => {
        AOS.refresh();
    }, 10);
});

watch(theme, () => {
    setTimeout(() => {
        splitterText(manifest.value);
    }, 10);
});
</script>

<template>
    <div
        v-if="themeStore.theme != undefined || themeStore.theme != null"
        class="hidden overflow-x-hidden lg:block">
        <div class="grid grid-cols-2">
            <div
                :class="
                    themeStore.theme == 'black'
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

            <!-- Text Black Coffee -->
            <div
                v-if="themes == 'black' && themeStore.theme == 'black'"
                class="z-20 flex flex-col justify-center w-full h-full px-16 my-auto transition-all duration-700 ease-in-out bg-fr-black"
                :class="data.black_desc_position == 'right' && 'items-end'">
                <div class="w-full 2xl:w-[600px]">
                    <h1
                        class="text-shadow text-[40px] font-bold leading-none sm:text-[50px] xl:text-[60px] 2xl:text-[80px]"
                        ref="manifest">
                        {{ data.black_desc_title }}
                    </h1>
                    <div
                        data-aos="fade-down"
                        data-aos-offset="0"
                        :data-aos-delay="delayAos"
                        class="my-4 h-[4px] w-[60px] rounded-full bg-fr-red"></div>
                    <p
                        data-aos="fade-down"
                        data-aos-offset="0"
                        :data-aos-delay="delayAos"
                        class="font-medium leading-8 text-white">
                        {{ data.black_desc_explanation }}
                    </p>
                </div>
            </div>

            <!-- Text Cappuccino -->
            <div
                v-if="
                    themes == 'cappuccino' && themeStore.theme == 'cappuccino'
                "
                class="z-20 flex flex-col justify-center w-full h-full px-16 my-auto transition-all duration-700 ease-in-out bg-fr-yellow"
                :class="data.cappuccino_desc_position == 'right' && 'items-end'">
                <div class="w-full 2xl:w-[600px]">
                    <h1
                        class="text-shadow text-[40px] font-bold leading-none sm:text-[50px] xl:text-[60px] 2xl:text-[80px]"
                        ref="manifest">
                        {{ data.cappuccino_desc_title }}
                    </h1>
                    <div
                        data-aos="fade-down"
                        data-aos-offset="0"
                        :data-aos-delay="delayAos"
                        class="my-4 h-[4px] w-[60px] rounded-full bg-fr-red"></div>
                    <p
                        data-aos="fade-down"
                        data-aos-offset="0"
                        :data-aos-delay="delayAos"
                        class="font-medium leading-8 text-black">
                        {{ data.cappuccino_desc_explanation }}
                    </p>
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
