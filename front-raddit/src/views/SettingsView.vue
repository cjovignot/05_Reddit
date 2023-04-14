<script setup>
// import { AdvancedImage } from '@cloudinary/vue'
// import { Cloudinary } from '@cloudinary/url-gen'
import UploadImageComponent from '../components/UploadImageComponent.vue'
import { useImageStore } from '../stores/ImageStore'
// import { useAuthStore } from '../stores/useAuthStore'
import { useAuthStore } from '../stores/AuthStore'
import { storeToRefs } from 'pinia'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
const imageStore = useImageStore()
// const authStore = useAuthStore()
const router = useRouter()

const authStore = useAuthStore()

const { loggedIn, user } = storeToRefs(authStore)

// const { isSuperA } = storeToRefs(authStore)
console.log(loggedIn)
// REDIRECTION IF NOT TOP ADMIN LOGGED IN
if (loggedIn.value == false) {
  console.log('not super a')
  router.push('/')
  // console.log(userData.king_admin)
  // if (userData.king_admin !== 1 && userToken) router.push('/')
}
let userName
const userLocal = JSON.parse(localStorage.getItem('user'))
try {
  const userPicLocal = userLocal.profile_picture_URL
  const bannerPicLocal = userLocal.banner_picture_URL
  userName = ref(userLocal.name)
  console.log(userPicLocal)
  console.log(bannerPicLocal)
} catch (err) {
  console.log(err)
}

//pinia to get user name
// import { useAdminStore } from '../stores/AdminStore'

const { imageUrl, picId } = storeToRefs(imageStore)
// const { user } = storeToRefs(authStore)

if (imageStore.imageUrl !== '') {
  console.log('inside if image condition')
  imageStore.storeImage
}

const updateName = (event) => {
  // console.log(event)
  // console.log(event.key)

  console.log(userName.value)
  if (event.key == 'Enter') {
    event.target.blur()
    //call to pinia auth store to update
    authStore.editUserName(userName.value)
  }

  // updateCatToDb()
}

console.log(authStore.user.name)
</script>

<template>
  <h1 class="text-3xl font-bold text-center">User settings</h1>
  <div class="flex justify-center">
    <div class="flex flex-col justify-center content-center max-w-[50%] m-2">
      <label for="username">change name:</label>
      <input
        v-on:focusout="updateName"
        v-on:keyup.enter="updateName($event)"
        name="username"
        type="text"
        v-model="userName"
        class="input input-ghost w-full max-w-xs"
      />

      <!-- <input
        v-on:focusout="updateCat"
        v-on:keyup.enter="updateCat($event)"
        type="text"
        v-model="categoryName"
        class="input input-ghost w-full max-w-xs font-bold"
      /> -->
      <div>
        <span>IMAGES</span>
        <hr />
      </div>
      <article class="flex">
        <section class="flex flex-col">
          <div class="avatar flex flex-col m-5 mb-0">
            <h3 class="text-xl">Avatar and banner image</h3>
            <span>Images must be .png or .jpg format</span>
            <div v-if="imageStore.imageUrl && picId == 'user'" class="w-24 mask mask-squircle">
              <!-- <AdvancedImage :cldImg="myImg" /> -->
              <img :src="imageUrl" alt="User profile image" />
            </div>
            <div v-else-if="userPicLocal" class="w-24 mask mask-squircle">
              <!-- <AdvancedImage :cldImg="myImg" /> -->
              <img :src="imageUrl" alt="User profile image" />
            </div>
            <div class="w-24 mask mask-squircle" v-else-if="user.profile_picture_URL">
              <img :src="user.profile_picture_URL" alt="User profile image" />
            </div>
            <div v-else class="w-24 mask mask-squircle">
              <!-- <AdvancedImage :cldImg="myImg" /> -->

              <img
                src="https://res.cloudinary.com/dbivyjzla/image/upload/v1681285175/wholeRaddit_rxzaqn.png"
                alt="User default profile image"
              />
            </div>
          </div>
          <div class="ml-20 -translate-y-3">
            <!-- <UploadImageComponent :upload_origin="user" /> -->
            <UploadImageComponent id="user" />
          </div>
        </section>
        <section class="mt-6">
          <div class="max-h-96 hero bg-base-200 border-2 border-dotted rounded-xl p-2">
            <div class="hero-content text-center">
              <div class="max-w-md">
                <p class="py-6">Upload Banner Image</p>

                <UploadImageComponent id="banner" />
                <!-- <UploadImageComponent /> -->
                <div
                  v-if="imageStore.imageUrl && picId == 'banner'"
                  class="claartboard artboard-horizontal phone-6"
                >
                  <!-- <AdvancedImage :cldImg="myImg" /> -->
                  <img :src="imageUrl" alt="User profile image" />
                </div>
                <div v-else-if="user.banner_picture_URL != ''">
                  <img :src="user.banner_picture_URL" alt="User banner image" />
                </div>
                <div v-else>
                  <!-- <AdvancedImage :cldImg="myImg" /> -->
                  <img
                    class="max-h-16"
                    src="https://res.cloudinary.com/dbivyjzla/image/upload/v1681320189/banners/pexels-lukas-rodriguez-3473085_djhzyy.jpg"
                    alt="User default banner image"
                  />
                </div>
              </div>
            </div>
          </div>
        </section>
      </article>
    </div>
  </div>
</template>
