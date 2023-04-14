import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'

export const useSubradditStore = defineStore('subradditStore', {
  // In here we define things like the state
  state: () => ({
    posts: '',
    subradInfo: ''
  }),
  actions: {
    getPosts(subName) {
      // let config = {
      //   method: 'get',
      //   maxBodyLength: Infinity,
      //   url: 'http://127.0.0.1:8000/api/' + subName + '/posts',
      //   headers: {}
      // }
      // axios
      //   .request(config)
      //   .then((response) => {
      //     console.log(JSON.stringify(response.data))
      //     this.posts = response.data
      //     console.log(this.subradInfo)
      //   })
      //   .catch((error) => {
      //     console.log(error)
      //   })
    },
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
            url: 'http://127.0.0.1:8000/api/' + this.subradInfo.id + '/posts',
            headers: {}
          }

          axios
            .request(config)
            .then((response) => {
              console.log(JSON.stringify(response.data))

              this.posts = response.data
              console.log(this.posts)
            })
            .catch((error) => {
              console.log(error)
            })
        })
        .catch((error) => {
          console.log(error)
        })
    }
  }
})
