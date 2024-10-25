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
                article:
                    "url('http://fresco.test/assets/images/bg-article.png')",
                activity:
                    "url('http://fresco.test/assets/images/bg-activity.png')",
                'intro-product':
                    "url('http://fresco.test/assets/images/bg-shiny.png')",
                'intro-product-portrait':
                    "url('http://fresco.test/assets/images/bg-shiny-portrait.png')",
            },
            backgroundColor: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
                'fr-red': '#ed1d24',
                'fr-green': '#006838',
                'fr-darker-yellow': '#edba48',
                'fr-darker-red': '#bf1f2e',
                'fr-darker-green': '#055c34',
                'fr-dark-brown': '#301612'
            },
            colors: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
                'fr-red': '#ed1d24',
                'fr-green': '#006838',
                'fr-darker-yellow': '#edba48',
                'fr-darker-red': '#bf1f2e',
                'fr-darker-green': '#055c34',
                'fr-dark-brown': '#301612'
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
                        maxWidth: '900px',
                    },
                    '@screen 2xl': {
                        maxWidth: '1200px',
                    },
                },
            });
        },
    ],
};
