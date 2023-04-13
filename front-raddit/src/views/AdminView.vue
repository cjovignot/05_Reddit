<script setup>
import { storeToRefs } from 'pinia'
import { useAdminStore } from '../stores/AdminStore'
import { ref } from 'vue'
// import axios from 'axios'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/AuthStore'

const router = useRouter()

// const userToken = localStorage.getItem('userToken')
// const userData = JSON.parse(localStorage.getItem('user'))

const authStore = useAuthStore()

// const isSuperAdmin = ref(false)

const { isSuperA } = storeToRefs(authStore)

console.log(isSuperA.value)
// REDIRECTION IF NOT TOP ADMIN LOGGED IN
if (isSuperA.value == false) {
  console.log('not super a')
  router.push('/')
  // console.log(userData.king_admin)
  // if (userData.king_admin !== 1 && userToken) router.push('/')
}

const adminStore = useAdminStore()

adminStore.getUsers()
const { totalCount, userCount } = storeToRefs(adminStore)

const dropValue = ref('')

const getDropVal = (e) => {
  // console.log(e.target.dataset.value)
  dropValue.value = e.target.dataset.value
  console.log(dropValue.value)
}

const deleteAction = (id) => {
  console.log(id)
  adminStore.deleteUser(id)
}
</script>

<template>
  <button @click="adminStore.$reset" class="btn">reset</button>
  <section class="loading flex justify-center w-screen h-screen" v-if="adminStore.isLoading">
    <i class="fa-solid fa-spinner fa-spin fa-2xl self-center" style="color: #ff4300"></i>
  </section>

  <section v-else>
    <div class="stats stats-vertical lg:stats-horizontal shadow">
      <div class="stat">
        <div class="stat-title">non admin user number</div>
        <div class="stat-value">
          <span> {{ userCount }}</span>
        </div>
      </div>

      <div class="stat">
        <div class="stat-title">total number of users</div>
        <div class="stat-value">
          <span> {{ totalCount }}</span>
        </div>
      </div>
    </div>
    <div class="flex flex-col"></div>

    <div class="overflow-x-auto">
      <div class="dropdown dropdown-hover">
        <label tabindex="0" class="btn m-1">FILTER BY:</label> <span>{{ dropValue }}</span>
        <ul
          @click="getDropVal"
          tabindex="0"
          class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
        >
          <li><a data-value="ADMINS">KING/QUEEN ADMIN</a></li>
          <li><a data-value="USERS">ALL USERS</a></li>
        </ul>
      </div>
      <table class="table table-compact w-full">
        <thead>
          <tr>
            <th>index</th>
            <th>User id</th>
            <th>Name</th>
            <th>email</th>
            <th>created at</th>
            <th>king/queen admin</th>
            <th>delete user</th>
          </tr>
        </thead>
        <tbody v-if="dropValue == 'ADMINS'">
          <tr v-for="(user, index) in adminStore.kingAdmin" :key="index">
            <th>{{ index }}</th>
            <th>{{ user.id }}</th>
            <th>{{ user.name }}</th>
            <th>{{ user.email }}</th>
            <th>{{ user.created_at }}</th>

            <th>{{ user.king_admin == 1 ? 'admin' : 'not admin' }}</th>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-for="(user, index) in adminStore.users" :key="index">
            <th>{{ index }}</th>
            <th>{{ user.id }}</th>
            <th>{{ user.name }}</th>
            <th>{{ user.email }}</th>
            <th>{{ user.created_at }}</th>
            <th>{{ user.king_admin == 1 ? 'admin' : 'not admin' }}</th>
            <button
              @click="deleteAction(user.id)"
              class="btn btn-outline btn-error"
              v-if="user.king_admin == 0"
            >
              Delete
            </button>
            <!-- <div>
            <div class="form-control">
              <label class="label cursor-pointer">
                <span class="label-text">Red pill</span>
                <input type="radio" name="radio-10" class="radio checked:bg-red-500" checked />
              </label>
            </div>
            <div class="form-control">
              <label class="label cursor-pointer">
                <span class="label-text">Blue pill</span>
                <input type="radio" name="radio-10" class="radio checked:bg-blue-500" checked />
              </label>
            </div>
          </div> -->
          </tr>
        </tbody>

        <tfoot>
          <tr>
            <th>index</th>
            <th>User id</th>
            <th>Name</th>
            <th>email</th>
            <th>created at</th>
            <th>king/queen admin</th>
            <th>delete user</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </section>
</template>
