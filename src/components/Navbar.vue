<template>
  <nav class="navbar is-transparent">
    <div class="container">
      <div class="navbar-brand">
        <router-link to="/" class="navbar-item">
          <img alt="Packet Loss" src="img/navbar.png" />
        </router-link>
        <span class="navbar-burger burger" data-target="navbarMenuHeroA">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
      <div id="navbarMenuHeroA" class="navbar-menu">
        <div class="navbar-start has-text-white">
          <router-link to="/" class="navbar-item">Início</router-link>
          <router-link to="/clan" class="navbar-item">Clan</router-link>
          <router-link to="/chat" class="navbar-item">Bate-Papo</router-link>
          <router-link to="/contato" class="navbar-item">Contato</router-link>
        </div>
        <div class="navbar-end">
          <div class="navbar-item song-title">{{ songTitle }}</div>
          <span class="navbar-item" style="padding: 0; margin: 0 auto;">
            <Player :song="song" :song-title="songTitle" ref="audioPlayer" />
          </span>
          <span class="navbar-item">
            <a href="https://packetloss.com.br/discord" class="button discord" target="_blank">
              <span class="icon">
                <font-awesome-icon :icon="['fab', 'discord']" />
              </span>
              <span>Discord</span>
            </a>
          </span>
          <span class="navbar-item">
            <a href="https://packetloss.com.br/whatsapp" class="button is-success" target="_blank">
              <span class="icon">
                <font-awesome-icon :icon="['fab', 'whatsapp']" />
              </span>
              <span>WhatsApp</span>
            </a>
          </span>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
import Player from '@/components/Player.vue'

export default {
  name: "Navbar",
  components: { Player },
  props: {
    song: { type: String, default: '' },
    songTitle: { type: String, default: ''}
  },
  methods: {
    callRandom: function() {
      this.$parent.playRandomSong()
    }
  }
}
</script>