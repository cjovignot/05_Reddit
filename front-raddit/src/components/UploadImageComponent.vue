<script setup>
import {ref} from 'vue';
import { createToaster } from "@meforma/vue-toaster";
const url = ref('');
const toaster = createToaster({ /* options */ });
const widget = window.cloudinary.createUploadWidget(
  {
    cloud_name: 'dbivyjzla',
    upload_preset: 'ml_default'
  },
  (error, result) => {
    if (!error && result && result.event === 'success') {
      url.value = result.info.url;
      console.log(url.value);
      toaster.success('Picture uploaded successfully');
      return url;
    }
  }
)
const openModal = () => {
  widget.open()
}
</script>

<template>
    <button class="border-2 rounded-full p-2" @click="openModal" style="margin: 10px;" >
      <i class="fa-solid fa-camera-retro"></i>
    </button>
  <img style="height: auto; width: 50px;" :src="url" alt="">
</template>

<style>
#uw-glamor-3331 .css-5leaax,
#uw-glamor-3331 [data-css-5leaax] {
  background-color: rgb(217, 90, 22);
}
</style>
