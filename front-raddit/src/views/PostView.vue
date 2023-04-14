<script setup>
import { usePostStore } from '../stores/PostStore'
import { storeToRefs } from 'pinia'

import { useRoute } from 'vue-router'
import Vote from '../components/VoteComponent.vue'

import { ref } from 'vue'
const postStore = usePostStore()
const commentInput = ref('')

const { comments } = storeToRefs(postStore)

const url = useRoute()
console.log(url.params.subraddit_name)
console.log(url.params.postId)

postStore.getOnePost(url.params.postId)
postStore.getAllComms(url.params.postId)

const commentHandler = (postId) => {
  console.log({ postId })
  postStore.createComm(url.params.postId, commentInput.value)
}
</script>

<template>
  <div class="flex flex-row w-[100%] text-sm">
    <div class="w-16 bg-green-100 w-[5%]">
      <vote :post="postStore.post.crops" />
    </div>
    <div class="flex flex-col bg-slate-100 w-[100%]">
      <div class="flex flex-row bg-green-400 text-gray-500 h-[20%]">
        <div class="w-[2.5%] rounded-xl bg-green-100">
          <img src="../assets/images/wholeRaddit.png" />
        </div>
        <div class="font-bold">{{ postStore.post.sname }}</div>
        <span class="ml-2 mr-2"> posted by </span> {{ postStore.post.uname }}
      </div>
      <div class="bg-gradient-to-b from-pink-400 to-slate-100 text-slate-950">
        <div class="flex flex-row font-bold text-xl">{{ postStore.post.title }}</div>
        <br />
        <div class="flex flex-row text-base text-lg">{{ postStore.post.content }}</div>
      </div>

      <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%] mt-auto">
        <div class="inline">⤴️ share</div>
        <div class="inline">⤴️ report</div>
      </div>
    </div>
  </div>
  <br />

  <h1>post page</h1>
  <div>
    <input
      v-model="commentInput"
      type="text"
      placeholder="Comment here"
      class="input input-bordered w-full max-w-xs"
    />
    <button class="btn" @click="commentHandler(postStore.post.id)">send</button>
  </div>

  <!-- daisy -->
  <div v-bind:key="index" v-for="(comment, index) in comments">
    <div class="chat chat-start">
      <div class="chat-image avatar">
        <div class="w-10 rounded-full">
          <img
            src="https://res.cloudinary.com/dbivyjzla/image/upload/v1681317624/imgs_people/pexels-sam-qeja-2049171_v02sec.jpg"
          />
        </div>
      </div>
      <div class="chat-bubble">{{ comment.content }}</div>
    </div>
  </div>
</template>
