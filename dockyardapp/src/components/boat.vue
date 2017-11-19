<template>
  <div class="single-boat">
    <div class="boat-photo">
      <h1>{{boat.name}}</h1>
      <img fluid :src="boat.photo" :alt="boat.name">
    </div>
    <h4> Type: </h4> {{boat.type}}
    <h4> Length: </h4> {{boat.length}}
    <h4> Work Description: </h4> {{boat.work_description}}
    <h4> Arrival Date: </h4> {{boat.arrival_date}}
    <h4> Delivery Date: </h4> {{boat.delivery_date}}
    <h4> Status: </h4> {{boat.status}}
    <h4> Workers: </h4>
    <ul>
      <li v-for="w in workers">
        {{w.name}}
      </li>
    </ul>
    <router-link :to="{name: 'updateBoat', params: {id: this.$route.params.id}}" tag="button" class="btn btn-primary">Update</router-link>
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

      this.getBoat(id);

      this.getBoatWorkers(id);
    }
  }
</script>



<style scoped>
h1, h4{
  font-weight: normal;
}

.boat-photo {
  text-align: center;
}

.single-boat {
  text-align: left;
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  background: #eee;
}
</style>
