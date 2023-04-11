<script setup>
import { RouterView } from 'vue-router'
import NavBar from './components/NavBarComponent.vue'
</script>

<template>
  <NavBar></NavBar>

  <RouterView />
</template>

<style>
/* a.router-link-exact-active {
  border: 1px solid red;
} */
</style>
