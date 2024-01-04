<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
const currentTheme = themeStore.getTheme();
</script>

<template>
    <section>
        <Menu v-if="currentTheme == null || currentTheme == 'null'"></Menu>

        <div v-else>
            <SocialMedia></SocialMedia>

            <Navbar></Navbar>

            <Transition name="right">
                <div v-if="themeStore.theme == 'black'">
                    <section class="relative bg-fr-red">
                        <video
                            autoplay
                            muted
                            loop
                            id="black-coffee"
                            class="relative h-[90vh] w-full object-cover object-bottom">
                            <source src="/assets/videos/black-coffee-video.mp4" type="video/mp4" />
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="shadow-up-black absolute -bottom-1 h-20 z-10 w-full"></div>
                    </section>
                    <Introduction></Introduction>
                </div>
            </Transition>

            <Transition name="left">
                <div v-if="themeStore.theme == 'cappucino'">
                    <section class="relative bg-fr-yellow">
                        <video
                            autoplay
                            muted
                            loop
                            id="black-coffee"
                            class="relative h-[90vh] w-full object-cover object-bottom">
                            <source src="/assets/videos/cappucinno-video.mp4" type="video/mp4" />
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="shadow-up-cappucino absolute -bottom-1 h-20 z-10 w-full"></div>
                    </section>
                    <Introduction></Introduction>
                </div>
            </Transition>

            <ProductCoffee></ProductCoffee>

            <VideoCoffee></VideoCoffee>

            <Description></Description>

            <PostFeed></PostFeed>

            <Footer v-if="currentTheme != null"></Footer>
        </div>
    </section>
</template>

<style scoped>
.right-enter-active {
    animation: wipe-in-right 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}

.right-leave-from {
    opacity: 0;
}
.left-enter-active {
    animation: wipe-in-left 2.5s cubic-bezier(0.25, 1, 0.3, 1) both;
}
.left-leave-from {
    opacity: 0;
}

.shadow-up-black {
    background: rgb(35, 31, 32);
    background: linear-gradient(
        0deg,
        rgba(35, 31, 32, 1) 10%,
        rgba(35, 31, 32, 0.9) 20%,
        rgba(35, 31, 32, 0.8) 30%,
        rgba(35, 31, 32, 0.6) 55%,
        rgba(35, 31, 32, 0.3) 75%,
        rgba(35, 31, 32, 0) 95%
    );
}

.shadow-up-cappucino {
    background: rgb(253, 198, 75);
    background: linear-gradient(
        0deg,
        rgba(253, 198, 75, 1) 10%,
        rgba(253, 198, 75, 0.9) 20%,
        rgba(253, 198, 75, 0.8) 30%,
        rgba(253, 198, 75, 0.6) 55%,
        rgba(253, 198, 75, 0.3) 75%,
        rgba(253, 198, 75, 0) 95%
    );
}

@keyframes wipe-in-right {
    from {
        clip-path: inset(0 100% 0 0);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}

@keyframes wipe-in-left {
    from {
        clip-path: inset(0 0 0 100%);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}
</style>
