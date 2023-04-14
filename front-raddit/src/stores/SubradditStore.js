import { defineStore } from 'pinia'
import axios from 'axios'
// import { createToaster } from '@meforma/vue-toaster'

export const useSubradditStore = defineStore('subradditStore', {
  // In here we define things like the state
  state: () => ({
    posts: [],
    subradInfo: '',
    page: 1
  }),
  actions: {
    getSubInfo(subName) {
      let config = {
        method: 'get',
        maxBodyLength: Infinity,
        url: 'http://127.0.0.1:8000/api/r/' + subName,
        headers: {}
      }

      axios
        .request(config)
        .then((response) => {
          console.log(JSON.stringify(response.data))

          this.subradInfo = response.data
          console.log(this.subradInfo)
          console.log(this.subradInfo.id)

          let config = {
            method: 'get',
            maxBodyLength: Infinity,
            url: 'http://127.0.0.1:8000/api/' + this.subradInfo.id + '/posts?page=' + this.page,
            headers: {}
          }

          axios
            .request(config)
            .then((response) => {
              console.log('here')
              this.posts.push(response.data)

              console.log(this.posts)
            })
            .catch((error) => {
              console.log(error)
            })
        })
        .catch((error) => {
          console.log(error)
        })
    },
    getSubPosts() {
      // let config = {
      //   method: 'get',
      //   maxBodyLength: Infinity,
      //   url: 'http://127.0.0.1:8000/api/' + this.subradInfo.id + '/posts',
      //   headers: {}
      // }

      axios
        .get('http://127.0.0.1:8000/api/' + this.subradInfo.id + '/posts?page=' + this.page)
        .then((response) => {
          let temp = response.data
          this.posts.push(temp.data)
        })
        .catch((err) => {
          console.log('could not load posts ❌')
          console.error(err)
        })
    }
  }
})
