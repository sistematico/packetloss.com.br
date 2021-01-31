<template>
<div class="columns is-multiline">
  <div class="column" v-for="membro in membros" :key="membro.id">
    <div class="box">
      <article class="media">
        <div class="media-left">
          <figure class="image is-64x64">
            <img :src="membro.avatar" alt="Image">
          </figure>
        </div>
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{ membro.nick }}</strong> <small>{{ membro.nome }}</small>
              <br>
              {{ membro.bio }}
            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a :href="membro.steam" class="level-item" aria-label="reply">
                <span class="icon">
                  <font-awesome-icon :icon="['fab', 'steam']" />
                </span>
              </a>
              <a :href="membro.email" class="level-item" aria-label="like">
                <span class="icon is-small">
                    <font-awesome-icon :icon="['fas', 'envelope']" />
                </span>
              </a>
            </div>
          </nav>
        </div>
      </article>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: "Card",
  props: {
    membros: { type: Array, default: []},
  },
  data() {
    return {
      membroslista: null,
    }
  },
  computed: {
    steam: function () {
      //return this.membros[steamid] !== null ? id : ''
    }
  },
  methods: {
    randomAvatar: function () {
      return this.membros[Math.floor(Math.random() * this.membros.length)].avatar
    }
  },
  mounted() {
    this.membroslista = this.membros
  }
}
</script>