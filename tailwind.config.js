/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        backgroundImage : {
            'help-desk': "url('/public/img/background.jpg')"
        }
    },
  },
  plugins: [],
}

