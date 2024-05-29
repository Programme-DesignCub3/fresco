<script setup>
import {
  splitDescriptionBlack,
  splitDescriptionCappuccino,
} from '@/misc/utils.js';
import { useThemeStore } from '@/stores/theme-store.js';
import { onMounted, watch, ref } from 'vue';
import { storeToRefs } from 'pinia';
import SplitType from 'split-type';
import AOS from 'aos';

const { data } = defineProps(['data']);
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
  setTimeout(() => {
    for (let i = 0; i < manifest.value.length; i++) {
      splitterText(manifest.value[i]);
    }
  }, 10);
});

window.addEventListener('resize', () => {
  for (let i = 0; i < manifest.value.length; i++) {
    splitterText(manifest.value[i]);
  }
});
</script>

<template>
  <template v-if="themeStore.theme != undefined || themeStore.theme != null">
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
              : d.cappuccino_desc_position == 'right' && 'order-last'
          ">
          <div
            :class="
              themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'
            "
            class="relative w-full">
            <!-- Image -->
            <img
              class="aspect-square w-full object-cover object-center"
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
            themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow',
            d.black_desc_position == 'right' && 'items-end',
            d.cappuccino_desc_position == 'right' && 'items-end',
          ]">
          <div class="w-full space-y-4 2xl:w-[600px]">
            <!-- Title -->
            <h2
              class="text-[40px] font-bold leading-none md:text-5xl lg:text-6xl"
              ref="manifest">
              {{
                themeStore.theme == 'black'
                  ? d.black_desc_title
                  : d.cappuccino_desc_title
              }}
            </h2>
            <!-- Description -->
            <p
              data-aos="fade-down"
              data-aos-offset="0"
              :data-aos-delay="delayAos"
              :class="
                themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
              "
              class="font-medium leading-8">
              {{
                themeStore.theme == 'black'
                  ? d.black_desc_explanation
                  : d.cappuccino_desc_explanation
              }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </template>
</template>
