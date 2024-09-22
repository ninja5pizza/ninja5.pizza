/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/svg/logo-animated.svg",
  ],
  theme: {
    extend: {
      colors: {
        'pizza-orange': '#ff5400',
        'material-theme-ocean': '#0F111A',
      }
    }
  },
  plugins: [],
}
