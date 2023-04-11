<script setup>
import { propsToAttrMap } from '@vue/shared';
import Vote from "../components/VoteComponent.vue"
import { defineProps } from 'vue';

let props =defineProps({
    SubRadditTitle: String,
    Author: String,
    PostTitle: String,
    PostBody: String,
})

</script>

<template>

    <div class="flex flex-row bg-red-500 w-2/3">
        <div class="w-16 bg-green-100 w-[5%] " >
            <Vote></Vote>
        </div>

        <div class ="flex flex-col bg-green-400 w-[100%] ">

            <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%]" >
                <!-- <img src="../assets/images/slicedRaddit.png " class="object-contain p-0 object-cover">{{ SubRadditTitle }} -->
                posted by {{ Author }}  
            </div>

            <div class="text-slate-950">
                <div class="flex flex-row">{{ PostTitle }}</div>
                <div class="flex flex-row">{{ PostBody }}</div>
            </div>
            

            <div class="flex flex-row bg-slate-400 text-gray-500 h-[20%] mt-auto ">
                <div class="inline">📜</div>
                <div class="inline">⤴️</div>
            </div>
        </div>
    </div>

</template>
<style scoped>
</style>
