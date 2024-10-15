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
                    "url('../../public/assets/images/bg-article.png')",
                activity:
                    "url('../../public/assets/images/bg-activity.png')",
                'intro-product':
                    "url('../../public/assets/images/bg-shiny.png')"
            },
            backgroundColor: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
                'fr-red': '#ed1d24',
                'fr-green': '#006838',
                'fr-darker-yellow': '#edba48',
                'fr-darker-red': '#bf1f2e',
                'fr-darker-green': '#055c34',
            },
            colors: {
                'fr-black': '#050505',
                'fr-yellow': '#ffc60b',
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
                        maxWidth: '1200px',
                    },
                    '@screen 2xl': {
                        maxWidth: '1200px',
                    },
                },
            });
        },
    ],
};
