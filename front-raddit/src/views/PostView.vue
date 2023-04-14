<script setup>
import { usePostStore } from '../stores/PostStore'
import { useRoute } from 'vue-router'
import Vote from "../components/VoteComponent.vue"

const postStore = usePostStore()

const url = useRoute()
console.log(url.params.subraddit_name)
console.log(url.params.postId)

postStore.getOnePost(url.params.postId)
</script>

<template>
      <div class="flex flex-row w-[100%] text-sm">

          <div class="w-16 bg-green-100 w-[5%] " >
            <vote
            :post=postStore.post.crops
            />        </div>
            <div class ="flex flex-col bg-slate-100 w-[100%] ">
                
                <div class="flex flex-row bg-green-400 text-gray-500 h-[20%]" >
                    <div class="w-[2.5%] rounded-xl bg-green-100">
                        <img src="../assets/images/wholeRaddit.png" />
                    </div>
                    <div class="font-bold">{{ postStore.post.sname }}</div> <span class="ml-2 mr-2"> posted by </span> {{ postStore.post.uname }}  
                </div>  
                <div class="bg-gradient-to-b from-pink-400 to-slate-100 text-slate-950">

                  <div class="flex flex-row font-bold text-xl ">{{ postStore.post.title }}</div>
                  <br>
                  <div class="flex flex-row text-base text-lg">{{ postStore.post.content }}</div>
                </div>

                  
                  
                  <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%] mt-auto ">
                    <div class="inline">⤴️ share</div>
                    <div class="inline">⤴️ report</div>
                    
                  </div>
            </div>
      </div>
  <br>

  <h1>post page</h1>
</template>
