<script setup>
import { ref } from 'vue';
import UploadImageComponent from '../components/UploadImageComponent.vue';
import TopVignette from '../components/TopVignettesComponent.vue';
import { useImageStore } from '@/stores/ImageStore';
import axios from 'axios';
import { createToaster } from '@meforma/vue-toaster';
import { RouterLink } from 'vue-router';

const imageStore = useImageStore();
const toaster = createToaster({
  /* options */
})

let subraddit_name = ref('');
let about = ref('');
let author_id = JSON.parse(localStorage.user);
let subsUser = ref([]);

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
        url: 'http://127.0.0.1:8000/api/r/create/' + author_id.id,
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
    
    // GET ALL Subraddits From Current User
    let objects =  {
  name: subraddit_name.value,
  author_id: author_id.id,
  about: about.value,
  subraddit_picture_URL: imageStore.imageUrl,
};
// console.log('My new subraddit : ', objects);

let config = {
  method: 'get',
  maxBodyLength: Infinity,
  url: 'http://127.0.0.1:8000/api/r/subraddits/' + author_id.id,
  headers: {
    Accept: 'application/vnd.api+json',
    'Content-Type': 'application/vnd.api+json',
    Authorization: `Bearer ${localStorage.getItem('userToken')}`,
  },
  data : objects
};
axios.request(config)
.then((response) => {
  // console.log(JSON.stringify(response.data));
    subsUser.value = response.data;
    console.log(subsUser.value);
    return subsUser;
  })
  .catch((error) => {
      console.log(error);
    });

</script>

<template>    
  <section>
    <div class="create">
      <UploadImageComponent />
      <div style="display: flex; flex-direction: column; min-width: 480px;">
        <input placeholder="Please type your Subraddit title" type="text" v-model="subraddit_name" class="input input-bordered title_input"/>
        <textarea placeholder="Please type your Subraddit description" type="text" v-model="about" class="input input-bordered title_input"></textarea>
      </div>
        <button class="btn btn-outline btn-success" @click="createSubraddit()">Create</button>
    </div>
    <TopVignette />
  </section>

    <div class="divider"></div> 
  <div class="links">
        <h1 class="text-3xl font-bold">ALL YOUR SUBRADDITS</h1>
      <div class="divider"></div> 
        <div v-for="(sub, index) in subsUser" :key="index" >
          <a class="btn btn-ghost" routerLink="/user/{{sub.name}}">{{ sub.name }}</a>
        </div>
  </div>


</template>

<style scoped>
.title_input, button, input {
  margin: 10px 10px;
}
button {
  width: 100px;
  align-self: center;
}
.title_input {
  /* width: -webkit-fill-available;
  max-width: 89%; */
}
textarea {
  min-height: 126px;
  padding-top: 12px;
}
img {
  border: 1px white solid;
  width: 100px;
  height: 100px;
}
.links {
  display: flex;
  flex-direction: column;
  width: 80%;
  margin: auto;
  align-items: center;

}
.divider {
  display: flex;
  flex-direction: row;
  align-items: center;
  width: 60%;
  margin: auto;
  align-self: stretch;
  margin-top: 1rem;
  margin-bottom: 1rem;
  height: 1rem;
  white-space: nowrap;
}
a {
  justify-content: flex-start;
  width: 300px;
  border: 1px #1f293e solid;
  margin: 3px 0px;
}

section {
  display: flex;
  margin: auto;
  width: 80%;
  justify-content: space-between;
}
.create {
  display: flex;
}
</style>