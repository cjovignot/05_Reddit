import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'
import { ref } from 'vue'

const toaster = createToaster()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useImageStore = defineStore('imageStore', {
  // In here we define things like the state
  state: () => ({
    imageUrl: '',
    id: '',

    name: 'Image Store'
  }),
  getters: {
    kingAdmin() {
      return this.users.filter((u) => u.king_admin == 1)
    },
    userCount() {
      return this.users.reduce((total, user) => {
        return user.king_admin == 0 ? total + 1 : total
      }, 0)
    },
    totalCount: (state) => {
      return state.users.length
    }
  },
  actions: {
    storeImage(imageUrlRes, idValue) {
      console.log(`coucou de la fonction storeImage 🍍 - url 👉 ${imageUrlRes}`)
      console.log(idValue)

      this.imageUrl = imageUrlRes

      //get user id from local storage
      const userData = JSON.parse(localStorage.getItem('user'))

      console.log(userData.id)

      //AXIOS
      if (idValue == 'user') {
        axios
          .patch(
            'http://127.0.0.1:8000/api/user/' + userData.id,
            {
              profile_picture_URL: imageUrlRes
            },
            {
              headers: {
                Accept: 'application/vnd.api+json',
                'Content-Type': 'application/vnd.api+json',
                Authorization: `Bearer ${localStorage.getItem('userToken')}`
              }
            }
          )
          .then((res) => {
            console.log('profile pic url saved in db 📸')
            console.log(res)
          })
          .catch((err) => console.log(err))
      }
      if (idValue == 'banner') {
        axios.put('')
      }
    }
  }
})
