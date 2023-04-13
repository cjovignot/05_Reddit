<script setup>
import Register from './UserConnexionModal.vue'
import { ref } from 'vue'
import { useAuthStore } from '../stores/AuthStore'
import { storeToRefs } from 'pinia'
import CreatePost from './CreatePostModal.vue'
import { useRouter } from 'vue-router'

const router = useRouter()

import { useImageStore } from '../stores/ImageStore'

const imageStore = useImageStore()

try {
  const userLocal = JSON.parse(localStorage.getItem('user'))
  const userPicLocal = userLocal.profile_picture_URL
  const bannerPicLocal = userLocal.banner_picture_URL
  console.log(userPicLocal)
  console.log(bannerPicLocal)
} catch (err) {
  console.log(err)
}

//pinia to get user name
// import { useAdminStore } from '../stores/AdminStore'

const { imageUrl } = storeToRefs(imageStore)

// import { storeToRefs } from 'pinia'
const authStore = useAuthStore()

// const isSuperAdmin = ref(false)

const { loggedIn, user, isSuperA } = storeToRefs(authStore)
console.log({ loggedIn })

console.log(user)

console.log(loggedIn)

const logOut = () => {
  console.log('click')
  authStore.logout()
}

const userData = JSON.parse(localStorage.getItem('user'))

if (localStorage.getItem('user')) {
  // get user info from axio+pinia to see if kindadmin

  authStore.getUser(userData.id)
}

const search = ref('')
const searchSub = (event) => {
  // console.log(event)
  // console.log(event.key)

  console.log(search.value)
  if (event.key == 'Enter') {
    console.log(search.value)
    event.target.blur()

    // redirection to sub page
    router.push('/r/' + search.value)
  }

  // updateCatToDb()
}
</script>

<template>
  <div class="navbar bg-base-100">
    <div class="flex-1">
      <RouterLink class="flex" to="/">
        <span class="self-center">Raddit</span>
        <img src="../assets/images/NEW LOGO.png" class="w-14" />
      </RouterLink>

      <!-- <a class="btn btn-ghost normal-case text-xl"> </a> -->
    </div>
    <div class="flex-none gap-2">
      <div class="form-control">
        <input
          name="search"
          v-on:keyup.enter="searchSub($event)"
          type="text"
          v-model="search"
          placeholder="search"
          class="input input-bordered"
        />
      </div>
      <!-- 
      <input
        v-on:focusout="updateName"
        v-on:keyup.enter="updateName($event)"
        name="username"
        type="text"
        v-model="userName"
        class="input input-ghost w-full max-w-xs"
      /> -->

      <!-- The button to open Post modal -->
      <label v-if="loggedIn" for="my-modal-5" class="btn"><i class="fa-solid fa-plus"></i></label>

      <Register v-if="!loggedIn" />
      <CreatePost />
      <!-- {{ isSuperA }} -->
      <RouterLink v-if="isSuperA" class="btn" to="/admin">Admin</RouterLink>
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div v-if="loggedIn" class="avatar online">
            <div class="w-10 rounded-full">
              <!-- if user photo updated -->
              <div v-if="authStore.user.profile_picture_URL">
                <img :src="authStore.user.profile_picture_URL" alt="user profile picture" />
              </div>
              <!-- else -->
              <div v-else>
                <img
                  src="https://res.cloudinary.com/dnzb3s4a0/image/upload/v1680856051/raddit/wholeRaddit_x3fbys.png"
                />
              </div>
            </div>
          </div>
          <div v-else class="avatar offline">
            <div class="w-10 rounded-full">
              <img
                src="https://res.cloudinary.com/dnzb3s4a0/image/upload/v1680856051/raddit/wholeRaddit_x3fbys.png"
              />
            </div>
          </div>
        </label>
        <ul
          tabindex="0"
          class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52"
        >
          <li>
            <RouterLink :to="'/user/' + authStore.user.id" class="justify-between">
              Profile
            </RouterLink>
          </li>
          <li>
            <button id="random-btn">Theme <i class="fa-solid fa-palette"></i>💥</button>
          </li>

          <li>
            <a
              ><RouterLink to="/settings">Settings <i class="fa-solid fa-gear"></i></RouterLink
            ></a>
          </li>
          <li><a @click="logOut">Logout 🥺</a></li>
        </ul>
      </div>
    </div>
  </div>
</template>
