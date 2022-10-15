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
            colors: {
                "ungu": '#e11d48'
            }
        },
    },
    daisyui: {
        themes: [{
            mytheme: {

                "primary": "#292524",

                "secondary": "#046ea3",

                "accent": "#f59e0b",

                "neutral": "#881337",

                "base-100": "#f3f4f6",

                "info": "#2563eb",

                "success": "#0D6D4C",

                "warning": "#EB8E14",

                "error": "#dc2626",
            },
        }, ],
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui')],
};
