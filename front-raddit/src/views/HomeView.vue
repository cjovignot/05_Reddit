<script setup>

import NavBar from "../components/NavBarComponent.vue"
import Post from "../components/PostComponent.vue"

</script>
<template>

  <body>
    <NavBar></NavBar>

    <!-- *** TOP SUBRADDITS *** -->
    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/RadditsField.png"></div>
    </div>

    <!-- *** FILTERBAR *** -->
    <div class ="ctnr_filter">
      <div class="ctnr_new">🆕</div>
      <div class="ctnr_hot">🔥</div>
    </div>

    <!-- *** POSTS *** -->
    <div class="ctnr_posts">
      <Post 
      SubRadditTile="Radis en folie"
      Author="Dino"
      ProductionDate="7 Avril 2023"
      PostTitle="Les radis sont nos amis"
      PostBody="Le bon vieux lorem ipsum" />
    </div>
  
  </body>
</template>
<style scoped>

.ctnr_top
{
  display: flex;
  flex-direction: row;
  max-width: 80%;
}
.ctnr_filter
{
  display: flex;
  flex-direction: row;
}
.ctnr_field
{
  align-items: center;
}

</style>