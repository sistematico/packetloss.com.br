<script setup lang="ts">
const route = useRoute()

definePageMeta({
  layout: 'welcome'
})
</script>
<template>
  <h1>Index page PKL {{ route.path }}</h1>
</template>