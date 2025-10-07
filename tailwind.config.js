/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '*.php',
    './**/*.php',
  './tailwind-dummy.css',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Lato', 'sans-serif'],
        titulo: ['Bebas Neue', 'sans-serif'],
      },
    },
  },
  plugins: [],
}