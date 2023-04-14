<script setup>
import { usePostStore } from '../stores/PostStore'
import { useRoute } from 'vue-router'
const postStore = usePostStore()

const url = useRoute()
console.log(url.params.subraddit_name)
console.log(url.params.postId)

postStore.getOnePost(url.params.subraddit_name, url.params.postId)
</script>

<template>
  <h1>post page</h1>
</template>
