import Vue from 'vue'
import App from './App.vue'
import router from './router'

// Bulma
import './assets/js/bulma'
import './assets/css/bulma.min.css'

// Main CSS
import './assets/css/main.css'

// FontAwesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// Plyr
import VuePlyr from 'vue-plyr'
import Configs from './assets/js/plyr-configs.js'
import './assets/css/vue-plyr.css'
import './assets/css/player.css'

Vue.use(VuePlyr, {
  plyr: { controls: Configs.PLYRCONTROLS, tooltips: { controls: false }, seekTime: 17 }
})

library.add(fas,fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

const mainApp = new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
