<script setup>
import { useThemeStore } from '@/stores/theme-store.js';
import { useNavStore } from '@/stores/nav-store.js';
import { ref } from 'vue';

const { data, type } = defineProps(['data', 'type']);
const url = window.location;
const themeStore = useThemeStore();
const navStore = useNavStore();
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
  <!-- Navigation -->
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
            alt="FresCo" />
        </button>
        <a v-else href="/">
          <img
            width="auto"
            height="auto"
            src="/assets/images/logo.png"
            alt="FresCo" />
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
          <li
            v-for="item in navStore.nav"
            class="nav-item"
            :class="url.pathname == item.link && 'nav-active'">
            <a class="nav-link longer" :href="item.link">{{ item.name }}</a>
          </li>
        </ul>
        <!-- Social Media -->
        <div class="nav-socmed-list">
          <!-- Facebook -->
          <a
            class="nav-socmed-item"
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
            class="nav-socmed-item"
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
            class="nav-socmed-item"
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
            class="nav-socmed-item"
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
          <!-- YouTube -->
          <a
            class="nav-socmed-item"
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

    <!-- Theme Changer -->
    <!-- (Cappuccino) -->
    <Transition name="slide" mode="out-in">
      <div
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
