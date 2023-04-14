<script setup>
// import { ref } from 'vue'
// import { useImageStore } from '@/stores/ImageStore'
// import axios from 'axios'
// import { createToaster } from '@meforma/vue-toaster'
// import { RouterLink } from 'vue-router'
import { useSubradditStore } from '../stores/SubradditStore'
import Post from '../components/PostComponent.vue'

import { useRoute } from 'vue-router'
const url = useRoute()
console.log(url.params.subraddit_name)

const subradditStore = useSubradditStore()

subradditStore.getSubInfo(url.params.subraddit_name)

window.onscroll = () => {
  let bottomOfWindow =
    document.documentElement.scrollTop + window.innerHeight ===
    document.documentElement.offsetHeight
  if (bottomOfWindow) {
    subradditStore.page++
    console.log(subradditStore.page)
    subradditStore.getSubPosts()
  }
}
</script>

<template>
  <div class="ctnr_top">
    <div class="ctnr_field topSubRaddit1">
      <h1>top posts</h1>
      <img src="../assets/images/300pxBurriedRaddit.png" />Oui oui les baguettes 🥖
    </div>
    <div class="ctnr_field topSubRaddit2">
      <img src="../assets/images/100pxBurriedRaddit.png" />Apéro a 17h30 chez Arthur 🍾
    </div>
    <div class="ctnr_field topSubRaddit3">
      <img src="../assets/images/230pxBurriedRaddit.png" />1001 recettes autour du Radis
    </div>
    <div class="ctnr_field topSubRaddit4">
      <img src="../assets/images/150pxBurriedRaddit.png" />Radineurs
    </div>
  </div>
  <body>
    <LeftPanelComponent class="hidden" />
    <section class="page">
      <!-- *** POSTS *** -->
      <div class="flex flex-col w-[78%] m-auto mb-5" v-if="subradditStore.posts != undefined">
        <div v-for="posty in subradditStore.posts">
          <div v-for="post in posty" class="pb-10">
            <Post :post="post" />
          </div>
        </div>
      </div>
    </section>
  </body>

  <!-- {{ subradditStore.subradInfo.id }}
  <br />
  <br />
  <br />        <div class="flex flex-col  w-[78%] m-auto mb-5" v-if="subradditStore.posts != undefined">          
          <div v-for="posty in subradditStore.posts" class="pb-10">
            <div v-for="posted in posty" class="pb-10">

  {{ subradditStore.posts }}
  </div>  </div>

  </div>
  <br />
  <h1 class="text-3xl text-center">{{ subradditStore.subradInfo.name }}</h1>
  <p class="text-2xl text-center">{{ subradditStore.subradInfo.about }}</p> -->
</template>

<style scoped>
.ctnr_top {
  display: flex;
  margin: 20px auto;
  width: 80%;
}
.ctnr_filter {
  display: flex;
  flex-direction: row;
  background-color: bisque;
  width: 78%;
  margin: 20px auto;
}
.ctnr_field {
  align-items: center;
  margin: 0 10px;
}

.page {
  display: flex;
  flex-direction: column;
  width: 80%;
  height: auto;
}
</style>
