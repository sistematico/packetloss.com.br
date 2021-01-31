<template>
  <div id="app">
    <div id="wrapper">
      <section class="hero is-fullheight is-dark" :class="heroClass">
        <div class="hero-head">
          <Navbar :song-title="audioTitle" :song="audioSrc" ref="navBar" />
        </div>
        <div class="hero-body">
          <div class="container has-text-centered">
            <transition name="fade" mode="out-in">
              <router-view />
            </transition>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer">
      <div class="content has-text-centered">
        <p>&copy; 2020 Packet Loss Gaming Clan.<br />{{ visitas }} visitas.</p>
      </div>
    </footer>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue'

export default {
  name: "AppPrincipal",
  components: { Navbar },
  data() {
    return {
      audioSrc: null,
      audioTitle: null,
      heroClass: 'among1',
      songs: [
        { id: 1, title: 'Dubdogz - Baila Conmigo', path: '/mp3/Baila%20Conmigo.mp3' },
        { id: 2, title: 'Rag\'N\'Bone Man - Giant', path: '/mp3/Giant.mp3' },
        { id: 3, title: 'SAINt JHN - ROSES (Imanbek Remix)', path: '/mp3/Roses.mp3' },
        { id: 4, title: 'Vintage Culture, Adam K - Pour Over', path: '/mp3/Pour%20Over.mp3' },
        { id: 5, title: 'Alok, Rooftime, Dubdogz - Free My Mind', path: '/mp3/Free%20My%20Mind.mp3' }
      ],
      heroClasses: ['among1','among2','among3'],
      visitas: 0,
      steamKey: process.env.STEAM_KEY
    }
  },
  mounted() {
    this.counter()
    this.toggleClass()
    
    let rdm = this.shuffle(this.songs)
    this.audioTitle = rdm.title
    this.audioSrc = rdm.path
    this.$refs.navBar.$refs.audioPlayer.$refs.plyr.player.source = { type: 'audio', title: rdm.title, sources: [ { src: rdm.path, type: 'audio/mp3' } ] }

    this.$refs.navBar.$refs.audioPlayer.$refs.plyr.player.on('ended', () => {
      this.playRandomSong()
    })
  },
  methods: {
    shuffle: function(array) {
      for (let j = array.length - 1; j >= 0; j--) {
        let swapIndex = Math.floor(Math.random() * j);
        let tmp = array[swapIndex];
        array[swapIndex] = array[j];
        array[j] = tmp;
      }      
      return array[0]
    },
    playRandomSong: function() {
      let rdm = this.shuffle(this.songs)
      this.audioTitle = rdm.title
      this.audioSrc = rdm.path
      this.$refs.navBar.$refs.audioPlayer.$refs.plyr.player.source = { type: 'audio', title: rdm.title, sources: [ { src: rdm.path, type: 'audio/mp3' } ] }
      this.$refs.navBar.$refs.audioPlayer.$refs.plyr.player.play()
    },
    toggleClass: function() {
      if (localStorage.wallpaper) {
        switch (localStorage.wallpaper) {
          case "among1":
            this.heroClass = 'among2'
          break
          case "among2":
            this.heroClass = 'among3'
          break
          case "among3":
            this.heroClass = 'among1'
          break
          default:
            this.heroClass = 'among1'
        }
      }

      localStorage.wallpaper = this.heroClass
    },
    counter: function() {
      fetch('./php/counter.php', {
          method: 'post', 
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: "increment=true"
      }).then(response => response.text()).then(views => {
        this.visitas = views
      }).catch(error => {
        console.log(error)
        this.visitas = 0
      })
    }
  },
  watch: {
    '$route' () {
      this.toggleClass()
      // switch (this.$route.path) {
      //   case "/":
      //     this.heroClass = ''
      //   break
      //   default:
      //     this.heroClass = ''
      // }
    }
  }
}
</script>
