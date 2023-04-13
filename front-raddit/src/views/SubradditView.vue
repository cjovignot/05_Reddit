<script setup>
import { ref } from 'vue';
import { useImageStore } from '@/stores/ImageStore';
import axios from 'axios';
import { createToaster } from '@meforma/vue-toaster';
import { RouterLink } from 'vue-router';

const toaster = createToaster({
  /* options */
})
</script>

<template>
    <h1>COUCOU de la page Subraddit</h1>
</template>

<style scoped>

</style>