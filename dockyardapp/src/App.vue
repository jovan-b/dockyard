<template>
  <div id="app">
    <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

      <router-link to="/">
        <b-navbar-brand>{{title}}</b-navbar-brand>
      </router-link>

      <b-collapse is-nav id="nav_collapse">

        <b-navbar-nav>
          <b-nav-item><router-link to="/admin">Admin Panel</router-link></b-nav-item>
        </b-navbar-nav>

      </b-collapse>
    </b-navbar>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
      title: 'Docky McDockFace Dockyards'
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;

}

li a {
  color:inherit;
}

</style>
