<template>
  <div class="boats">
    <h1> {{title}} </h1>
    <div v-for="boat in boats" class="single-boat">
      <h2>{{boat.name}}</h2>
      <img :src="boat.photo" :alt="boat.name">
    </div>
  </div>
</template>



<script>
  export default {
    name: 'boats',
    data() {
      return {
        title: 'Docky McDockFace Dockyards',
        boats: []
      }
    },
    created() {
      this.$http.get('http://localhost:3000/boats').then(response => {
        this.boats = response.body;
      }, error => {
        console.log(error);
      });
    }
  }
</script>



<style scoped>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

#boats{
  max-width: 800px;
  margin: 0 auto;
}

.single-boat{
  padding: 20px;
  margin: 20px 0;
  box-sizing: border-box;
  background: #eee;
}
</style>
