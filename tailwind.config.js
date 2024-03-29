import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors'  
import typography from '@tailwindcss/typography' 


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
      darkMode: 'class',

    theme: {
        extend: {
             fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: { 
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                
                myprimary: '#07484A',
                mytext:'#07484A',
                secondary:'#70908B',
                mysecondary: '#CAF3E5',
            }, 
        },
    },

    plugins: [   forms, 
        typography, ],
};
