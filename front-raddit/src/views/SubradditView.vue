<script setup>
// import { ref } from 'vue'
// import { useImageStore } from '@/stores/ImageStore'
// import axios from 'axios'
// import { createToaster } from '@meforma/vue-toaster'
// import { RouterLink } from 'vue-router'
import { useSubradditStore } from '../stores/SubradditStore'

import { useRoute } from 'vue-router'
const url = useRoute()
console.log(url.params.subraddit_name)

const subradditStore = useSubradditStore()

subradditStore.getSubInfo(url.params.subraddit_name)
</script>

<template>
  {{ subradditStore.subradInfo }}
  <br />
  <br />
  <br />
  {{ subradditStore.posts }}
  <br />
  <h1 class="text-3xl text-center">{{ subradditStore.subradInfo.name }}</h1>
  <p class="text-2xl text-center">{{ subradditStore.subradInfo.about }}</p>
</template>

<style scoped></style>
