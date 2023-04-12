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
    storeImage(imageUrlRes) {
      console.log(`coucou de la fonction storeImage 🍍 - url 👉 ${imageUrlRes}`)

      this.imageUrl = imageUrlRes
    }
  }
})
