<script setup>
import { ref } from 'vue'

import * as dayjs from 'dayjs';
import * as relativeTime from 'dayjs/plugin/relativeTime';
import * as calendar from 'dayjs/plugin/calendar';

dayjs.extend(relativeTime);
dayjs.extend(calendar)

let user_infos = ref({});
let banner_url = ref('');
let name = ref('');
let about = ref('');
user_infos.value = localStorage.user

user_infos.value = JSON.parse(user_infos.value);
console.log(user_infos.value.name);
banner_url.value = user_infos.value.banner_picture_URL;
name.value = user_infos.value.name;
about.value = user_infos.value.created_at;

</script>


<template>
<div class="card w-96 bg-base-100 shadow-xl">
  <figure><img :src=banner_url alt="" /></figure>
  <div class="card-body">
    <h2 class="card-title">{{name}}</h2>
    <p>Registered since : {{ dayjs(about).calendar() }}</p>
  </div>
</div>
</template>

<style scoped>
img {
    width: 100%;
    height: auto;
}
</style>