<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { ref } from 'vue';
import axios from 'axios';

window.axios.defaults.headers.common = {
    // 'X-Requested-With': 'XMLHttpRequest',
    // 'X-CSRF-TOKEN': document
    //     .querySelector('meta[name="csrf-token"]')
    //     .getAttribute('content')
};

const themeStore = useThemeStore();
const arrowAnimation = ref(false);
const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

const sendMessageHandler = async (e) => {
    e.preventDefault();

    await axios
        .post('https://fresco.democube.id/send-message', {
            name: name.value,
            email: email.value,
            subject: subject.value,
            message: message.value,
        }, {
            "Access-Control-Allow-Origin": "*",
        })
        .then((response) => {
            console.log('Message sent successfully:', response.data);
        })
        .catch((error) => {
            console.error('Error sending message:', error);
        });
};
</script>

<template>
    <div
        class="py-10 transition-all duration-700 ease-in-out md:py-20"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="grid grid-cols-1 grid-rows-1 px-4 mx-auto fr-container gap-x-0 gap-y-12 sm:px-0 md:grid-cols-2 md:gap-x-6 md:gap-y-0">
            <!-- Detail Information -->
            <div class="space-y-6">
                <div class="space-y-3">
                    <!-- Title (Separate for refresh AOS Animation) -->
                    <h1
                        v-if="themeStore.theme == 'black'"
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-[30px] font-bold text-white sm:text-[40px] md:text-[50px]">
                        HUBUNGI KAMI
                    </h1>
                    <h1
                        v-else
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        class="text-[30px] font-bold text-fr-green sm:text-[40px] md:text-[50px]">
                        HUBUNGI KAMI
                    </h1>
                    <div
                        v-if="themeStore.theme == 'black'"
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        data-aos-offset="0"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                    <div
                        v-else
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        data-aos-offset="0"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                </div>
                <div class="space-y-6 font-medium">
                    <!-- Detail (Separate for refresh AOS Animation) -->
                    <p
                        v-if="themeStore.theme == 'black'"
                        data-aos="fade-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        ">
                        Kirimkan semua kritik, saran ataupun pertanyaan seputar
                        kopi Fresco dengan menggunakan form kontak disamping.
                    </p>
                    <p
                        v-else
                        data-aos="fade-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        ">
                        Kirimkan semua kritik, saran ataupun pertanyaan seputar
                        kopi Fresco dengan menggunakan form kontak disamping.
                    </p>
                    <div
                        v-if="themeStore.theme == 'black'"
                        data-aos="fade-down"
                        data-aos-delay="500"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        class="space-y-1"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        ">
                        <h1
                            class="font-bold"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'text-fr-yellow'
                                    : 'text-fr-black'
                            ">
                            PT SANTOS JAYA ABADI
                        </h1>
                        <p>0800-1-726867 (SANTOS)</p>
                        <p>Senin s/d Jumat 09.00-17.00</p>
                        <p>Email: santos@kapalapi.co.id</p>
                    </div>
                    <div
                        v-else
                        data-aos="fade-down"
                        data-aos-delay="500"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        class="space-y-1"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        ">
                        <h1
                            class="font-bold"
                            :class="
                                themeStore.theme == 'black'
                                    ? 'text-fr-yellow'
                                    : 'text-fr-black'
                            ">
                            PT SANTOS JAYA ABADI
                        </h1>
                        <p>0800-1-726867 (SANTOS)</p>
                        <p>Senin s/d Jumat 09.00-17.00</p>
                        <p>Email: santos@kapalapi.co.id</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="space-y-6" @submit="sendMessageHandler">
                <div class="space-y-2">
                    <label
                        class="block font-bold"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        "
                        for="name"
                        >Nama (diperlukan)</label
                    >
                    <input
                        v-model="name"
                        class="w-full h-12 p-3 border-2 border-white rounded-lg outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="name" />
                    <div class="pt-px">
                        <p
                            class="inline px-2 py-1 text-sm font-bold text-red-500 bg-white rounded-full">
                            Nama wajib diisi
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <label
                        class="block font-bold"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        "
                        for="email"
                        >Email (diperlukan)</label
                    >
                    <input
                        v-model="email"
                        class="w-full h-12 p-3 border-2 border-white rounded-lg outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="email" />
                    <div class="pt-px">
                        <p
                            class="inline px-2 py-1 text-sm font-bold text-red-500 bg-white rounded-full">
                            Email wajib diisi
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <label
                        class="block font-bold"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        "
                        for="subject"
                        >Subject</label
                    >
                    <input
                        v-model="subject"
                        class="w-full h-12 p-3 border-2 border-white rounded-lg outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="subject" />
                    <div class="pt-px">
                        <p
                            class="inline px-2 py-1 text-sm font-bold text-red-500 bg-white rounded-full">
                            Subject wajib diisi
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <label
                        class="block font-bold"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        "
                        for="message"
                        >Pesan Anda</label
                    >
                    <textarea
                        v-model="message"
                        class="w-full p-3 border-2 border-white rounded-lg outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        id="message"
                        rows="6"></textarea>
                    <div class="pt-px">
                        <p
                            class="inline px-2 py-1 text-sm font-bold text-red-500 bg-white rounded-full">
                            Pesan wajib diisi
                        </p>
                    </div>
                </div>

                <button
                    @mouseenter="arrowAnimation = true"
                    @mouseleave="arrowAnimation = false"
                    class="px-6 py-2 text-xs font-medium text-white transition-all duration-300 ease-in-out border rounded-lg outline-none border-fr-red bg-fr-red hover:border-fr-darker-red hover:bg-fr-darker-red group-hover:border group-hover:border-white md:px-8 md:text-sm">
                    <span>KIRIM</span>
                    <v-icon
                        class="h-4 w-4 stroke-2 py-[2px]"
                        :class="arrowAnimation && 'arrow-slide-fade-right'"
                        name="fa-chevron-right" />
                </button>
            </form>
        </div>
    </div>
</template>

<style scoped>
@keyframes arrow-slide-fade {
    0% {
        opacity: 0;
        transform: translateX(-50%);
    }
    50% {
        opacity: 1;
        transform: translateX(0);
    }
    100% {
        opacity: 0;
        transform: translateX(50%);
    }
}

.arrow-slide-fade-right {
    animation: arrow-slide-fade 1.5s ease-in-out infinite;
}
</style>
