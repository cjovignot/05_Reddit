<script setup>
import Vote from "../components/VoteComponent.vue"
import { defineProps } from 'vue';

let props =defineProps({
    post: Object,
})

function genUrl(id)
{
 return "/p/" + id;
}
function genUrls(id)
{
 return "/r/" + id;
}

</script>

<template>
    <div class="flex flex-row bg-green-100 w-[100%] text-sm">
        <div class="w-16 bg-green-100 w-[7%] m-2" >
            <vote
            :post=post.crops
            />        </div>

        <div class ="flex flex-col bg-slate-100 w-[100%] ">

            <div class="flex flex-row bg-green-400 text-gray-500 h-[25%]" >
                <div class="w-[5.5%] rounded-xl bg-green-100">
                    <img src="../assets/images/wholeRaddit.png" />
                </div>
                <RouterLink :to="genUrls(post.sname)" ><div class="font-bold">{{ post.sname }}   </div>     </RouterLink><span class="ml-2 mr-2"> posted by </span> {{ post.uname }}  
            </div>

            <RouterLink :to="genUrl(post.id)" >

            <div class="bg-gradient-to-b from-pink-400 to-slate-100 text-slate-950">
                <div class="flex flex-row font-bold text-lg ml-2">{{ post.title }}</div>
                <div class="flex flex-row text-base">
                    <img :src=post.img_url class="w-[100%]">
                </div>

                <div class="flex flex-row text-base m-3">{{ post.content }}</div>
            </div>
        </RouterLink>

            <div class="flex flex-row bg-slate-100 text-gray-600 h-[20%] mt-auto ">
                <div class="inline">📜 comment</div>
                <div class="inline">⤴️ share</div>
                <div class="inline">⤴️ report</div>

            </div>
        </div>
    </div>

</template>
<style scoped>
</style>
