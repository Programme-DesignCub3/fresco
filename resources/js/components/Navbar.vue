<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { useIdle } from '@vueuse/core';
import { ref } from 'vue';

const { data, type } = defineProps(['data', 'type']);
const { idle } = useIdle(1000);
const url = window.location;
const themeStore = useThemeStore();
const scroll = ref();
const socials = ref([
  {
    name: 'facebook',
    icon: 'fa-facebook-f',
    alias: data.facebook_alias,
    link: data.facebook_link,
  },
  {
    name: 'instagram',
    icon: 'fa-instagram',
    alias: data.instagram_alias,
    link: data.instagram_link,
  },
  {
    name: 'twitter',
    icon: 'fa-twitter',
    alias: data.x_alias,
    link: data.x_link,
  },
  {
    name: 'tiktok',
    icon: 'fa-tiktok',
    alias: data.tiktok_alias,
    link: data.tiktok_link,
  },
  {
    name: 'youtube',
    icon: 'fa-youtube',
    alias: data.youtube_alias,
    link: data.youtube_link,
  },
]);

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
    class="navigation"
    id="navigation-sticky"
    :class="[
      themeStore.theme,
      url.pathname == '/'
        ? scroll > 20
          ? themeStore.theme == 'black'
            ? 'nav-black'
            : 'nav-cappuccino'
          : 'bg-transparent'
        : url.pathname !== '/'
          && scroll > 20
            ? themeStore.theme == 'black'
              ? 'nav-black'
              : 'nav-cappuccino'
            : themeStore.theme == 'black'
              ? 'nav-black'
              : 'nav-cappuccino',
    ]">
    <!-- Navigation Wrapper -->
    <div class="navigation-wrapper">
      <!-- Logo Image -->
      <div class="nav-logo">
        <button v-if="url.pathname == '/'" @click="changeThemeHandler">
          <img
            width="auto"
            height="auto"
            src="/assets/images/logo.png"
            alt="Fresco" />
        </button>
        <a v-else href="/">
          <img
            width="auto"
            height="auto"
            src="/assets/images/logo.png"
            alt="Fresco" />
        </a>
      </div>
      <!-- Navbar Toggler (Mobile) -->
      <div class="nav-toggle menu cross menu--2">
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
      <!-- Nav List & (Navigation Mobile) -->
      <div class="nav-list-wrapper" :class="themeStore.openMenu && 'opened'">
        <ul class="nav-list">
          <li class="nav-item" :class="url.pathname == '/' && 'nav-active'">
            <a class="nav-link longer" href="/">BERANDA</a>
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/produk' && 'nav-active'">
            <a class="nav-link longer" href="/produk">ENAKNYA NGOPI FRESCO</a>
          </li>
          <li
            class="nav-item"
            :class="
              url.pathname == '/artikel' || url.pathname.startsWith('/artikel/')
                ? 'nav-active'
                : ''
            ">
            <a class="nav-link longer" href="/artikel">ENAKIN TIAP MOMEN</a>
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/aktivitas' && 'nav-active'">
            <a class="nav-link longer" href="/aktivitas">SERBA-SERBI FRESCO</a>
          </li>
          <li
            class="nav-item"
            :class="url.pathname == '/hubungi' && 'nav-active'">
            <a class="nav-link longer" href="/hubungi">HUBUNGI FRESCO</a>
          </li>
        </ul>
        <!-- Social Media -->
        <div class="nav-socmed-list">
          <a
            v-for="social in socials"
            class="nav-socmed-item"
            :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-green'"
            :href="social.link ? social.link : '#'"
            target="_blank">
            <v-icon
              class="h-9 w-9 pt-2"
              :class="
                themeStore.theme == 'black' ? 'text-fr-black' : 'text-white',
                social.name == 'facebook' && 'h-9 w-9 pt-2',
                social.name == 'instagram' && 'h-9 w-9 p-1.5',
                social.name == 'twitter' && 'h-9 w-9 p-1.5',
                social.name == 'tiktok' && 'h-9 w-9 p-1.5',
                social.name == 'youtube' && 'h-9 w-9 p-1.5'
              "
              :name="social.icon" />
          </a>
        </div>
      </div>
    </div>

    <!-- Theme Changer -->
    <!-- (Cappuccino) -->
    <Transition name="slide" mode="out-in">
      <div
        :class="idle ? '-right-40' : 'right-4'"
        class="float-animate theme-changer"
        v-if="themeStore.theme == 'black'">
        <div class="is-cappuccino" @click="enableCustomLayout('cappuccino')">
          <img
            width="auto"
            height="auto"
            src="/assets/images/cappuccino-toggler.png"
            alt="Cappuccino Toggler"
            class="max-w-full" />
        </div>
      </div>
    </Transition>
    <!-- (Black) -->
    <Transition name="slide" mode="out-in">
      <div
        :class="idle ? '-right-40' : 'right-4'"
        class="float-animate theme-changer"
        v-if="themeStore.theme == 'cappuccino'">
        <div class="is-black" @click="enableCustomLayout('black')">
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
  @media screen and (min-width: 768px) {
    animation: float-animation 3s ease-in-out infinite;
    &:hover {
      animation-play-state: paused;
    }
  }
}

.slide-leave-active {
  animation: none;
  @media screen and (min-width: 768px) {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse;
    display: none;
  }
}

.slide-enter-active {
  animation: none;
  @media screen and (min-width: 768px) {
    animation: slide-in-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
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
</style>
