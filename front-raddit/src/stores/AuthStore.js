import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'
const toaster = createToaster()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useAuthStore = defineStore('authStore', {
  // In here we define things like the state
  state: () => ({
    id: 'users',
    isLoggedIn: false,

    user: {},
    userToken: ''
  }),
  getters: {},
  actions: {
    registerUser(userInput) {
      axios
        .post('http://127.0.0.1:8000/api/register', userInput)
        .then((response) => {
          console.log(response.data.data.user)
          console.log(response.data.data.token)
          const userData = response.data.data.user
          const userToken = response.data.data.token

          this.user = userData
          this.userToken = userToken
          localStorage.setItem('user', JSON.stringify(userData))
          localStorage.setItem('userToken', userToken)

          //to set our headers of our axios instance
          axios.defaults.headers.common['Authorization'] = `Bearer ${userToken}`

          toaster.success(`Account created 🚀`)
          this.isLoggedIn = true
        })
        .catch((err) => {
          console.error(err)
          toaster.error(`Credentials do not match`)
        })
      //   const response = axios.get('http://127.0.0.1:8000/api/posts')
      //   console.log(response.data)
    },
    login(credentials) {
      // console.log(credentials)
      // return
      axios
        .post('http://127.0.0.1:8000/api/login', credentials)
        .then((response) => {
          console.log(response.data.data.user)
          console.log(response.data.data.token)
          const userData = response.data.data.user
          const userToken = response.data.data.token

          this.user = userData
          this.userToken = userToken
          localStorage.setItem('user', JSON.stringify(userData))
          localStorage.setItem('userToken', userToken)
          toaster.success(`Logged in 🚀`)
          this.isLoggedIn = true
        })
        .catch((err) => {
          console.log('💩')
          console.log(err)
          toaster.error(`Connection failed, please try again.`)
        })
    },
    logout() {
      //axios
      // router.push({name: homepage})
    }
  }
})
