import { defineStore } from 'pinia'
import axios from 'axios'

export const usePostStore = defineStore('postStore', {
  // In here we define things like the state
  state: () => ({
    isLoading: false,
    posts: [],
    page: 1,
    post: {}
  }),

  actions: {
    getAllPosts() {
      this.isLoading = true
      axios
        .get('http://localhost:8000/api/posts?page=' + this.page)
        .then((response) => {
          let temp = response.data
          this.posts.push(temp.data)

          this.isLoading = false
          console.log(this.posts)
        })
        .catch((err) => {
          console.log('could not load posts ❌')
          console.error(err)
        })
    },
    getOnePost(postId) {
      console.log(postId)
      axios
        .get('http://127.0.0.1:8000/api/r/' + postId)
        .then((response) => {
          // let temp = response.data
          // this.posts.push(temp.data)

          // // this.isLoading = false
          // console.log(this.posts)

          console.log(response.data)
          this.post = response.data
        })
        .catch((err) => {
          console.log('could not load post ❌')
          console.error(err)
        })
    },
    getAllPostsBycrops() {
      this.isLoading = true
      axios
        .get('http://localhost:8000/api/posts?page=' + this.page)
        .then((response) => {
          let temp = response.data
          this.posts.push(temp.data)

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
