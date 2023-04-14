<script setup>
import { usePostStore } from '../stores/PostStore'
import { storeToRefs } from 'pinia'

import { useRoute } from 'vue-router'
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
  <div v-bind:key="index" v-for="(comment, index) in postStore.comments.reverse()">
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
