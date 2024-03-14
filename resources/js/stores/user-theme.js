import { defineStore } from 'pinia';
import { ref, onMounted } from 'vue';

export const useThemeStore = defineStore('theme', () => {
    const theme = ref(null);
    const openMenu = ref(null);

    onMounted(() => {
        if (localStorage.user_theme == 'black') {
            document.documentElement.classList.add('dark');
        } else if(localStorage.user_theme == 'cappuccino') {
            document.documentElement.classList.remove('dark');
        }
    });

    const getTheme = () => {
        theme.value = localStorage.getItem('user_theme');

        return theme;
    };

    const setTheme = (user_theme) => {
        theme.value = user_theme;
        localStorage.setItem('user_theme', user_theme);

        if (user_theme == null) {
            localStorage.removeItem('user_theme');
            document.documentElement.classList.add('dark');
        } else if (user_theme == 'black') {
            document.documentElement.classList.add('dark');
        } else if(user_theme == 'cappuccino') {
            document.documentElement.classList.remove('dark');
        }
    };

    const setOpenMenu = (open) => {
        openMenu.value = open;
    };

    return { theme, getTheme, setTheme, openMenu, setOpenMenu };
});
