<template>
<!-- <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd"> -->
<div class="columns is-multiline">
  <div class="column" v-for="membro in membros" :key="membro.id">
    <div class="card m-2 has-background-dark has-text-light">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <img :src="randomAvatar()" :alt="membro.nick" />
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-5">{{ membro.nick }}</p>
            <p class="subtitle is-6">{{ membro.path }}</p>
          </div>
        </div>
        <div class="content">{{ membro.bio }}</div>
      </div>
      <footer class="card-footer">
        <a href="https://facebook.com/lsbrum" class="card-footer-item">Facebook</a>
        <a href="https://twitter.com/sistematico" class="card-footer-item">Twitter</a>
        <a href="https://instagram.com/sistematico" class="card-footer-item">Instagram</a>
      </footer>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: "Card",
  props: {
    membros: {
      type: Array
    }
  },
  computed: {
    randomAvatar2: function () {
      return this.membros[Math.floor(Math.random() * this.membros.length)].avatar
    }
  },
  methods: {
    randomAvatar: function () {
      return this.membros[Math.floor(Math.random() * this.membros.length)].avatar
    }
  }
}
</script>