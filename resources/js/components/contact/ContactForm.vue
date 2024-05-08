<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { VueRecaptcha } from 'vue-recaptcha';
import { ref } from 'vue';
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
  <div
    class="py-10 transition-all duration-700 ease-in-out md:py-20"
    :class="themeStore.theme == 'black' ? 'bg-black' : 'bg-fr-yellow'">
    <div
      class="fr-container mx-auto grid grid-cols-1 grid-rows-1 gap-x-0 gap-y-12 px-4 sm:px-0 md:grid-cols-2 md:gap-x-6 md:gap-y-0">
      <!-- Detail Information -->
      <div class="space-y-6">
        <div class="space-y-3">
          <!-- Double element for refresh AOS Animation -->
          <h2
            v-if="themeStore.theme == 'black'"
            data-aos="flip-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            class="text-[30px] font-bold text-white sm:text-[40px] md:text-[50px]">
            HUBUNGI KAMI
          </h2>
          <h2
            v-else
            data-aos="flip-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            class="text-[30px] font-bold text-fr-green sm:text-[40px] md:text-[50px]">
            HUBUNGI KAMI
          </h2>

          <!-- Double element for refresh AOS Animation -->
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
          <!-- Double element for refresh AOS Animation -->
          <p
            v-if="themeStore.theme == 'black'"
            data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-offset="0"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            ">
            Kirimkan semua kritik, saran ataupun pertanyaan seputar kopi Fresco
            dengan menggunakan form kontak disamping.
          </p>
          <p
            v-else
            data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-offset="0"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            ">
            Kirimkan semua kritik, saran ataupun pertanyaan seputar kopi Fresco
            dengan menggunakan form kontak disamping.
          </p>

          <!-- Double element for refresh AOS Animation -->
          <div
            v-if="themeStore.theme == 'black'"
            data-aos="fade-down"
            data-aos-delay="500"
            data-aos-duration="1000"
            data-aos-offset="0"
            class="space-y-1"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            ">
            <h2
              class="font-bold"
              :class="
                themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-black'
              ">
              PT SANTOS JAYA ABADI
            </h2>
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
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            ">
            <h3
              class="font-bold"
              :class="
                themeStore.theme == 'black' ? 'text-fr-yellow' : 'text-fr-black'
              ">
              PT SANTOS JAYA ABADI
            </h3>
            <p>{{ data.phone_alias }} (SANTOS)</p>
            <p>Senin s/d Jumat 09.00-17.00</p>
            <p>Email: {{ data.email_alias }}</p>
          </div>
        </div>
      </div>

      <!-- Form -->
      <form class="space-y-6" @submit="sendMessageHandler">
        <!-- Name -->
        <div class="space-y-2">
          <label
            class="block font-bold"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            "
            for="name"
            >Nama <span class="font-medium text-fr-red">*</span></label
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
            id="name"
            minlength="3"
            required />
          <!-- Error Message -->
          <div v-if="errMessage">
            <p
              v-if="errMessage.name"
              class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
              {{ errMessage.name[0] }}
            </p>
          </div>
        </div>

        <!-- Email -->
        <div class="space-y-2">
          <label
            class="block font-bold"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            "
            for="email"
            >Email <span class="font-medium text-fr-red">*</span></label
          >
          <input
            v-model="email"
            class="h-12 w-full rounded-lg border-2 border-white p-3 outline-none"
            :class="
              themeStore.theme == 'black'
                ? 'bg-transparent text-white'
                : 'bg-white text-fr-black'
            "
            type="email"
            id="email"
            required />
          <!-- Error Message -->
          <div v-if="errMessage">
            <p
              v-if="errMessage.email"
              class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
              {{ errMessage.email[0] }}
            </p>
          </div>
        </div>

        <!-- Subject -->
        <div class="space-y-2">
          <label
            class="block font-bold"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            "
            for="subject"
            >Subject <span class="font-medium text-fr-red">*</span></label
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
            id="subject"
            minlength="3"
            required />
          <!-- Error Message -->
          <div v-if="errMessage">
            <p
              v-if="errMessage.subject"
              class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
              {{ errMessage.subject[0] }}
            </p>
          </div>
        </div>

        <!-- Message -->
        <div class="space-y-2">
          <label
            class="block font-bold"
            :class="
              themeStore.theme == 'black' ? 'text-white' : 'text-fr-black'
            "
            for="message"
            >Pesan Anda <span class="font-medium text-fr-red">*</span></label
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
            rows="6"
            required></textarea>
          <!-- Error Message -->
          <div v-if="errMessage">
            <p
              v-if="errMessage.message"
              class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
              {{ errMessage.message[0] }}
            </p>
          </div>
        </div>

        <!-- Recaptcha -->
        <div class="space-y-2">
          <VueRecaptcha
            class="full-width"
            :sitekey="siteKey"
            :load-recaptcha-script="true"
            @verify="handleSuccess"
            @error="handleError"
            @expired="handleExpired">
          </VueRecaptcha>
          <!-- Error Message -->
          <div v-if="errMessage">
            <p
              v-if="errMessage['g-recaptcha-response']"
              class="inline rounded-full bg-white px-2 py-1 text-sm font-bold text-red-500">
              {{ errMessage['g-recaptcha-response'][0] }}
            </p>
          </div>
        </div>

        <!-- Submit Button -->
        <button
          :disabled="sendCooldown || sendDisabled"
          :class="
            sendCooldown || (sendDisabled && 'cursor-not-allowed opacity-50')
          "
          class="rounded-lg border border-fr-red bg-fr-red px-6 py-2 text-xs font-medium text-white outline-none transition-all duration-300 ease-in-out hover:border-fr-darker-red hover:bg-fr-darker-red group-hover:border group-hover:border-white md:px-8 md:text-sm">
          <template v-if="sendCooldown == false">
            <span>KIRIM</span>
            <v-icon class="h-4 w-4 stroke-2 py-[2px]" name="fa-chevron-right" />
          </template>
          <template v-else>
            <svg
              class="mx-3 h-5 w-5 animate-spin text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24">
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </template>
        </button>

        <!-- Notification Success -->
        <Transition name="faded" mode="out-in">
          <div
            v-show="toast"
            class="box-shadow fixed left-1/2 top-24 flex w-[260px] -translate-x-1/2 gap-2 rounded-lg bg-green-600 px-4 py-4 text-white sm:w-auto md:top-48 lg:top-28">
            <v-icon class="h-6 w-6" name="fa-check-circle" />
            <p>{{ toastMessage }}</p>
          </div>
        </Transition>
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

.arrow-slide-fade-right {
  animation: arrow-slide-fade 1.5s ease-in-out infinite;
}

.box-shadow {
  box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
  -webkit-box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
}
</style>
