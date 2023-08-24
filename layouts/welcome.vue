<template>
  <main class="form-signin w-100 m-auto">
    <form>
      <img class="mb-4" src="/img/logo.svg" alt="Packet Loss" height="72" />
      <!-- <h1 class="h3 mb-3 fw-normal">Please sign in</h1> -->
      <NuxtLink to="/home" class="btn btn-primary w-100 py-2">Entrar</NuxtLink>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2004–2023 - Packet Loss</p>
    </form>
  </main>
</template>
<style scoped>
html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type='email'] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type='password'] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
