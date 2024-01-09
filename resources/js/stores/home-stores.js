import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useHomeStore = defineStore('home', () => {
    const home = ref(null);

    const setHome = (datas) => {
        home.value = datas;
    };

    return { home, setHome };
});
