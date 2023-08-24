// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: false },
  modules: ['@nuxtjs/strapi', '@nuxtjs/i18n'],
  css: ['~/assets/scss/main.scss'],
  router: {
    options: {
      linkActiveClass: 'active',
      linkExactActiveClass: 'active'
    }
  },
  i18n: {
    vueI18n: './i18n.config.ts' // if you are using custom path, default 
  }
})
