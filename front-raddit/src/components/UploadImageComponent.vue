<script setup>
import { ref } from 'vue'
import { createToaster } from '@meforma/vue-toaster'
import { useImageStore } from '../stores/ImageStore'
import { useRoute } from 'vue-router'
import { useAuthStore } from '../stores/AuthStore'

const userData = JSON.parse(localStorage.getItem('user'))

const authStore = useAuthStore()
// import { ref, defineProps } from 'vue'
const url = useRoute()
console.log(url.name)
const urlName = url.name
const imageStore = useImageStore()

console.log(urlName)

const props = defineProps({ id: String })

const id = ref(props.id)
// const { imageUrl } = storeToRefs(imageStore)
// const url = ref('')
const toaster = createToaster({
  /* options */
})
//window.cloudinary.createUploadWidget
const widget = window.cloudinary.createUploadWidget(
  {
    cloudName: 'dbivyjzla',
    uploadPreset: 'ml_default'
  },
  (error, result) => {
    if (!error && result && result.event === 'success') {
      url.value = result.info.url
      console.log(url.value)

      imageStore.storeImage(result.info.url, id.value)

      // if on settings page
      if (urlName == 'Settings') authStore.getUser(userData.id)

      toaster.success('Picture uploaded successfully')
      return url
    }
  }
)
const openModal = () => {
  console.log(id.value)
  // imageStore.storeId(id.value)

  widget.open()
}
</script>

<template>
  <div class="upload">
    <button class="border-2 rounded-full p-2" @click="openModal" style="margin: 10px">
      <i class="fa-solid fa-camera-retro"></i>
    </button>
    <h1 v-if="!imageStore.imageUrl && urlName != 'Settings'">Import a picture</h1>
    <img v-if="urlName != 'Settings'" style="height: auto; width: 50px" :src="url" alt="" />
  </div>
</template>

<style>
#uw-glamor-3331 .css-5leaax,
#uw-glamor-3331 [data-css-5leaax] {
  background-color: rgb(217, 90, 22);
}
.upload {
  display: flex;
  align-items: center;
}
</style>
