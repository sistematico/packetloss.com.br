<template>
  <div class="inicio has-text-left">
    <div class="columns">
      <div class="column is-full">
        <h1 class="title">Bate-Papo</h1>
        <h2 class="subtitle">Nosso Discord</h2>
        <Discord />      
      </div>
    </div>
  </div>
</template>
<script>
import Discord from '@/components/Discord.vue'

export default {
  name: "Chat",
  components: { Discord }
}
</script>