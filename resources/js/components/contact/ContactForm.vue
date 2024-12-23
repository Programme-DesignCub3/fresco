<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { VueRecaptcha } from 'vue-recaptcha';
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
import Loading from '@/assets/Loading.vue';
import axios from 'axios';

const { data } = defineProps(['data']);
const themeStore = useThemeStore();
const errMessage = ref();
const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

// Recaptcha Credentials
const siteKey = ref('6LdoQYgpAAAAAJDbf3AD3UNDhkkX-BximObmo9TX');
const token = ref(null);
const toast = ref(false);
const toastMessage = ref(null);
const sendCooldown = ref(false);
const sendDisabled = ref(false);

const handleSuccess = (e) => {
    token.value = e;
    sendCooldown.value = false;
    sendDisabled.value = false;
};
const handleError = () => {
    sendDisabled.value = true;
};
const handleExpired = () => {
    sendDisabled.value = true;
};

const sendMessageHandler = async (e) => {
    e.preventDefault();
    sendCooldown.value = true;

    await axios
        .post('/send-message', {
            name: name.value,
            email: email.value,
            subject: subject.value,
            message: message.value,
            'g-recaptcha-response': token.value,
        })
        .then((response) => {
            name.value = null;
            email.value = null;
            subject.value = null;
            message.value = null;
            token.value = null;
            toast.value = true;
            errMessage.value = null;
            toastMessage.value = response.data.message;
            sendCooldown.value = false;
            window.grecaptcha.reset();

            setTimeout(() => {
                toast.value = false;
            }, 5000);
        })
        .catch((error) => {
            sendCooldown.value = false;
            errMessage.value = error.response.data.errors;
        });
};
</script>

<template>
    <div class="contact-form" :class="themeStore.theme">
        <div class="contact-form-wrapper">
            <!-- Detail Information -->
            <div class="contact-form-information">
                <!-- Page Title -->
                <h2 data-aos="flip-down" data-aos-delay="400" data-aos-duration="1000" class="page-title"
                    :class="themeStore.theme">
                    HUBUNGI KAMI
                </h2>
                <div class="space-y-4">
                    <!-- Description -->
                    <p data-aos="fade-down" data-aos-delay="400" data-aos-duration="1000" data-aos-offset="0">
                        Kirimkan semua kritik, saran ataupun pertanyaan seputar
                        kopi Fresco dengan menggunakan form kontak disamping.
                    </p>
                    <!-- Contact Information -->
                    <div data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000" data-aos-offset="0"
                        class="space-y-1">
                        <h3>PT SANTOS JAYA ABADI</h3>
                        <div class="flex flex-col gap-y-2">
                            <div class="flex items-center gap-x-2">
                                <Icon class="w-6 h-6 text-fr-dark dark:text-white" icon="mdi:phone" />
                                <a class="w-max" :href="`tel:${data.phone_link}`">{{ data.phone_alias }}</a>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <Icon class="w-6 h-6 text-fr-dark dark:text-white" icon="ri:whatsapp-fill" />
                                <a class="w-max" :href="data.whatsapp_link" target="_blank">{{ data.whatsapp_alias }}</a>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <Icon class="w-6 h-6 text-fr-dark dark:text-white" icon="foundation:mail" />
                                <a class="w-max" :href="`mailto:${data.email_link}`">{{ data.email_alias }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Form -->
            <form class="space-y-3 md:space-y-6" @submit="sendMessageHandler">
                <!-- Form Name -->
                <div class="space-y-2">
                    <label for="name">Nama
                        <span class="font-medium text-fr-red">*</span></label>
                    <input v-model="name" type="text" id="name" minlength="3" maxlength="255" required />
                    <div v-if="errMessage">
                        <p v-if="errMessage.name" class="contact-error-message">
                            {{ errMessage.name[0] }}
                        </p>
                    </div>
                </div>
                <!-- Form Email -->
                <div class="space-y-2">
                    <label for="email">Email
                        <span class="font-medium text-fr-red">*</span></label>
                    <input v-model="email" type="email" id="email" maxlength="255" required />
                    <div v-if="errMessage">
                        <p v-if="errMessage.email" class="contact-error-message">
                            {{ errMessage.email[0] }}
                        </p>
                    </div>
                </div>
                <!-- Form Subject -->
                <div class="space-y-2">
                    <label for="subject">Subject
                        <span class="font-medium text-fr-red">*</span></label>
                    <input v-model="subject" type="text" id="subject" maxlength="255" minlength="3" required />
                    <div v-if="errMessage">
                        <p v-if="errMessage.subject" class="contact-error-message">
                            {{ errMessage.subject[0] }}
                        </p>
                    </div>
                </div>
                <!-- Form Message -->
                <div class="space-y-2">
                    <label for="message">Pesan Anda
                        <span class="font-medium text-fr-red">*</span></label>
                    <textarea v-model="message" id="message" rows="6" required></textarea>
                    <div v-if="errMessage">
                        <p v-if="errMessage.message" class="contact-error-message">
                            {{ errMessage.message[0] }}
                        </p>
                    </div>
                </div>
                <!-- Form Recaptcha -->
                <div class="space-y-2">
                    <VueRecaptcha class="full-width" :sitekey="siteKey" :load-recaptcha-script="true"
                        @verify="handleSuccess" @error="handleError" @expired="handleExpired">
                    </VueRecaptcha>
                    <div v-if="errMessage">
                        <p v-if="errMessage['g-recaptcha-response']" class="contact-error-message">
                            {{ errMessage['g-recaptcha-response'][0] }}
                        </p>
                    </div>
                </div>
                <!-- Submit Button -->
                <button :disabled="sendCooldown || sendDisabled" :class="sendCooldown ||
                    (sendDisabled && 'cursor-not-allowed opacity-50')
                    " class="button red">
                    <template v-if="sendCooldown == false">
                        <span>KIRIM</span>
                        <Icon class="inline-block h-4 w-4 stroke-2 pb-1 pl-1 py-[2px]" icon="fa-solid:chevron-right" />
                    </template>
                    <template v-else>
                        <Loading />
                    </template>
                </button>
                <!-- Notification Success -->
                <Transition name="faded" mode="out-in">
                    <div v-show="toast" class="toast green">
                        <Icon class="h-6 w-6" icon="fa-solid:check-circle" />
                        <p>{{ toastMessage }}</p>
                    </div>
                </Transition>
            </form>
        </div>
    </div>
</template>

<style scoped>
@keyframes faded {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.faded-leave-active {
    animation: faded 1s reverse;
}

.faded-enter-active {
    animation: faded 1s both;
}
</style>
