import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'
const toaster = createToaster()
// import { useRouter } from 'vue-router'
// const router = useRouter()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useAuthStore = defineStore('authStore', {
  // In here we define things like the state
  state: () => ({
    id: 'users',
    loggedIn: !!localStorage.getItem('userToken'),
    axiosHeaders: {
      'Content-Type': 'application/vnd.api+json',
      Accept: 'application/vnd.api+json',
      Authorization: `Bearer ${localStorage.getItem('userToken')}`
    },
    user: {},
    userToken: ''
  }),

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
          // axios.defaults.headers.common['Authorization'] = `Bearer ${userToken}`
          // axios.defaults.headers.common['Content-Type'] = `application/vnd.api+json`
          // axios.defaults.headers.common['Accept'] = `application/vnd.api+json`

          toaster.success(`Account created 🚀`)
          this.loggedIn = true
        })
        .catch((err) => {
          console.error(err)
          toaster.error(`Credentials do not match`)
        })
      //   const response = axios.get('http://127.0.0.1:8000/api/posts')
      //   console.log(response.data)
    },
    login(userInput) {
      axios
        .post('http://127.0.0.1:8000/api/login', userInput)
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
          this.loggedIn = true
          console.log('logged state: ', this.loggedIn)
        })
        .catch((err) => {
          console.log('💩')
          console.log(err)
          toaster.error(`Connection failed, please try again.`)
        })
    },
    logout() {
      console.log(localStorage.getItem('userToken'))

      let config = {
        method: 'post',
        maxBodyLength: Infinity,
        url: 'http://127.0.0.1:8000/api/logout',
        headers: {
          Accept: 'application/vnd.api+json',
          'Content-Type': 'application/vnd.api+json',
          Authorization: `Bearer ${localStorage.getItem('userToken')}`
        }
      }

      axios
        .request(config)
        .then((response) => {
          console.log(response)
          localStorage.removeItem('user')
          localStorage.removeItem('userToken')
          //router.push('/')
          toaster.success(`Logged out`)
        })
        .catch((err) => {
          console.error(err)
          toaster.error(`Could not log out`)
        })
    },
    editUserData(userInput) {
      // get called on three occasions:
      // 1. name change
      // 2. image (avatar) changed
      // 3. image (banner) changed
      console.log(userInput)
    }
  }
})
