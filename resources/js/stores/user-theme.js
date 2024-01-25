import { defineStore } from 'pinia';
import { ref, watch } from 'vue';

export const useThemeStore = defineStore('theme', () => {
    const theme = ref(null);

    const getTheme = () => {
        theme.value = localStorage.getItem('user_theme');

        return theme;
    };

    const setTheme = (user_theme) => {
        theme.value = user_theme;
        localStorage.setItem('user_theme', user_theme);

        if(user_theme == null) {
            localStorage.removeItem('user_theme');
        }
    };

    // watch(theme, () => {
    //     if (theme.value !== undefined) {
    //         localStorage.setItem('user_theme', theme.value);
    //     } else {
    //         localStorage.removeItem('user_theme');
    //     }
    // });

    return { theme, getTheme, setTheme };
});
