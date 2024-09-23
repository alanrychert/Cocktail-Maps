import Vue from 'vue'
import VueRouter from 'vue-router'
import Bares from '../views/Bares.vue'
import Bar from '../views/Bar.vue'
import Tragos from '../views/Tragos.vue'
import Trago from '../views/Trago.vue'
import TragoAPI from '../views/TragoAPI.vue'
import Tutoriales from '../views/Tutoriales.vue'
import Tutorial from '../views/Tutorial.vue'
Vue.use(VueRouter)

const routes = [
    {
        path: '/tragos',
        name: 'Tragos',
        component: Tragos
    },
    {
        path: '/',
        name: 'Bares',
        component: Bares
    },
    {
        path: '/tutoriales',
        name: 'Tutoriales',
        component: Tutoriales
    },
    {
        path: '/bares/:id',
        name: 'specificBar',
        component: Bar
    },
    {
        path: '/tragos/:id',
        name: 'specificTrago',
        component: Trago
    },
    {
        path: '/hazlotu',
        name: 'Hazlotu',
        component: TragoAPI
    },
    {
        path: '/tutoriales/:id',
        name: 'specificTutorial',
        component: Tutorial
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })
  
export default router