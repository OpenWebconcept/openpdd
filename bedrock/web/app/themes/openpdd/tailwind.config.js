/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        primary: {
          100: '#d6ddf8',
          200: '#aebbf1',
          300: '#8599e9',
          400: '#5d77e2',
          500: '#3455db',
          600: '#2a44af',
          700: '#1f3383',
          800: '#152258',
          900: '#0a112c',
        },
        secondary: {
          100: '#d4d4e0',
          200: '#a8aac0',
          300: '#7d7fa1',
          400: '#515581',
          500: '#262a62',
          600: '#1e224e',
          700: '#17193b',
          800: '#0f1127',
          900: '#080814',
        },
        tertiary: {
          100: '#daf5f3',
          200: '#b5ebe8',
          300: '#90e0dc',
          400: '#6bd6d1',
          500: '#46ccc5',
          600: '#38a39e',
          700: '#2a7a76',
          800: '#1c524f',
          900: '#0e2927',
        },
        gray: {
          200: '#f2f2f2',
          300: '#949494', // 3.0:1 contrast on white background
          450: '#757575', // 4.6:1 contrast on white background
        },
      },
    },
    fontFamily: {
      sans: ['Open Sans', 'sans-serif'],
    },
    container: {
      center: true,
    },

  },
  plugins: [],
};

export default config;
