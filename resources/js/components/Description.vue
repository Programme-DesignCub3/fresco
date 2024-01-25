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
    });
    let lines = split.lines;
    let delay = 100;

    for (let index = 0; index < lines.length; index++) {
        let element = manifest.value.children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitDescriptionBlack(element, index, delay, 1, manifest.value)
            : splitDescriptionCappuccino(element, index, delay, 1, manifest.value);
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
        });
        let lines = split.lines;
        let delay = 100;

        for (let index = 0; index < lines.length; index++) {
            let element = manifest.value.children[index];
            delay += 100;
            themeStore.theme == 'black'
                ? splitDescriptionBlack(element, index, delay, 1, manifest.value)
                : splitDescriptionCappuccino(element, index, delay, 1, manifest.value);
        }

        delayAos.value = delay + 50;
    }, 10);
});
</script>

<template>
    <div v-if="themeStore.theme != undefined || themeStore.theme != null" class="grid overflow-x-hidden">
        <div
            class="grid grid-cols-1 lg:grid-cols-2">
            <div :class="
                data.black_desc_position
                ?
                data.black_desc_position == 'right' && 'order-last'
                :
                data.cappuccino_desc_position == 'right' && 'order-last'
                ">
                <div
                    class="relative w-full"
                    :class="
                        themeStore.theme == 'black'
                            ? 'bg-fr-black'
                            : 'bg-fr-yellow'">

                    <!-- Image Slot -->
                    <slot v-if="themeStore.theme == 'black'" name="black-desc-image" />
                    <slot v-else name="cappuccino-desc-image" />

                    <!-- Text (Mobile) -->
                    <div
                        class="w-full mx-auto absolute left-1/2 top-1/2 block -translate-x-1/2 -translate-y-1/2 lg:hidden">
                        <div
                            class="text-shadow w-[350px] text-[45px] font-bold leading-none sm:w-[600px] sm:text-[90px] md:w-[700px] md:text-[110px]"
                            ref="manifest">
                            <template v-if="data.black_desc_title">
                                {{ data.black_desc_title }}
                            </template>
                            <template v-else>
                                {{ data.cappuccino_desc_title }}
                            </template>
                        </div>
                        <div
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="my-3 h-[2px] w-[60px] bg-fr-red lg:my-4 xl:my-8"></div>
                        <p
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="font-medium leading-6 text-white sm:w-[500px] sm:leading-8 md:w-[700px]"
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
                    <div
                        v-if="index < 3"
                        class="block h-[2px] w-full bg-fr-yellow lg:hidden"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-fr-yellow'
                                : 'bg-fr-darker-red'
                        "></div>
                </div>
            </div>

            <!-- Text (Desktop) -->
            <div
                class="relative z-20 hidden h-full w-full bg-fr-black lg:block"
                :class="
                    themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'
                ">
                <div
                    class="absolute top-1/2 -translate-y-1/2"
                    :class="
                        data.black_desc_position
                        ?
                        data.black_desc_position == 'right' ? 'right-6 xl:-right-48 2xl:-right-24' : '-left-24'
                        :
                        data.cappuccino_desc_position == 'right' ? 'right-6 xl:-right-48 2xl:-right-24' : '-left-24'
                        ">
                    <div
                        class="text-shadow text-[110px] font-bold leading-none lg:w-[450px] lg:text-[78px] xl:w-[630px] xl:text-[90px] 2xl:text-[110px]"
                        ref="manifest">
                        <template v-if="data.black_desc_title">
                            {{ data.black_desc_title }}
                        </template>
                        <template v-else>
                            {{ data.cappuccino_desc_title }}
                        </template>
                    </div>
                    <div
                        class="w-[450px]"
                        :class="
                            data.black_desc_position
                            ?
                            data.black_desc_position == 'left' && 'ml-[130px] xl:ml-[170px] 2xl:ml-[200px]'
                            :
                            data.cappuccino_desc_position == 'left' && 'ml-[130px] xl:ml-[170px] 2xl:ml-[200px]'
                        ">
                        <div
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="my-8 h-[2px] w-[60px] bg-fr-red lg:my-4 xl:my-8"></div>
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
