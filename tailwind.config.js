const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'admin': {
                    'primary': {
                        'light': colors.indigo[500],
                        'normal': colors.indigo[700],
                        'dark': colors.indigo[900],
                    },

                    'dark': {
                        'light': colors.gray[800],
                        'normal': colors.gray[900],
                        'dark': colors.gray[950],
                    },
                    'light': {
                        'light': colors.slate[50],
                        'normal': colors.slate[200],
                        'dark': colors.slate[400],
                    },
                    'success': {
                        'light': colors.emerald[300],
                        'normal': colors.emerald[500],
                        'dark': colors.emerald[600],
                    },
                    'info': {
                        'light': colors.sky[300],
                        'normal': colors.sky[500],
                        'dark': colors.sky[600],
                    },
                    'warning': {
                        'light': colors.amber[200],
                        'normal': colors.amber[400],
                        'dark': colors.amber[600],
                    },
                    'danger': {
                        'light': colors.red[300],
                        'normal': colors.red[500],
                        'dark': colors.red[700],
                    },
                }
            }
        },
    },
    plugins: [],
}
