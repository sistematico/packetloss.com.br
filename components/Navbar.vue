<template>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <NuxtLink to="/home" class="navbar-brand d-flex align-items-center">
        <img src="/img/logotipo.svg" alt="Packet Loss" height="38" class="me-2" />
        Packet Loss
      </NuxtLink>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <NuxtLink class="nav-link" to="/home">Início</NuxtLink>
          </li>
        </ul>
        <div class="text-end">
          <NuxtLink to="/cadastro" class="btn btn-outline-light me-2">Cadastro</NuxtLink>
          <NuxtLink to="/entrar" class="btn btn-warning">Entrar</NuxtLink>
        </div>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
</template>
