<script setup>
import Post from '../components/PostComponent.vue'
import LeftPanelComponent from '../components/LeftPanelComponent.vue'
import { storeToRefs } from 'pinia'
import { usePostStore } from '../stores/PostStore'

const PostStore = usePostStore()

PostStore.getAllPosts()
// Infinity scroll

window.onscroll = () => {
  let bottomOfWindow =
    document.documentElement.scrollTop + window.innerHeight ===
    document.documentElement.offsetHeight
  if (bottomOfWindow) {
    PostStore.page++
    console.log(PostStore.page)
    PostStore.getAllPosts()
  }
}
</script>
<template>
  <!-- *** TOP SUBRADDITS *** -->
  <body class="flex">
    <LeftPanelComponent class="hidden" />
    <section class="page">
    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/300pxBurriedRaddit.png" />Tout sur le Radis</div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/100pxBurriedRaddit.png" />Coucou la coding !</div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/230pxBurriedRaddit.png" />1001 recettes autour du Radis</div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/150pxBurriedRaddit.png" />Radineurs</div>
    </div>

      <!-- *** FILTERBAR *** -->
      <div class="flex flex-row bg-slate-2 00 w-[78%] m-auto mb-10">
        <div class="ctnr_new">🆕</div>
        <div class="ctnr_hot">🔥</div>
      </div>

      <!-- *** POSTS *** -->
      <div class="flex flex-col w-[78%] m-auto mb-5" v-if="PostStore.posts != undefined">
        <div v-for="posty in PostStore.posts" class="pb-10">
          <div v-for="post in posty" class="pb-10">
            <Post :post="post" />
          </div>
        </div>
      </div>
    </section>
  </body>
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
