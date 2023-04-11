<script setup>
import Post from '../components/PostComponent.vue'
import LeftPanelComponent from '../components/LeftPanelComponent.vue'
import { storeToRefs } from 'pinia'
import { usePostStore } from '../stores/PostStore'

const PostStore = usePostStore()
const { totalCount, userCount } = storeToRefs(PostStore)

const posts = PostStore.getAllPosts()

console.log(!!localStorage.getItem('userToken'))
</script>
<template>   

<!-- *** TOP SUBRADDITS *** -->
<body class="flex">
   <LeftPanelComponent />
    <section class="page">
    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/RadditsField.png" /></div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/RadditsField.png" /></div>
    </div>

      <!-- *** FILTERBAR *** -->
      <div class="ctnr_filter">
        <div class="ctnr_new">🆕</div>
        <div class="ctnr_hot">🔥</div>
      </div>

      <!-- *** POSTS *** -->
        <div class="ctnr_filter" v-for="post in posts">
          
        <Post
          SubRadditTitle="Tout sur le Radis"
          Author="Dino"
          PostTitle="Les radis sont nos amis"
          PostBody="Le bon vieux lorem ipsum"
        />
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
