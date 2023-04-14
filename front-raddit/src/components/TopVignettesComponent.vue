<script setup>
import { ref } from 'vue'

let user_infos = ref({});
let banner_url = ref('');
user_infos.value = localStorage.user

banner_url.value = JSON.parse(user_infos.value);
console.log(banner_url.value);
</script>


<template>
    <!-- {{ url }} -->
<div class="card w-96 bg-base-100 shadow-xl">
  <figure><img :src=banner_url.value alt="" /></figure>
  <div class="card-body">
    <h2 class="card-title">UserName</h2>
    <p>About</p>
  </div>
</div>
</template>

<style scoped>

</style>