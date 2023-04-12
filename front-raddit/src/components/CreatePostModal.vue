<script setup>
import { ref } from 'vue';
import UploadImage from './UploadImageComponent.vue';
import { useImageStore } from '@/stores/ImageStore';
import { formToJSON } from 'axios';

let post_title = ref('');
let post_content = ref('');
let new_post = ref({});

let nsfw = ref('');
let OC = ref('');
let spoiler = ref('');
let author_id = JSON.parse(localStorage.user);

const imageStore = useImageStore();

function getInput() {
    if (nsfw.value === true) {
        nsfw.value = 1;
    } else {
        nsfw.value = 0;
    }
    if (OC.value === true) {
        OC.value = 1;
    } else {
        OC.value = 0;
    }
    if (spoiler.value === true) {
        spoiler.value = 1;
    } else {
        spoiler.value = 0;
    }
    let object =  {
        title: post_title.value,
        author_id: author_id.id,
        subraddit_name: "Rosenbaum LLC",
        nsfw: nsfw.value,
        OC: OC.value,
        spoiler: spoiler.value,
        content: post_content.value,
        img_url: imageStore.imageUrl,
    };
    
    console.log("Future post : ", object);
    
    // $new_post = {
        //     title => $post_title,
        //     content => $post_content,
        //     image => $img_url,
        // };
    }
    

</script>

<template>
    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <h3 class="font-bold text-lg" style="text-align: center; margin-bottom: 20px;">POST CREATION</h3>
        <div class="alert alert-error shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Be careful, if you choose a picture, you won't be able to write a post content !</span>
            </div>
        </div>
        <UploadImage />
        <div id="input_div">
            <input v-model="post_title" type="text" placeholder="Your title" class="input input-bordered input-md w-full" />
            <textarea v-model="post_content" class="textarea textarea-bordered textarea-sm w-full" placeholder="Your content" style="margin: 10px 0;" v-if="!imageStore.imageUrl" ></textarea>
        </div>
        <div class="form-control">
            <label class="cursor-pointer label">
                <span class="label-text">NSFW content</span>
                <input v-model="nsfw" type="checkbox" checked="checked" class="checkbox checkbox-success" />
            </label>
            <label class="cursor-pointer label">
                <span class="label-text">OC content</span>
                <input v-model="OC" type="checkbox" checked="checked" class="checkbox checkbox-success" />
            </label>
            <label class="cursor-pointer label">
                <span class="label-text">Spoiler content</span>
                <input v-model="spoiler" type="checkbox" checked="checked" class="checkbox checkbox-success" />
            </label>
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