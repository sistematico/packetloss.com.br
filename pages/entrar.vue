<script setup lang="ts">
const username = ref('')
const password = ref('')

const { login } = useStrapiAuth()
const router = useRouter()
const onSubmit = async () => {
  try {
    await login({ identifier: username.value, password: password.value })
    router.push('/authenticated-page')
  } catch (e) {}
}
</script>
<template>
  <h1>Entrar</h1>
  <form @submit.prevent="onSubmit">
    <div class="mb-3">
      <label for="username" class="form-label">Usuário</label>
      <input type="text" v-model="username" class="form-control" id="username" />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Senha</label>
      <input type="password" v-model="password" class="form-control" id="password" />
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">Me manter conectado</label>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</template>
