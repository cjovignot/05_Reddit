<script setup>
import { ref } from 'vue'
import { createToaster } from '@meforma/vue-toaster'
import { useImageStore } from '../stores/ImageStore'
const imageStore = useImageStore()

const props = defineProps({ id: String })

const id = ref(props.id)
// const { imageUrl } = storeToRefs(imageStore)
const url = ref('')
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

      // 🍍
      imageStore.storeImage(result.info.url, id.value)

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
    <h1 v-if="!imageStore.imageUrl">Import a picture</h1>
    <img style="height: auto; width: 50px" :src="url" alt="" />
    
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
