<script setup>
import { splitBlack, splitCappucino } from '@/utils.js';
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, ref } from 'vue';
import SplitType from 'split-type';

const themeStore = useThemeStore();
const manifest = ref(null);
const delayAos = ref(0);

onMounted(() => {
    let split = new SplitType(manifest.value, { types: 'words' });
    let words = split.words;
    let delay = 100;

    for (let index = 0; index < words.length; index++) {
        let element = manifest.value.children[index];
        console.log(element);
        delay += 100;
        themeStore.theme == 'black'
            ? splitBlack(element, index, delay, 2)
            : splitCappucino(element, index, delay, 4);
    }

    delayAos.value = delay + 100;
});
</script>

<template>
    <div class="introduction overflow-x-hidden py-24" :class="themeStore.theme">
        <div class="fr-container mx-auto w-full px-10 md:px-0">
            <div class="flex flex-col md:relative md:flex-row">
                <div class="mb-10 md:mb-0 md:w-1/4">
                    <!-- Title -->
                    <template v-if="themeStore.theme == 'black'">
                        <div id="black-anchor">
                            <div
                                class="text-[60px] font-bold leading-none sm:text-[80px] md:text-[100px]"
                                ref="manifest">
                                FRESH KOPINYA, JELAS LEBIH ENAK
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="relative" id="cappucino-anchor">
                            <div
                                class="text-[60px] font-bold leading-none sm:text-[80px] md:text-[130px]"
                                ref="manifest">
                                STRONG CREAMY SMOOTH CRUNCHY PERFECTO!
                            </div>
                            <div
                                data-aos="fade-in"
                                :data-aos-delay="delayAos"
                                data-aos-duration="1200"
                                data-aos-anchor="#cappucino-anchor"
                                data-aos-offset="100"
                                class="text-stroke absolute -left-1.5 -right-1.5 -top-1.5 text-[60px] font-bold leading-none text-white sm:text-[80px] md:text-[130px]">
                                STRONG CREAMY SMOOTH CRUNCHY PERFECTO!
                            </div>
                        </div>
                    </template>
                </div>
                <!-- Image -->
                <div
                    v-if="themeStore.theme == 'black'"
                    class="bg-glow-yellow w-full md:absolute md:-right-16 md:bottom-0 md:w-3/4 md:scale-[1.3] lg:top-32 xl:-right-3 xl:top-16 xl:scale-[1.5] 2xl:top-8">
                    <img
                        data-aos="zoom-in"
                        data-aos-delay="150"
                        class="w-full"
                        src="/assets/images/black-coffee-width.png"
                        alt="Black Coffee" />
                </div>
                <div v-else class="flex w-full flex-grow justify-end md:relative md:w-1/4">
                    <img
                        data-aos="zoom-in"
                        data-aos-delay="150"
                        class="w-[550px]"
                        src="/assets/images/cappuccino-width.png"
                        alt="Cappuccino" />
                </div>
            </div>
            <!-- Description -->
            <div
                :class="
                    themeStore.theme == 'black'
                        ? 'mt-5 overflow-y-hidden px-0 md:mt-28 xl:mt-36 2xl:mt-48'
                        : 'mt-8 overflow-y-hidden'
                ">
                <p
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-offset="0"
                    class="text-center font-medium leading-8"
                    :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                    Minum kopi telah menjadi tradisi yang sudah ada sejak puluhan tahun yang lalu di
                    Indonesia. Tradisi tersebut dijaga dengan baik oleh Kapal Api yang selalu
                    membuat produk dengan biji kopi pilihan. Salah satunya adalah Kapal Api Fresco,
                    yang dibuat dengan perpaduan 100% biji kopi arabica dan robusta berkualitas
                    tinggi. Aroma dan kualitas setiap seduhan Kapal Api Fresco memberikan sensasi
                    minum kopi yang jelas lebih enak.
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-glow-yellow {
    background: rgb(253, 198, 75);
    background: radial-gradient(circle, rgba(253, 198, 75, 1) 5%, rgba(0, 212, 255, 0) 45%);
}

.text-stroke {
    -webkit-text-stroke: 1px white;
    -webkit-text-fill-color: transparent;
}
</style>
