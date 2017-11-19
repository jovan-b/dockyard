// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false

Vue.mixin({
  methods: {
    getBoats: function(){
      this.$http.get('http://localhost:3000/boats').then(response => {
        this.boats = response.body;
      }, error => {
        console.log(error);
      });
    },
    getWorkers: function(){
      this.$http.get('http://localhost:3000/workers').then(response => {
        this.workers = response.body;
      }, error => {
        console.log(error);
      });
    },
    getBoat: function(id){
      this.$http.get('http://localhost:3000/boats', {params: {id: id}}).then(response => {
        this.boat = response.body[0];
      }, error => {
        console.log(error);
      });
    },
    getBoatWorkers: function(id){
      this.$http.get('http://localhost:3000/workers', {params: {boatIds_like: id}}).then(response => {
        this.workers = response.body;
      }, error => {
        console.log(error);
      });
    }
  }
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
