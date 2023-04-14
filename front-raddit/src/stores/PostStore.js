import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'

const toaster = createToaster()

export const usePostStore = defineStore('postStore', {
  // In here we define things like the state
  state: () => ({
    isLoading: false,
    posts: [],
    page: 1,
    post: {},
    comments: []
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
        .get('http://127.0.0.1:8000/api/p/' + postId)
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
    },
    createComm(postId, commInput) {
      console.log(postId)
      console.log(commInput)

      const user = JSON.parse(localStorage.getItem('user'))
      console.log(user.id)
      // return

      let config = {
        method: 'post',
        maxBodyLength: Infinity,
        url: 'http://127.0.0.1:8000/api/comment',
        headers: {
          Accept: 'application/vnd.api+json',
          'Content-Type': 'application/vnd.api+json',
          Authorization: `Bearer ${localStorage.getItem('userToken')}`
        },
        data: {
          post_id: postId,
          content: commInput,
          author_id: user.id
        }
      }

      axios
        .request(config)
        .then((response) => {
          console.log(response.data)
          this.comments = response.data.reverse()
          toaster.success(`Comment posted 🚀`)
          // this.comments.push(response.data)
          console.log(this.comments)
        })
        .catch((err) => {
          console.error(err)
          toaster.error(`Could not comment`)
        })
    },
    getAllComms(postId) {
      console.log(postId)

      axios
        .get('http://127.0.0.1:8000/api/comments/' + postId)
        .then((response) => {
          console.log(response.data)
          this.comments = response.data.reverse()
          //this.comments.push(...response.data)

          console.log(this.comments)
        })
        .catch((err) => {
          console.log('could not load comments ❌')
          console.error(err)
        })
    }
  }
})
