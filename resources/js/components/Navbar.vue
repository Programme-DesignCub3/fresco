<script setup>
import { useThemeStore } from '@/stores/user-theme.js';
import { ref } from 'vue';

const { data, type } = defineProps(['data', 'type']);
const url = window.location;
const themeStore = useThemeStore();
const scroll = ref();

const enableCustomLayout = (theme) => themeStore.setTheme(theme);

const changeThemeHandler = () => {
  themeStore.setTheme(null);
  themeStore.setOpenMenu(false);
};

window.addEventListener('scroll', () => {
  scroll.value = window.scrollY;
});
</script>

<template>
  <header
    v-if="themeStore.theme != undefined || themeStore.theme != null"
    class="navigation fixed z-[9999] transition-all duration-700 ease-in-out"
    id="navigation-sticky"
    :class="[
      themeStore.theme,
      url.pathname == '/'
        ? scroll > 20
          ? themeStore.theme == 'black'
            ? 'bg-transparent md:bg-black'
            : 'bg-transparent md:bg-fr-yellow'
          : 'bg-transparent'
        : themeStore.theme == 'black'
          ? 'bg-transparent md:bg-black'
          : 'bg-transparent md:bg-fr-yellow',
    ]">
    <div
      class="fr-container relative mx-auto flex flex-row justify-end md:flex-col md:gap-4 md:text-center lg:flex-row">
      <!-- Logo Image -->
      <div
        class="absolute left-4 top-4 z-[999] sm:left-0 md:static lg:absolute lg:-top-3">
        <button v-if="url.pathname == '/'" @click="changeThemeHandler">
          <img
            width="auto"
            height="auto"
            class="w-[140px] md:w-[160px] lg:w-auto"
            src="/assets/images/logo.png"
            alt="FresCo Logo" />
        </button>
        <a v-else href="/">
          <img
            width="auto"
            height="auto"
            class="w-[130px] md:mx-auto md:w-[160px] lg:w-auto"
            src="/assets/images/logo.png"
            alt="FresCo Logo" />
        </a>
      </div>

      <!-- Navbar Toggler (Mobile) -->
      <div
        class="menu cross menu--2 absolute right-4 top-4 z-[999] h-[50px] w-[50px] rounded-full bg-fr-red sm:right-0 md:hidden">
        <label class="h-[50px] w-[50px] rounded-full">
          <input
            @change="themeStore.setOpenMenu(!themeStore.openMenu)"
            type="checkbox" />
          <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="30" />
            <path
              class="line--1 stroke-fr-yellow"
              d="M0 70l28-28c2-2 2-2 7-2h64" />
            <path class="line--2 stroke-fr-yellow" d="M0 50h99" />
            <path
              class="line--3 stroke-fr-yellow"
              d="M0 30l28 28c2 2 2 2 7 2h64" />
          </svg>
        </label>
      </div>

      <!-- Nav List -->
      <div
        class="fixed inset-0 items-center justify-center transition-all duration-300 ease-in-out md:static md:block md:bg-transparent"
        :class="[
          themeStore.openMenu ? 'block' : 'hidden',
          themeStore.openMenu && 'reveal-menu',
          themeStore.theme == 'black' ? 'bg-fr-darker-red' : 'bg-fr-yellow',
        ]">
        <ul
          class="flex flex-col items-center gap-8 px-8 pb-2 pt-36 md:flex-row md:items-start md:gap-4 md:px-0 md:pt-0">
          <li class="nav-item" :class="url.pathname == '/' && 'nav-active'">
            <a
              class="block h-full text-start text-[24px] md:h-[40px] md:text-center md:text-[16px]"
              href="/"
              >BERANDA</a
            >
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/produk' && 'nav-active'">
            <a
              class="block text-start text-[24px] md:text-center md:text-[16px]"
              href="/produk"
              >ENAKNYA NGOPI FRESCO</a
            >
          </li>
          <li
            class="nav-item"
            :class="
              url.pathname == '/artikel' || url.pathname.startsWith('/artikel/')
                ? 'nav-active'
                : ''
            ">
            <a
              class="block text-start text-[24px] md:text-center md:text-[16px]"
              href="/artikel"
              >ENAKIN TIAP MOMEN</a
            >
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/aktivitas' && 'nav-active'">
            <a
              class="block text-start text-[24px] md:text-center md:text-[16px]"
              href="/aktivitas"
              >SERBA-SERBI FRESCO</a
            >
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/hubungi' && 'nav-active'">
            <a
              class="block text-start text-[24px] md:h-[40px] md:text-center md:text-[16px]"
              href="/hubungi"
              >HUBUNGI FRESCO</a
            >
          </li>
        </ul>
        <div class="mt-8 flex gap-x-1.5 px-8 md:hidden">
          <!-- Facebook -->
          <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.facebook_link ? data.facebook_link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 pt-2"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              "
              name="fa-facebook-f" />
          </a>

          <!-- Instagram -->
          <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.instagram_link ? data.instagram_link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 p-1"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              "
              name="fa-instagram" />
          </a>

          <!-- Twitter -->
          <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.x_link ? data.x_link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 p-1.5"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              "
              name="fa-twitter" />
          </a>

          <!-- Tiktok -->
          <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.tiktok_link ? data.tiktok_link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 p-1.5"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              "
              name="fa-tiktok" />
          </a>

          <!-- Youtube -->
          <a
            class="box-shadow h-9 w-9 rounded-lg transition-all duration-100 ease-in-out hover:scale-110"
            :class="
              themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'
            "
            :href="data.youtube_link ? data.youtube_link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 p-1.5"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white'
              "
              name="fa-youtube" />
          </a>
        </div>
      </div>
    </div>

    <!-- Theme Changer to Cappuccino -->
    <Transition name="slide" mode="out-in">
      <div
        class="float-animate fixed bottom-4 right-4 z-[99999] cursor-pointer overflow-hidden rounded-full border-[5px] border-white shadow-lg transition-transform hover:scale-105 md:absolute md:bottom-auto md:right-10 md:top-5 xl:bottom-auto xl:right-24 xl:top-2/4"
        v-if="themeStore.theme == 'black'">
        <div
          class="flex h-20 w-20 items-center justify-center bg-fr-yellow p-2 lg:h-24 lg:w-24"
          @click="enableCustomLayout('cappuccino')">
          <img
            width="auto"
            height="auto"
            src="/assets/images/cappuccino-toggler.png"
            alt="Cappuccino Toggler"
            class="max-w-full" />
        </div>
      </div>
    </Transition>

    <!-- Theme Changer to Black Coffee -->
    <Transition name="slide" mode="out-in">
      <div
        class="float-animate fixed bottom-4 right-4 z-[99999] cursor-pointer overflow-hidden rounded-full border-[5px] border-white shadow-lg transition-transform hover:scale-105 md:absolute md:bottom-auto md:right-10 md:top-5 xl:bottom-auto xl:right-24 xl:top-2/4"
        v-if="themeStore.theme == 'cappuccino'">
        <div
          class="flex h-20 w-20 items-center justify-center bg-[#3b2314] p-3 lg:h-24 lg:w-24"
          @click="enableCustomLayout('black')">
          <img
            width="auto"
            height="auto"
            src="/assets/images/black-toggler.png"
            alt="Black Coffee Toggler"
            class="max-w-full" />
        </div>
      </div>
    </Transition>
  </header>
</template>

<style scoped lang="scss">
@keyframes revealMenu {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes slide-in-top {
  0% {
    -webkit-transform: translateY(-1000px);
    transform: translateY(-1000px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes float-animation {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
  100% {
    transform: translateY(0);
  }
}

circle {
  fill: #fff3;
  opacity: 0;
}

label:hover circle {
  opacity: 1;
}

.cross input:checked + svg {
  .line--1,
  .line--3 {
    --length: 22.627416998;
  }
  .line--2 {
    --length: 0;
  }
}

input {
  display: none;
}

label {
  display: block;
  cursor: pointer;
  position: absolute;
}

.menu--2 label {
  bottom: 0;
}

path {
  fill: none;
  stroke-width: 6;
  stroke-linecap: round;
  stroke-linejoin: round;
  --length: 36;
  --offset: -38;
  stroke-dasharray: var(--length) var(--total-length);
  stroke-dashoffset: var(--offset);
  transition: all 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.menu--2 {
  .line--1,
  .line--3 {
    --total-length: 111.22813415527344;
    --offset: -45.228134;
  }
  .line--2 {
    --total-length: 99;
    --offset: -33.228134;
  }
  input:checked + svg {
    path {
      transform: translateX(30px);
    }
    .line--1,
    .line--3 {
      --offset: -16.9705627485;
    }
    .line--2 {
      --offset: -20;
    }
  }
}

.float-animate {
  animation: none;
}

.slide-leave-active {
  animation: none;
}

.slide-enter-active {
  animation: none;
}

.reveal-menu {
  animation: revealMenu 0.5s ease-in-out forwards;
}

@media (min-width: 768px) {
  .float-animate {
    animation: float-animation 3s ease-in-out infinite;
  }

  .float-animate:hover {
    animation-play-state: paused;
  }

  .slide-leave-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse;
    display: none;
  }

  .slide-enter-active {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
  }
}
</style>
