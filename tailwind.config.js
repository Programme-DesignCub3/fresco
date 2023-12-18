/** @type {import('tailwindcss').Config} */
export default {
    content: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue'],
    theme: {
        extend: {
            backgroundColor: {
                'fr-black': '#231f20',
                'fr-yellow': '#fdc64b',
                'fr-red': '#ed1d24',
                'fr-darker-red': '#be1e2d',
                'fr-green': '#006838',
            },
            colors: {
                'fr-black': '#231f20',
                'fr-yellow': '#fdc64b',
                'fr-red': '#ed1d24',
                'fr-darker-red': '#be1e2d',
                'fr-green': '#006838',
            },
        },
    },
    plugins: [
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
