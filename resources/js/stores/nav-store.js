import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useNavStore = defineStore('nav', () => {
  const nav = ref([
    {
      name: 'BERANDA',
      link: '/',
    },
    {
      name: 'ENAKNYA NGOPI FRESCO',
      link: '/produk',
    },
    {
      name: 'ENAKIN TIAP MOMEN',
      link: '/artikel',
    },
    {
      name: 'SERBA-SERBI FRESCO',
      link: '/aktivitas',
    },
    {
      name: 'HUBUNGI FRESCO',
      link: '/hubungi',
    },
  ]);

  return { nav };
});
