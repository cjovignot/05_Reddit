<script setup>
import { ref } from 'vue';
import UploadImageComponent from '../components/UploadImageComponent.vue';
import { useImageStore } from '@/stores/ImageStore';
import axios from 'axios';
import { createToaster } from '@meforma/vue-toaster';

const imageStore = useImageStore();
const toaster = createToaster({
  /* options */
})

let subraddit_name = ref('');
let about = ref('');
let author_id = JSON.parse(localStorage.user);

function createSubraddit() {
  
  let object =  {
        name: subraddit_name.value,
        author_id: author_id.id,
        about: about.value,
        subraddit_picture_URL: imageStore.imageUrl,
    };
  console.log('My new subraddit : ', object);

  let config = {
        method: 'post',
        maxBodyLength: Infinity,
        url: 'http://127.0.0.1:8000/api/r/create',
        headers: {
          Accept: 'application/vnd.api+json',
          'Content-Type': 'application/vnd.api+json',
          Authorization: `Bearer ${localStorage.getItem('userToken')}`,
        },
        data : object
    };
    axios.request(config)
    .then((response) => {
        console.log(JSON.stringify(response.data));
        toaster.success('Subraddit created successfully');
    })
    .catch((error) => {
        console.log(error);
    });
}
</script>

<template>
  <div style="display: flex;flex-direction: column;">
    <div style="display: flex; justify-content: space-between;">
      <input placeholder="Please type your Subraddit title" type="text" v-model="subraddit_name" class="input input-bordered title_input"/>
      <input placeholder="Please type your Subraddit description" type="text" v-model="about" class="input input-bordered title_input"/>
    </div>
    <button class="btn btn-outline btn-success" @click="createSubraddit()">Create</button>
    <div>
      <UploadImageComponent />
    </div>
    
    <div class="divider"></div>
  </div>
</template>

<style scoped>
.title_input, button, input {
  margin: 0 10px;
}
.title_input {
  width: -webkit-fill-available;
  max-width: 89%;
}
img {
  border: 1px white solid;
  width: 100px;
  height: 100px;
}
</style>