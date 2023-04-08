import { defineStore } from 'pinia'
import axios from 'axios'

// for our const variable, 'use...'is a naming convention
// adminStore -> ref name to use in components (must be unique)
export const useAuthStore = defineStore('authStore', {
  // In here we define things like the state
  state: () => ({
    id: 'users',
    users: [
      {
        id: 1,
        name: 'Bob',
        email: 'bob@gmail.com',
        password: 'bobbobbob',
        created_at: '2021',
        profile_picture_URL: 'imageUrl',
        banner_picture_URL: 'bannerImgUrl',
        king_admin: 0
      },
      {
        id: 2,
        name: 'Sandra',
        email: 'sandra@gmail.com',
        password: 'sandrasandra',
        created_at: '2021',
        profile_picture_URL: 'imageUrl',
        banner_picture_URL: 'bannerImgUrl',
        king_admin: 0
      },
      {
        id: 3,
        name: 'Tom',
        email: 'tom@gmail.com',
        password: 'tomtomtom',
        created_at: '2021',
        profile_picture_URL: 'imageUrl',
        banner_picture_URL: 'bannerImgUrl',
        king_admin: 1
      }
    ],
    name: 'Auth Store'
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
    registerUser(userInput) {
      axios
        .post('http://127.0.0.1:8000/api/register', userInput)
        .then((response) => console.log(response.data))
      //   const response = axios.get('http://127.0.0.1:8000/api/posts')
      //   console.log(response.data)
    }
  }
})
