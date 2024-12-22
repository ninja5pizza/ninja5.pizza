/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/svg/logo-animated.svg",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'pizza-orange': '#ff5400',
        'pets-orange-100': '#FFD255',
        'pets-orange-200': '#FFBE46',
        'pets-orange-300': '#FFA838',
        'pets-orange-400': '#FF952B',
        'pets-orange-500': '#FF7C1B',
        'pets-orange-600': '#FF690F',
        'material-theme-ocean': '#0F111A',
      }
    }
  },
  plugins: [],
}
