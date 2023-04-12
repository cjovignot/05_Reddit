import { defineStore } from 'pinia'
import axios from 'axios'

export const usePostStore = defineStore('postStore', {
    // In here we define things like the state
    state: () => ({
        isLoading: false,
        posts: [],


    }),
    getters: {
      
    },
    actions: {
        getAllPosts() {
            this.isLoading = true
            axios
              .get('http://127.0.0.1:8000/api/posts/')
              .then((response) => {
                this.posts = response.data
                this.isLoading = false
                console.log(this.posts)
              })
              .catch((err) => {
                console.log('could not load posts ❌')
                console.error(err)
              })
           
          }
    }
  })
