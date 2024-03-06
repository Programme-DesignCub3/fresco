import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useThemeStore = defineStore('theme', () => {
    const theme = ref(null);

    const getTheme = () => {
        theme.value = localStorage.getItem('user_theme');

        return theme;
    };

    const setTheme = (user_theme) => {
        theme.value = user_theme;
        localStorage.setItem('user_theme', user_theme);

        if (user_theme == null) {
            localStorage.removeItem('user_theme');
        }
    };

    return { theme, getTheme, setTheme };
});
