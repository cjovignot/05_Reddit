/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './src/**/*.{html,js,vue,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        'btn-color': '#243c5a',
        'CTA':'#fc6c85',
        'titles':'#008081',
        'header':'#bfedc8',
        'background':'#f0d3cd',


      }
    }
  },
  daisyui: {
    themes: [
      'light',
      'dark',
      'cupcake',
      'bumblebee',
      'emerald',
      'corporate',
      'synthwave',
      'retro',
      'cyberpunk',
      'valentine',
      'halloween',
      'garden',
      'forest',
      'aqua',
      'lofi',
      'pastel',
      'fantasy',
      'wireframe',
      'black',
      'luxury',
      'dracula',
      'cmyk',
      'autumn',
      'business',
      'acid',
      'lemonade',
      'night',
      'coffee',
      'winter'
    ]
  },
  fontFamily: {
    Roboto: ['Roboto, sans-serif']
  },
  container: {
    padding: '2rem',
    center: true
  },
  screens: {
    sm: '640px',
    md: '768px'
  },
  plugins: [require('daisyui')]
}
