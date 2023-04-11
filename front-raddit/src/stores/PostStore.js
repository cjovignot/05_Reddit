import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'

const toaster = createToaster()

export const usePostStore = defineStore('postStore', {
    // In here we define things like the state
    state: () => ({
        isLoading: false,

    }),
    getters: {
      
    },
    actions: {
        getAllPosts() {
            this.isLoading = true
            axios
              .get('http://127.0.0.1:8000/api/posts')
              .then((response) => {
                this.users = response.data
                this.isLoading = false
              })
              .catch((err) => {
                console.log('could not load posts ❌')
                console.error(err)
              })
           
          }
    }
  })
