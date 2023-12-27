<script setup>
import { splitDescriptionBlack, splitDescriptionCappucino } from '@/utils.js';
import { useThemeStore } from '@/stores/user-theme.js';
import { onMounted, ref } from 'vue';
import SplitType from 'split-type';

const themeStore = useThemeStore();
const manifest = ref(null);
const delayAos = ref(0);
const datas = ref([
    {
        image: '/assets/images/desc-1.png',
        title: 'BIJI KOPI PILIHAN TERBAIK',
        desc: 'Biji kopi pilihan memiliki kualitas unggul dengan rasa yang kaya dan aroma yang mendalam. Dipetik secara selektif dari kebun terbaik, biji kopi ini menjanjikan pengalaman kopi yang istimewa dan memikat bagi para pencinta kopi sejati.',
    },
    {
        image: '/assets/images/desc-2.png',
        title: 'DIRACIK OLEH AHLI KOPI',
        desc: 'Kopi blend adalah hasil racikan para ahli kopi yang menggabungkan biji dari berbagai daerah. Dengan resep khusus, kopi blend menciptakan harmoni cita rasa unik, menyajikan pengalaman kopi yang istimewa yang memikat lidah para penikmat kopi.',
    },
    {
        image: '/assets/images/desc-3.png',
        title: 'MENGGUNAKAN TEKNOLOGI CANGGIH',
        desc: 'Teknologi canggih diterapkan oleh para ahli dalam pembuatan produk kopi. Dari penggilingan presisi hingga metode pemanggangan inovatif, penggunaan teknologi terkini memastikan setiap gelas menghadirkan cita rasa kopi terbaik, memuaskan keinginan para penikmat kopi yang menghargai inovasi.',
    },
    {
        image: '/assets/images/desc-4.png',
        title: 'PENGALAMAN KOPI YANG FRESH',
        desc: 'Kopi FresCo menyajikan pengalaman minum kopi baru dengan biji kopi segar. Nikmati keharuman yang melepaskan semangat kopi yang baru dipanggang, serta rasa yang penuh cita, memberikan sensasi minum kopi yang memikat dan memuaskan.',
    },
]);

const splitWords = (group, limit) => {
    let split = new SplitType(manifest.value[group], {
        types: 'lines,words',
    });
    let lines = split.lines;
    let delay = 100;

    for (let index = 0; index < lines.length; index++) {
        let element = manifest.value[group].children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitDescriptionBlack(element, index, delay, limit, group)
            : splitDescriptionCappucino(element, index, delay, limit, group);
    }

    delayAos.value = delay + 50;
};

onMounted(() => {
    splitWords(0, 1);
    splitWords(1, 1);
    splitWords(2, 1);
    splitWords(3, 1);
    splitWords(4, 1);
    splitWords(5, 1);
    splitWords(6, 1);
    splitWords(7, 1);
});
</script>

<template>
    <div class="grid overflow-x-hidden">
        <div v-for="(data, index) in datas" class="grid grid-cols-1 lg:grid-cols-2">
            <div :class="(index + 1) % 2 == 0 && 'order-last'">
                <div class="relative w-full" :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                    <img class="opacity-30 lg:opacity-100" :src="data.image" alt="FresCo" />
                    <!-- Text (Mobile) -->
                    <div class="block absolute w-fullmx-auto top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 lg:hidden">
                        <div
                            class="text-shadow w-[350px] text-[45px] font-bold leading-none sm:w-[600px] sm:text-[90px] md:w-[700px] md:text-[110px]"
                            ref="manifest">
                            {{ data.title }}
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
                                class="font-medium leading-6 sm:leading-8 sm:w-[500px] md:w-[700px]"
                                :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                                {{ data.desc }}
                            </p>
                    </div>
                    <div v-if="index < 3" class="block w-full h-[2px] lg:hidden" :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-darker-red'"></div>
                </div>
            </div>
            <!-- Text (Desktop) -->
            <div
                class="hidden relative h-full w-full z-20 lg:block"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div
                    class="absolute top-1/2 -translate-y-1/2"
                    :class="(index + 1) % 2 == 0 ? 'right-6 xl:-right-48 2xl:-right-24' : '-left-24'">
                    <div
                        class="text-shadow text-[110px] font-bold leading-none lg:w-[450px] lg:text-[78px] xl:text-[90px] xl:w-[630px] 2xl:text-[110px]"
                        ref="manifest">
                        {{ data.title }}
                    </div>
                    <div class="w-[450px]" :class="(index + 1) % 2 == 1 && 'ml-[130px] xl:ml-[170px] 2xl:ml-[200px]'">
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
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            {{ data.desc }}
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
