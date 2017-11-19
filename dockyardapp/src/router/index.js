import Vue from 'vue'
import Router from 'vue-router'
import VueResource from 'vue-resource'
import showBoats from '@/components/showBoats'
import boat from '@/components/boat'
import updateBoat from '@/components/updateBoat'
import admin from '@/components/admin'

Vue.use(VueResource);
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'showBoats',
      component: showBoats
    },
    {
      path: '/boat/:id',
      name: 'boat',
      component: boat
    },
    {
      path: '/updateBoat/:id',
      name: 'updateBoat',
      component: updateBoat
    },
    {
      path: '/admin',
      name: 'admin',
      component: admin
    }
  ]
})
