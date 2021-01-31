<template>
  <div class="inicio has-text-left">    
    <div class="columns">
      <div class="column is-half is-offset-one-quarter">
        <FacaParte />
      </div>
    </div>
  </div>
</template>

<script>
import FacaParte from '@/components/FacaParte.vue'

export default {
  name: 'Cadastro',
  components: {
    FacaParte
  }
}
</script>
