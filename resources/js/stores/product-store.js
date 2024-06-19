import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useProductStore = defineStore('product', () => {
  const popup = ref(null);

  const setPopUp = (current) => {
    if (current != null) {
      document.body.style.overflow = 'hidden';
    }
    popup.value = current;
  };

  return { popup, setPopUp };
});
