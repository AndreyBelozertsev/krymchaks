const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],

    theme: {
        screens: {
            'xs': '375px',
            'sm': '540px',
            'md': '768px',
            'lg': '991px',
            'xl': '1140px',
            '2xl': '1550px',
            },
            container: {
            center: true,
            padding: '20px',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary-blue':'#4149F2',
            },
            spacing: {
                '500': '31.25rem',
            },
            minHeight: {
                '225': '14.06rem',
                '256': '16rem',
                '320': '20rem',
                '350': '21.875rem'
            },
            borderRadius: {
                '50': '50%'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tw-elements/dist/plugin')
    ],
};