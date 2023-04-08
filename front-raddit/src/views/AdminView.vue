<script setup>
import { useAdminStore } from '../stores/AdminStore'
import { ref } from 'vue'

const adminStore = useAdminStore()

const dropValue = ref('')

const getDropVal = (e) => {
  // console.log(e.target.dataset.value)
  dropValue.value = e.target.dataset.value
  console.log(dropValue.value)
}
</script>

<template>
  <div class="stats stats-vertical lg:stats-horizontal shadow">
    <div class="stat">
      <div class="stat-title">non admin user number</div>
      <div class="stat-value">
        <span> {{ adminStore.userCount }}</span>
      </div>
    </div>

    <div class="stat">
      <div class="stat-title">total number of users</div>
      <div class="stat-value">
        <span> {{ adminStore.totalCount }}</span>
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
          <button class="btn btn-outline btn-error" v-if="user.king_admin == 0">Delete</button>
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
</template>
