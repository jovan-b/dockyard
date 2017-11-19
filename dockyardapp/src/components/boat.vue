<template>
  <div class="single-boat">
    <h2>{{boat.name}}</h2>
    <img :src="boat.photo" :alt="boat.name">
    <p> Type: {{boat.type}} </p>
    <p> Length: {{boat.length}} </p>
    <p> Work Description: {{boat.work_description}}</p>
    <p> Arrival Date: {{boat.arrival_date}}</p>
    <p> Delivery Date: {{boat.delivery_date}}</p>
    <p> Status: {{boat.status}}</p>
    <p> Workers: </p>
    <ul>
      <li v-for="w in workers">{{w.name}}</li>
    </ul>
  </div>
</template>



<script>
  export default {
    name: 'boat',
    data() {
      return {
        boat: {},
        workers: []
      }
    },
    created() {
      let id = parseInt(this.$route.params.id);

      this.$http.get('http://localhost:3000/boats', {params: {id: id}}).then(response => {
        this.boat = response.body[0];
      }, error => {
        console.log(error);
      });

      this.$http.get('http://localhost:3000/workers', {params: {boatIds_like: id}}).then(response => {
        this.workers = response.body;
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

a {
  color: #42b983;
}

.single-boat{
  padding: 20px;
  margin: 20px 0;
  box-sizing: border-box;
  background: #eee;
}
</style>
