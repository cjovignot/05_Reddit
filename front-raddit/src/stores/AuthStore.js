import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'
// import { useRouter } from 'vue-router'
const toaster = createToaster()
// const router = useRouter()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useAuthStore = defineStore('authStore', {
  // In here we define things like the state
  state: () => ({
    id: 'user',
    loggedIn: !!localStorage.getItem('userToken'),
    axiosHeaders: {
      'Content-Type': 'application/vnd.api+json',
      Accept: 'application/vnd.api+json',
      Authorization: `Bearer ${localStorage.getItem('userToken')}`
    },
    user: {},
    userToken: '',
    isSuperA: false
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

          const userLocal = {
            id: userData.id,
            name: userData.name,
            email: userData.email,
            created_at: userData.created_at,
            updated_at: userData.updated_at,
            profile_picture_URL: userData.profile_picture_URL,
            banner_picture_URL: userData.banner_picture_URL
          }

          console.log('king admin? ', userData.king_admin)

          userData.king_admin == 1 ? (this.isSuperA = true) : (this.isSuperA = false)

          console.log('isAdmin state: ', this.isSuperA)
          this.user = userData
          this.userToken = userToken
          localStorage.setItem('user', JSON.stringify(userLocal))
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

          toaster.success(`Logged out`)
          this.isSuperA = false
          this.loggedIn = false

          console.log('isLoggedin state: ', this.loggedIn)

          localStorage.removeItem('user')
        })
        .catch((err) => {
          console.error(err)
          toaster.error(`Could not log out`)
        })
    },
    editUserName(userInput) {
      // get called on three occasions:
      // 1. name change
      // 2. password change
      // 3.

      console.log(userInput)

      //get user id from local storage
      const userData = JSON.parse(localStorage.getItem('user'))

      const userToken = localStorage.getItem('userToken')

      //AXIOS

      axios
        .patch(
          'http://127.0.0.1:8000/api/user/' + userData.id,
          {
            name: userInput
          },
          {
            headers: {
              Accept: 'application/vnd.api+json',
              'Content-Type': 'application/vnd.api+json',
              Authorization: `Bearer ${userToken}`
            }
          }
        )
        .then((res) => {
          console.log('user name updated')
          console.log(res)
          const d = new Date()

          // update local storage
          const userLocal = JSON.parse(localStorage.getItem('user'))

          console.log(userLocal)

          const userUpdate = {
            id: userLocal.id,
            name: userInput,
            email: userLocal.email,

            profile_picture_URL: userLocal.profile_picture_URL,
            banner_picture_URL: userLocal.banner_picture_URL,
            updated_at: d.toLocaleString(),
            created_at: userLocal.created_at
          }
          localStorage.setItem('user', JSON.stringify(userUpdate))
          console.log(localStorage.getItem('user'))

          // update user state in auth store
          // authStore.user = userUpdate
        })
        .catch((err) => {
          console.log(err)
        })
    },
    getUser(userId) {
      console.log('🍍')
      console.log(userId)
      // axios to get one user by userInput
      // http://127.0.0.1:8000/api/user/show/101

      let config = {
        method: 'get',
        maxBodyLength: Infinity,
        url: 'http://127.0.0.1:8000/api/user/show/' + userId,
        headers: {
          Accept: 'application/vnd.api+json',
          'Content-Type': 'application/vnd.api+json',
          Authorization: `Bearer ${localStorage.getItem('userToken')}`
        }
      }

      axios
        .request(config)
        .then((response) => {
          console.log(response.data)

          if (response.data.king_admin === 1) {
            console.log('KING')
            this.isSuperA = true
            this.user = response.data
          }
        })
        .catch((err) => {
          console.error(err)
          // toaster.error(`Could not log out`)
        })
    }
  }
})
