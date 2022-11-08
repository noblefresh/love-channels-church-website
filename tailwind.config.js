const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                sm: ["14px"],
            },
            colors: {
                starGreen: "#D4E9E2",
                darkGreen: "#1E3932",
                lightText: 'rgba(0,0,0, .58)',
                titleText: 'rgba(0,0,0, .87)',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
