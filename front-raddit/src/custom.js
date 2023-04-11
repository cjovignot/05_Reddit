const htmlThemeEl = document.querySelector('#html')

const randomBtn = document.querySelector('#random-btn')

const themes = [
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

htmlThemeEl.dataset.theme = localStorage.getItem('userTheme')

randomBtn.addEventListener('click', () => {
  localStorage.setItem('userTheme', themes[Math.floor(Math.random() * themes.length)])
  htmlThemeEl.dataset.theme = localStorage.getItem('userTheme')
})
