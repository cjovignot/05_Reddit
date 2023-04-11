<script setup>
const widget = window.cloudinary.createUploadWidget(
  {
    cloud_name: 'dbivyjzla',
    upload_preset: 'ml_default'
  },
  (error, result) => {
    if (!error && result && result.event === 'success') {
      console.log(result.info.url)
    }
  }
)
const openModal = () => {
  widget.open()
}
</script>

<template>
  <button class="border-2 rounded-full p-2" @click="openModal">
    <i class="fa-solid fa-camera-retro"></i>
  </button>
</template>

<style>
#uw-glamor-3331 .css-5leaax,
#uw-glamor-3331 [data-css-5leaax] {
  background-color: rgb(217, 90, 22);
}
</style>
