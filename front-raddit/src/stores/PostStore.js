import { defineStore } from 'pinia'
import axios from 'axios'

export const usePostStore = defineStore('postStore', {
    // In here we define things like the state
    state: () => ({
        isLoading: false,
        posts: [],
        page:1


    }),
    getters: {
      
    },
    actions: {
        getAllPosts() {
            this.isLoading = true
            axios
              .get('http://localhost:8000/api/posts?page=1')
              .then((response) => {
                this.posts = response.data
                this.isLoading = false
                console.log(this.posts)
              })
              .catch((err) => {
                console.log('could not load posts ❌')
                console.error(err)
              })
           
          },getMorePosts() {
            this.isLoading = true
            axios
              .get('http://localhost:8000/api/posts?page='+page)
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
