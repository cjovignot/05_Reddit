<script setup>
import { ref } from 'vue';

import Quill from './QuillComponent.vue'
import UploadImage from './UploadImageComponent.vue'

let post_title = ref('');
function getInput() {
    console.log(post_title);
}


</script>

<template>
    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <h3 class="font-bold text-lg" style="text-align: center; margin-bottom: 20px;">POST CREATION</h3>
        <h1>Import a picture</h1>
        <UploadImage />
        <div id="input_div">
            <input v-model="post_title" type="text" placeholder="Your title" class="input input-bordered input-md w-full" />
            <Quill />
        </div>
        <div class="divider"></div>
        <div class="modal-action" style="display: flex; justify-content:space-between;">
            <label class="btn btn-outline btn-error" for="my-modal-5">Cancel</label>
            <button class="btn btn-outline btn-success" @click="getInput()">Post</button>
        </div>
    </div>
    </div>
</template>

<style scoped>
#input_div {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: center;
}
#input_div textarea {
    width: 100%;
}
</style>