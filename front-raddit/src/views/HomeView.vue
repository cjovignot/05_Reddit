<script setup>
import Post from '../components/PostComponent.vue'
import LeftPanelComponent from '../components/LeftPanelComponent.vue'
import { storeToRefs } from 'pinia'
import { usePostStore } from '../stores/PostStore'

const PostStore = usePostStore()

const posts = PostStore.getAllPosts()
console.log('here')
console.log(posts)

console.log(!!localStorage.getItem('userToken'))
</script>
<template>   

<!-- *** TOP SUBRADDITS *** -->
<body class="flex">
   <LeftPanelComponent class="hidden" />
    <section class="page">
    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/RadditsField.png" /></div>
    </div>

      <!-- *** FILTERBAR *** -->
      <div class="flex flex-row bg-red-500 w-[78%] m-auto mb-10">
        <div class="ctnr_new">🆕</div>
        <div class="ctnr_hot">🔥</div>
      </div>

      <!-- *** POSTS *** -->
        <div class="flex flex-col  w-[78%] m-auto mb-5" v-if="PostStore.isLoading == false">          
          <div v-for="post in PostStore.posts" class="pb-10">

            <Post
            :post=post
            />
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
