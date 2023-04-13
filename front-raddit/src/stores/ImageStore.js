import { defineStore } from 'pinia'
import axios from 'axios'
// import { createToaster } from '@meforma/vue-toaster'
// import { ref } from 'vue'
// import { useAuthStore } from './AuthStore'

// const authStore = useAuthStore()
// const { user } = storeToRefs(authStore)
// const toaster = createToaster()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useImageStore = defineStore('imageStore', {
  // In here we define things like the state
  state: () => ({
    imageUrl: '',
    picId: '',

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
      let keyDB

      this.picId = idValue

      idValue == 'user' ? (keyDB = 'profile_picture_URL') : (keyDB = 'banner_picture_URL')

      console.log(keyDB)

      this.imageUrl = imageUrlRes

      //get user id from local storage
      const userData = JSON.parse(localStorage.getItem('user'))

      const userToken = localStorage.getItem('userToken')

      //AXIOS

      axios
        .patch(
          'http://127.0.0.1:8000/api/user/' + userData.id,
          {
            [keyDB]: imageUrlRes
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
          console.log('pic url saved in db 📸')
          console.log(res)
          const d = new Date()

          // update local storage
          const userLocal = JSON.parse(localStorage.getItem('user'))

          console.log(userLocal)

          const userUpdate = {
            id: userLocal.id,
            name: userLocal.name,
            email: userLocal.email,
            profile_picture_URL: idValue == 'user' ? imageUrlRes : userLocal.profile_picture_URL,
            banner_picture_URL: idValue == 'banner' ? imageUrlRes : userLocal.banner_picture_URL,
            updated_at: d.toLocaleString(),
            created_at: userLocal.created_at
          }
          localStorage.setItem('user', JSON.stringify(userUpdate))
          console.log(localStorage.getItem('user'))

          // update user state in auth store
          // authStore.user = userUpdate
        })
        .catch((err) => {
          console.log('💩📸')
          console.log(err)
        })
    }
  }
})
