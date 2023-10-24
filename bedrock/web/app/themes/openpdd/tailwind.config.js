/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        primary: {
          '50': '#f0fdf9',
          '100': '#cdfaec',
          '200': '#9cf3da',
          '300': '#62e6c5',
          '400': '#32cfad',
          '500': '#1abc9c',
          '600': '#11907a',
          '700': '#127362',
          '800': '#135c51',
          '900': '#154c44',
          '950': '#052e29',
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
      padding: '1rem',
    },
		screens: {
      sm: '600px',
      md: '782px',
      lg: '960px',
      xl: '1180px',
		},
  },
  plugins: [],
};

export default config;
