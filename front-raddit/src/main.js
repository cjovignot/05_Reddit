import { createApp } from 'vue'
import './axios'
import App from './App.vue'
import { createPinia } from 'pinia'
import './assets/tailwind.css'
import router from './router'

const app = createApp(App)
const pinia = createPinia()

app.use(router)
app.use(pinia)

const htmlTheme = document.querySelector('#html')

console.log(htmlTheme.dataset.theme)

app.mount('#app')
