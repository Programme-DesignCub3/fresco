<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { ref } from 'vue';
import axios from 'axios';

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content'),
};

const themeStore = useThemeStore();
const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

const sendMessageHandler = (e) => {
    e.preventDefault();

    axios
        .post('/api/send-message', {
            name: name.value,
            email: email.value,
            subject: subject.value,
            message: message.value,
        })
        .then((response) => {
            // Handle success response
            console.log('Message sent successfully:', response.data);
        })
        .catch((error) => {
            // Handle error response
            console.error('Error sending message:', error);
        });
    console.log(name.value, email.value, subject.value, message.value);
};
</script>

<template>
    <div
        class="py-20"
        :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
        <div
            class="fr-container mx-auto grid grid-cols-1 grid-rows-1 gap-x-0 gap-y-12 px-8 md:grid-cols-2 md:gap-x-6 md:gap-y-0 md:px-0">
            <!-- Detail Information -->
            <div class="space-y-6">
                <div class="space-y-3">
                    <h1
                        data-aos="flip-down"
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        data-aos-offset="0"
                        class="text-[50px] font-bold"
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-green'
                        ">
                        HUBUNGI KAMI
                    </h1>
                    <div
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        data-aos-offset="0"
                        class="h-[4px] w-16 rounded-full bg-fr-red"></div>
                </div>
                <div
                    data-aos="fade-down"
                    data-aos-delay="300"
                    data-aos-offset="0"
                    class="space-y-6 font-medium">
                    <p
                        :class="
                            themeStore.theme == 'black'
                                ? 'text-white'
                                : 'text-fr-black'
                        ">
                        Kirimkan semua kritik, saran ataupun pertanyaan seputar
                        kopi Fresco dengan menggunakan form kontak disamping.
                    </p>
                    <div
                        data-aos="fade-down"
                        data-aos-delay="400"
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
                        class="h-12 w-full rounded-lg border-2 border-white p-3 outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="name" />
                    <div class="pt-px">
                        <p
                            class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
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
                        class="h-12 w-full rounded-lg border-2 border-white p-3 outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="email" />
                    <div class="pt-px">
                        <p
                            class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
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
                        class="h-12 w-full rounded-lg border-2 border-white p-3 outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        type="text"
                        id="subject" />
                    <div class="pt-px">
                        <p
                            class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
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
                        class="w-full rounded-lg border-2 border-white p-3 outline-none"
                        :class="
                            themeStore.theme == 'black'
                                ? 'bg-transparent text-white'
                                : 'bg-white text-fr-black'
                        "
                        id="message"
                        rows="6"></textarea>
                    <div class="pt-px">
                        <p
                            class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
                            Pesan wajib diisi
                        </p>
                    </div>
                </div>

                <button
                    class="rounded-lg border border-fr-red bg-fr-red px-8 py-2 text-sm font-medium text-white group-hover:border group-hover:border-white">
                    KIRIM >
                </button>
            </form>
        </div>
    </div>
</template>
