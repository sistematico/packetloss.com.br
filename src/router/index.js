import Vue from 'vue'
import VueRouter from 'vue-router'
import Inicio from '../views/Inicio.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Inicio',
    component: Inicio
  },
  {
    path: '/clan',
    name: 'Clan',
    component: () => import(/* webpackChunkName: "clan" */ '../views/Clan.vue')
  },
  {
    path: '/cadastro',
    name: 'Cadastro',
    component: () => import(/* webpackChunkName: "cadastro" */ '../views/Cadastro.vue')
  },
  {
    path: '/chat',
    name: 'Chat',
    component: () => import(/* webpackChunkName: "chat" */ '../views/Chat.vue')
  },
  {
    path: '/contato',
    name: 'Contato',
    component: () => import(/* webpackChunkName: "contato" */ '../views/Contato.vue')
  },
  {
    path: '*',
    name: 'NotFound',
    component: () => import(/* webpackChunkName: "notfound" */ '../views/NotFound.vue')
  }
]

const router = new VueRouter({ mode: 'history', base: process.env.BASE_URL, routes })
export default router
