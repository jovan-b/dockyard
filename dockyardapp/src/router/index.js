import Vue from 'vue'
import Router from 'vue-router'
import VueResource from 'vue-resource'
import showBoats from '@/components/showBoats'
import boat from '@/components/boat'
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
      path: '/admin',
      name: 'admin',
      component: admin
    }
  ]
})
