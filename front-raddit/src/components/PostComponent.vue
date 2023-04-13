<script setup>
import Vote from "../components/VoteComponent.vue"
import { defineProps } from 'vue';

let props =defineProps({
    post: Object,
})
console.log(props.post)
</script>

<template>

    <div class="flex flex-row bg-red-500 w-[100%] text-sm">
        <div class="w-16 bg-green-100 w-[5%] " >
            <Vote></Vote>
        </div>

        <div class ="flex flex-col bg-green-400 w-[100%] ">

            <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%]" >
                <div class="w-[2.5%] rounded-xl bg-green-100">
                    <img src="../assets/images/wholeRaddit.png" />
                </div>
                {{ post.subraddit_id }}
                posted by {{ post.author_id }}  
            </div>

            <div class="text-slate-950">
                <div class="flex flex-row font-bold text-lg ">{{ post.title }}</div>
                <div class="flex flex-row text-base">
                    <img :src=post.img_url>
                </div>

                <div class="flex flex-row text-base">{{ post.content }}</div>
            </div>
            

            <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%] mt-auto ">
                <div class="inline">📜 comment</div>
                <div class="inline">⤴️ share</div>
                <div class="inline">⤴️ report</div>

            </div>
        </div>
    </div>

</template>
<style scoped>
</style>
