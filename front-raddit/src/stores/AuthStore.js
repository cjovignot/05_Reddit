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

    name: 'Auth Store'
  }),
  getters: {},
  actions: {
    registerUser(userInput) {
      axios
        .post('http://127.0.0.1:8000/api/register', userInput)
        .then((response) => {
          console.log(response.data.data.user)
          console.log(response.data.data.token)
          this.users.push(response.data.data.user)
          toaster.success(`Account created 🚀`)
        })
        .catch((err) => console.error(err))
      //   const response = axios.get('http://127.0.0.1:8000/api/posts')
      //   console.log(response.data)
    }
  }
})
