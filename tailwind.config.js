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
            content: {
                'shiny':
                    "url('https://fresco.democube.id/assets/images/shiny.png')",
            },
            backgroundImage: {
                article:
                    "url('https://fresco.democube.id/assets/images/bg-article.png')",
                activity:
                    "url('https://fresco.democube.id/assets/images/bg-activity.png')",
                'intro-product-portrait':
                    "url('https://fresco.democube.id/assets/images/bg-shiny-portrait.png')",
                'batik':
                    "url('https://fresco.democube.id/assets/images/bg-batik.jpg')",
            },
            backgroundColor: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
                'fr-red': '#ed1d24',
                'fr-green': '#006838',
                'fr-darker-yellow': '#edba48',
                'fr-darker-red': '#bf1f2e',
                'fr-darker-green': '#055c34',
                'fr-dark-brown': '#301612',
                'fr-gold': '#d5a655'
            },
            colors: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
                'fr-red': '#ed1d24',
                'fr-green': '#006838',
                'fr-darker-yellow': '#edba48',
                'fr-darker-red': '#bf1f2e',
                'fr-darker-green': '#055c34',
                'fr-dark-brown': '#301612',
                'fr-gold': '#d5a655'
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
                        maxWidth: '1100px',
                    },
                    '@screen 2xl': {
                        maxWidth: '1200px',
                    },
                },
            });
        },
    ],
};
