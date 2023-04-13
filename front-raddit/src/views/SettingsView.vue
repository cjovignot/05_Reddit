<script setup>
import { AdvancedImage } from '@cloudinary/vue'
import { Cloudinary } from '@cloudinary/url-gen'
import UploadImageComponent from '../components/UploadImageComponent.vue'
import { useImageStore } from '../stores/ImageStore'
// import { useAuthStore } from '../stores/useAuthStore'
import { storeToRefs } from 'pinia'
const imageStore = useImageStore()
// const authStore = useAuthStore()

//pinia to get user name
// import { useAdminStore } from '../stores/AdminStore'

const { imageUrl } = storeToRefs(imageStore)
// const { user } = storeToRefs(authStore)

if (imageStore.imageUrl !== '') {
  console.log('inside if image condition')
  imageStore.storeImage
}

const cld = new Cloudinary(
  'https://res.cloudinary.com/dbivyjzla/image/upload/v1681320191/banners/pexels-vikki-106829_lsradk.jpg',
  {
    cloud: {
      cloudName: 'raddit'
    }
  }
)
const myImg = cld.image('raddit')
</script>

<template>
  <div v-if="imageStore.imageUrl">
    <h1>IMAGE UPLOADED</h1>

    {{ imageUrl }}
  </div>
  <h1 class="text-3xl font-bold text-center">User settings</h1>
  <div class="flex justify-center">
    <div class="flex flex-col justify-center content-center max-w-[50%] m-2">
      <label for="username">change name:</label>
      <input
        name="username"
        type="text"
        placeholder="Change name"
        class="input input-ghost w-full max-w-xs"
      />
      <div>
        <span>IMAGES</span>
        <hr />
      </div>
      <article class="flex">
        <section class="flex flex-col">
          <div class="avatar flex flex-col m-5 mb-0">
            <h3 class="text-xl">Avatar and banner image</h3>
            <span>Images must be .png or .jpg format</span>
            <div v-if="imageStore.imageUrl" class="w-24 mask mask-squircle">
              <!-- <AdvancedImage :cldImg="myImg" /> -->
              <img :src="imageUrl" alt="User profile image" />
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
                <div v-if="imageStore.imageUrl" class="w-24 mask mask-squircle">
                  <!-- <AdvancedImage :cldImg="myImg" /> -->
                  <img :src="imageUrl" alt="User profile image" />
                </div>
                <div v-else class="w-24 mask mask-squircle">
                  <!-- <AdvancedImage :cldImg="myImg" /> -->
                  <img
                    src="https://res.cloudinary.com/dbivyjzla/image/upload/v1681285175/wholeRaddit_rxzaqn.png"
                    alt="User default profile image"
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
