<script setup>
import { AdvancedImage } from '@cloudinary/vue'
import { Cloudinary } from '@cloudinary/url-gen'
import UploadImageComponent from '../components/UploadImageComponent.vue'
import { useImageStore } from '../stores/ImageStore'
import { storeToRefs } from 'pinia'
const imageStore = useImageStore()

//pinia to get user name
// import { useAdminStore } from '../stores/AdminStore'

const { imageUrl } = storeToRefs(imageStore)

const cld = new Cloudinary({
  cloud: {
    cloudName: 'demo'
  }
})
const myImg = cld.image('docs/models')
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
            <div class="w-24 mask mask-squircle">
              <AdvancedImage :cldImg="myImg" />
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
              </div>
            </div>
          </div>
        </section>
      </article>
    </div>
  </div>
</template>
