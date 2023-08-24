<script setup lang="ts">
const props = defineProps({
  error: Object
})

// if (props.error) {
//   console.log(props.error.statusCode)
// }

const handleError = () => clearError({ redirect: '/' })
</script>
<template>
  <Head>
    <Title>Packet Loss</Title>
    <Link rel="icon" href="/img/logotipo.svg" type="image/svg+xml" />
    <Meta name="description" content="Packet Loss" />
    <Meta property="og:title" content="Packet Loss" />
    <Meta property="og:description" content="Multi-Gaming Community" />
    <Meta property="og:type" content="website" />
    <Meta property="og:url" content="https://packetloss.com.br" />
    <Meta property="og:image" content="https://packetloss.com.br/img/logotipo.png" />
    <Link rel="stylesheet" href="/css/base.css" />
  </Head>
  <NuxtLayout>
    <template v-if="props.error">   
      <h1>Erro {{ props.error.statusCode }}</h1>
      <p>
        {{ props.error.statusMessage }}
      </p>
    </template>
    <template v-else>
      <h1>Erro desconhecido</h1>
    </template>
    <button @click="handleError" class="btn btn-warning">Voltar</button>
  </NuxtLayout>
</template>
