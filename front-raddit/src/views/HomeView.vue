<script setup>
import NavBar from "../components/NavBarComponent.vue"

</script>

<template>
  <body>
    <NavBar></NavBar>

    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/RadditsField.png"></div>
    </div>
  
  </body>
</template>

<style scoped>
.ctnr_top
{display: flex;
  flex-direction: row;
  max-width: 80%;
}

.ctnr_field
{
  align-items: center;
}
</style>