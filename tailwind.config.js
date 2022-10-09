const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue-light': '#658BEC',
                "primary": "#3ABFF8",

                "secondary": "#828DF8",

                "accent": "#F471B5",

                "neutral": "#1D283A",

                "base-100": "#0F1729",

                "info": "#0CA6E9",

                "success": "#2BD4BD",

                "warning": "#F4C152",

                "error": "#FB6F84",
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};