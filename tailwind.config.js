/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/**/*.{html,php,js,css}'],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ['light'],
  },
};
