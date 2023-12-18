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
        types: 'words',
    });
    let words = split.words;
    let delay = 100;

    for (let index = 0; index < words.length; index++) {
        let element = manifest.value[group].children[index];
        delay += 100;
        themeStore.theme == 'black'
            ? splitDescriptionBlack(element, index, delay, limit, group)
            : splitDescriptionCappucino(element, index, delay, limit, group);
    }

    delayAos.value = delay + 100;
};

onMounted(() => {
    splitWords(0, 2);
    splitWords(1, 2);
    splitWords(2, 1);
    splitWords(3, 1);
});
</script>

<template>
    <div class="grid">
        <div v-for="(data, index) in datas" class="grid grid-cols-2">
            <div :class="(index + 1) % 2 == 0 && 'order-last'">
                <img :src="data.image" alt="" />
            </div>
            <div
                class="relative h-full w-full"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div
                    class="absolute top-20"
                    :class="(index + 1) % 2 == 0 ? '-right-24' : '-left-24'">
                    <div
                        class="text-shadow w-[630px] text-[110px] font-bold leading-none"
                        ref="manifest">
                        {{ data.title }}
                    </div>
                    <div class="w-[450px]" :class="(index + 1) % 2 == 1 && 'ml-[200px]'">
                        <div
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos"
                            class="my-8 h-[2px] w-[60px] bg-fr-red"></div>
                        <p
                            data-aos="fade-down"
                            data-aos-offset="0"
                            :data-aos-delay="delayAos + 50"
                            class="font-medium leading-8"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            {{ data.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="grid grid-cols-2">
            <div>
                <img src="/assets/images/desc-1.png" alt="" />
            </div>
            <div
                class="relative h-full w-full"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div class="absolute -left-24 top-20">
                    <h1 class="text-shadow text-[110px] font-bold leading-none">
                        <span :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-green'"
                            >BIJI KOPI
                        </span>
                        <span
                            :class="themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-red'"
                            ><br />PILIHAN<br />
                            TERBAIK</span
                        >
                    </h1>
                    <div class="ml-[200px] w-[450px]">
                        <div class="my-8 h-[2px] w-[60px] bg-fr-red"></div>
                        <p
                            class="font-medium leading-8"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            Biji kopi pilihan memiliki kualitas unggul dengan rasa yang kaya dan
                            aroma yang mendalam. Dipetik secara selektif dari kebun terbaik, biji
                            kopi ini menjanjikan pengalaman kopi yang istimewa dan memikat bagi para
                            pencinta kopi sejati.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="order-last">
                <img src="/assets/images/desc-2.png" alt="" />
            </div>
            <div
                class="relative h-full w-full"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div class="absolute -right-24 top-20">
                    <h1 class="text-shadow text-[110px] font-bold leading-none">
                        <span :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-green'"
                            >DIRACIK OLEH
                        </span>
                        <span
                            :class="themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-red'"
                            ><br />AHLI KOPI</span
                        >
                    </h1>
                    <div class="w-[450px]">
                        <div class="my-8 h-[2px] w-[60px] bg-fr-red"></div>
                        <p
                            class="font-medium leading-8"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            Kopi blend adalah hasil racikan para ahli kopi yang menggabungkan biji
                            dari berbagai daerah. Dengan resep khusus, kopi blend menciptakan
                            harmoni cita rasa unik, menyajikan pengalaman kopi yang istimewa yang
                            memikat lidah para penikmat kopi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div>
                <img src="/assets/images/desc-3.png" alt="" />
            </div>
            <div
                class="relative h-full w-full"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div class="absolute -left-24 top-20">
                    <h1 class="text-shadow text-[110px] font-bold leading-none">
                        <span
                            class="inline-block"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-green'"
                            >MENGGUNAKAN
                        </span>
                        <span
                            :class="themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-red'"
                            ><br />TEKNOLOGI<br />
                            CANGGIH</span
                        >
                    </h1>
                    <div class="ml-[200px] w-[450px]">
                        <div class="my-8 h-[2px] w-[60px] bg-fr-red"></div>
                        <p
                            class="font-medium leading-8"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            Teknologi canggih diterapkan oleh para ahli dalam pembuatan produk kopi.
                            Dari penggilingan presisi hingga metode pemanggangan inovatif,
                            penggunaan teknologi terkini memastikan setiap gelas menghadirkan cita
                            rasa kopi terbaik, memuaskan keinginan para penikmat kopi yang
                            menghargai inovasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="order-last">
                <img src="/assets/images/desc-4.png" alt="" />
            </div>
            <div
                class="relative h-full w-full"
                :class="themeStore.theme == 'black' ? 'bg-fr-black' : 'bg-fr-yellow'">
                <div class="absolute -right-24 top-20">
                    <h1 class="text-shadow text-[110px] font-bold leading-none">
                        <span :class="themeStore.theme == 'black' ? 'text-white' : 'text-fr-green'"
                            >PENGALAMAN
                        </span>
                        <span
                            :class="themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-red'"
                            ><br />KOPI YANG<br />
                            FRESH</span
                        >
                    </h1>
                    <div class="w-[450px]">
                        <div class="my-8 h-[2px] w-[60px] bg-fr-red"></div>
                        <p
                            class="font-medium leading-8"
                            :class="themeStore.theme == 'black' ? 'text-white' : 'text-black'">
                            Kopi FresCo menyajikan pengalaman minum kopi baru dengan biji kopi
                            segar. Nikmati keharuman yang melepaskan semangat kopi yang baru
                            dipanggang, serta rasa yang penuh cita, memberikan sensasi minum kopi
                            yang memikat dan memuaskan.
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
