<script setup>
import { ref } from "vue";
let input = ref("");
const fruits = ["apple", "banana", "orange"];
function filteredList() {
  return fruits.filter((fruit) =>
    fruit.toLowerCase().includes(input.value.toLowerCase())
  );
}
</script>

<template>
    <input type="text" v-model="input" placeholder="Search fruits..." />
   <div class="item fruit" v-for="fruit in filteredList()" :key="fruit">
     <p>{{ fruit }}</p>
   </div>
   <div class="item error" v-if="input&&!filteredList().length">
      <p>No results found!</p>
   </div>
 </template>