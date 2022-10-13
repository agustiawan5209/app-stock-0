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
                sans: ['ui-monospace', ...defaultTheme.fontFamily.sans],
            },

        },
    },
    daisyui: {
        themes: [{
            mytheme: {

                "primary": "#facc15",

                "secondary": "#046ea3",

                "accent": "#f9dd39",

                "neutral": "#1E1727",

                "base-100": "#f3f4f6",

                "info": "#8EA4DC",

                "success": "#0D6D4C",

                "warning": "#EB8E14",

                "error": "#F05682",
            },
        }, ],
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui')],
};