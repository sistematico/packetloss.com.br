<script setup lang="ts">
const username = ref('')
const email = ref('')
const password = ref('')

const { register } = useStrapiAuth()
const router = useRouter()
const onSubmit = async () => {
  try {
    await register({ username: username.value, email: email.value, password: password.value })
    router.push('/authenticated-page')
  } catch (e) {}
}
</script>
<template>
  <h1>Cadastro</h1>
  <form @submit.prevent="onSubmit">
    <div class="mb-3">
      <label for="username" class="form-label">Email address</label>
      <input type="text" v-model="username" class="form-control" id="username" aria-describedby="usernameHelp" />
      <div id="usernameHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" v-model="email" class="form-control" id="email" aria-describedby="emailHelp" />
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" v-model="password" class="form-control" id="password" />
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <p class="mt-2">
      <NuxtLink to="/senha">Esqueceu a senha?</NuxtLink>
    </p>
  </form>
</template>
