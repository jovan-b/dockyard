import Vue from 'vue'
import Router from 'vue-router'
import VueResource from 'vue-resource'
import Hello from '@/components/Hello'
import showBoats from '@/components/showBoats'
import boat from '@/components/boat'

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
    }
  ]
})
