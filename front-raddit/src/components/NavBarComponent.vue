<script setup>
import Register from './UserConnexionModal.vue'
import { ref } from 'vue'

const isLoggedIn = ref(false)
const isSuperAdmin = ref(false)

const userToken = localStorage.getItem('userToken')
const userData = JSON.parse(localStorage.getItem('user'))

if (userToken && userData) {
  console.log(userData.king_admin)
  if (userData.king_admin === 1 && userToken) isSuperAdmin.value = true

  console.log(isSuperAdmin.value)
}
// else if (!userToken) {
//   router.push('/')
//}
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
        <input type="text" placeholder="Search" class="input input-bordered" />
      </div>
      <Register />
      <RouterLink v-if="isSuperAdmin" class="btn" to="/admin">Admin</RouterLink>
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img
              src="https://res.cloudinary.com/dnzb3s4a0/image/upload/v1680856051/raddit/wholeRaddit_x3fbys.png"
            />
          </div>
        </label>
        <ul
          tabindex="0"
          class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52"
        >
          <li>
            <a class="justify-between">
              Profile
              <span class="badge">New</span>
            </a>
          </li>
          <li><a>Settings</a></li>
          <li><a>Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</template>
