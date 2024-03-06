/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            backgroundImage: {
                'header-article':
                    "url('http://fresco.test/assets/images/header-article.webp')",
                'header-activity':
                    "url('http://fresco.test/assets/images/header-activity.webp')",
                'header-contact':
                    "url('http://fresco.test/assets/images/header-contact.webp')",
                menu: "url('http://fresco.test/assets/images/bg-menu.webp')",
                'black-home':
                    "url('http://fresco.test/assets/images/bg-black-home.webp')",
                'cappuccino-home':
                    "url('http://fresco.test/assets/images/bg-cappuccino-home.webp')",
                product:
                    "url('http://fresco.test/assets/images/bg-product.webp')",
                article:
                    "url('http://fresco.test/assets/images/bg-article.webp')",
                activity:
                    "url('http://fresco.test/assets/images/bg-activity.webp')",
            },
            backgroundColor: {
                'fr-black': '#050505',
                'fr-yellow': '#fdc64b',
                'fr-red': '#ed1d24',
                'fr-darker-red': '#bf1f2e',
                'fr-green': '#006838',
                'fr-darker-green': '#025930',
            },
            colors: {
                'fr-black': '#050505',
                'fr-yellow': '#fdc64b',
                'fr-red': '#ed1d24',
                'fr-darker-red': '#bf1f2e',
                'fr-green': '#006838',
                'fr-darker-green': '#025930',
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
