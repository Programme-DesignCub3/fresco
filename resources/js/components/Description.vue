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
    <!-- Black Coffee -->
    <div
      v-if="themeStore.theme == 'black'"
      v-for="(d, i) in data.black_desc_list"
      :key="i"
      class="hidden overflow-x-hidden lg:block">
      <div class="grid grid-cols-2">
        <div
          :class="
            themeStore.theme == 'black'
              ? d.black_desc_position == 'right' && 'order-last'
              : d.cappuccino_desc_position == 'right' && 'order-last'
          ">
          <div class="relative w-full bg-fr-black">
            <!-- Image -->
            <img
              class="aspect-square object-cover object-center"
              width="auto"
              height="auto"
              :src="d.black_desc_image"
              :alt="d.black_desc_title" />
          </div>
        </div>

        <!-- Text -->
        <div
          class="z-20 my-auto flex h-full w-full flex-col justify-center bg-fr-black px-16 transition-all duration-700 ease-in-out"
          :class="d.black_desc_position == 'right' && 'items-end'">
          <div class="w-full space-y-4 2xl:w-[600px]">
            <h2
              class="text-[40px] font-bold leading-none md:text-5xl lg:text-6xl"
              ref="manifest">
              {{ d.black_desc_title }}
            </h2>
            <p
              data-aos="fade-down"
              data-aos-offset="0"
              :data-aos-delay="delayAos"
              class="font-medium leading-8 text-white">
              {{ d.black_desc_explanation }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Cappuccino -->
    <div
      v-if="themeStore.theme == 'cappuccino'"
      v-for="(d, i) in data.cappuccino_desc_list"
      :key="i"
      class="hidden overflow-x-hidden lg:block">
      <div class="grid grid-cols-2">
        <div
          :class="
            themeStore.theme == 'black'
              ? d.black_desc_position == 'right' && 'order-last'
              : d.cappuccino_desc_position == 'right' && 'order-last'
          ">
          <div class="relative w-full bg-fr-yellow">
            <!-- Image -->
            <img
              class="aspect-square object-cover object-center"
              width="auto"
              height="auto"
              :src="d.cappuccino_desc_image"
              :alt="d.cappuccino_desc_title" />
          </div>
        </div>

        <!-- Text -->
        <div
          class="z-20 my-auto flex h-full w-full flex-col justify-center bg-fr-yellow px-16 transition-all duration-700 ease-in-out"
          :class="d.cappuccino_desc_position == 'right' && 'items-end'">
          <div class="w-full space-y-4 2xl:w-[600px]">
            <h2
              class="text-[40px] font-bold leading-none md:text-5xl lg:text-6xl"
              ref="manifest">
              {{ d.cappuccino_desc_title }}
            </h2>
            <p
              data-aos="fade-down"
              data-aos-offset="0"
              :data-aos-delay="delayAos"
              class="font-medium leading-8 text-fr-black">
              {{ d.cappuccino_desc_explanation }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </template>
</template>

<style scoped>
.text-shadow {
  text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
