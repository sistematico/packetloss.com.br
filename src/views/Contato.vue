<template>
  <div class="inicio has-text-left">    
    <div class="columns">
      <div class="column is-half is-offset-one-quarter">
        <Formulario />
      </div>
    </div>
  </div>
</template>

<script>
import Formulario from '@/components/Formulario.vue'

export default {
  name: 'Contato',
  components: {
    Formulario
  }
}
</script>
