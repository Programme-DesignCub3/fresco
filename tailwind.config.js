/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'header-article':
          "url('https://fresco.democube.id/assets/images/header-article.webp')",
        'header-activity':
          "url('https://fresco.democube.id/assets/images/header-activity.webp')",
        'header-contact':
          "url('https://fresco.democube.id/assets/images/header-contact.webp')",
        menu: "url('https://fresco.democube.id/assets/images/bg-menu.webp')",
        'black-home':
          "url('https://fresco.democube.id/assets/images/bg-black-home.webp')",
        'cappuccino-home':
          "url('https://fresco.democube.id/assets/images/bg-cappuccino-home.webp')",
        product: "url('https://fresco.democube.id/assets/images/bg-product.webp')",
        article: "url('https://fresco.democube.id/assets/images/bg-article.webp')",
        activity: "url('https://fresco.democube.id/assets/images/bg-activity.webp')",
      },
      backgroundColor: {
        'fr-black': '#050505',
        'fr-yellow': '#fdc64b',
        'fr-red': '#ed1d24',
        'fr-green': '#006838',
        'fr-darker-yellow': '#edba48',
        'fr-darker-red': '#bf1f2e',
        'fr-darker-green': '#055c34',
      },
      colors: {
        'fr-black': '#050505',
        'fr-yellow': '#fdc64b',
        'fr-red': '#ed1d24',
        'fr-green': '#006838',
        'fr-darker-yellow': '#edba48',
        'fr-darker-red': '#bf1f2e',
        'fr-darker-green': '#055c34',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    function ({ addComponents }) {
      addComponents({
        '.fr-container': {
          maxWidth: '100%',
          '@screen sm': {
            maxWidth: '640px',
          },
          '@screen md': {
            maxWidth: '720px',
          },
          '@screen lg': {
            maxWidth: '920px',
          },
          '@screen xl': {
            maxWidth: '1080px',
          },
          '@screen 2xl': {
            maxWidth: '1200px',
          },
        },
      });
    },
  ],
};
