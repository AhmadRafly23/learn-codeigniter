let mix = require('laravel-mix');

mix
  .js('resources/js/app.js', 'public/js/app.js')
  .postCss('resources/css/app.css', 'public/css/app.css', [
    require('tailwindcss'),
  ]);
