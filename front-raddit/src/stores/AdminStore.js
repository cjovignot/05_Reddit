import { defineStore } from 'pinia'
import axios from 'axios'
import { createToaster } from '@meforma/vue-toaster'

const toaster = createToaster()

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useAdminStore = defineStore('adminStore', {
  // In here we define things like the state
  state: () => ({
    id: 'users',
    users: [],
    isLoading: false,
    name: 'Admin Store'
  }),
  getters: {
    kingAdmin() {
      return this.users.filter((u) => u.king_admin == 1)
    },
    isKingAdmin(userId) {
      console.log(userId)
      // fetch a user by id in param and check if he is admin 1
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
    getUsers() {
      this.isLoading = true
      axios
        .get('http://127.0.0.1:8000/api/user')
        .then((response) => {
          this.users = response.data
          this.isLoading = false
        })
        .catch((err) => {
          console.log('could not load user list ❌')
          console.error(err)
        })
      // headers: {
      //   'Content-Type': 'application/vnd.api+json',
      //   Accept: 'application/vnd.api+json',
      // }
    },
    deleteUser(id) {
      this.users = this.users.filter((u) => {
        return u.id !== id
      })

      axios
        .delete('http://127.0.0.1:8000/api/user/' + id, { headers: { Authorization: '***' } })
        .then((response) => {
          console.log(response.data)
          toaster.info(`user deleted 🥺`)
        })
        .catch((err) => console.error(err))
    }
  }
})
