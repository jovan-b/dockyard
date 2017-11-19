<template>
  <div class="single-boat">
    <div v-if="updated">
      <b-alert variant="success" show>Boat Updated</b-alert>
    </div>
    <form>
      <div class="form-group">
        <label>Name:</label>
        <input class="form-control" type="text" v-model.lazy="boat.name" required/>
        <label>Type:</label>
        <input class="form-control" type="text" v-model.lazy="boat.type" required/>
        <label>Photo (URL):</label>
        <input class="form-control" type="text" v-model.lazy="boat.photo" required/>
        <label>Length:</label>
        <input class="form-control" type="number" step="0.1" v-model.lazy="boat.length" required/>
        <label>Work Description:</label>
        <input class="form-control" type="text" v-model.lazy="boat.work_description" required/>
        <label>Arrival Date:</label>
        <input class="form-control" type="text" v-model.lazy="boat.arrival_date" required/>
        <label>Delivery Date:</label>
        <input class="form-control" type="text" v-model.lazy="boat.delivery_date" required/>
        <label>Status:</label>
        <input class="form-control" type="text" v-model.lazy="boat.status" required/>
      </div>
      <button v-on:click.prevent="updateBoat" class="btn btn-primary">Update Boat</button>
    </form>
  </div>
</template>



<script>
  export default {
    name: 'boat',
    data() {
      return {
        boat: {},
        updated: false
      }
    },
    methods: {
      updateBoat: function(){
        let path = 'http://localhost:3000/boats/' + this.boat.id;
        this.$http.patch(path, {
          id: this.boat.id,
          name: this.boat.name,
          type: this.boat.type,
          photo: this.boat.photo,
          length: this.boat.length,
          work_description: this.boat.work_description,
          arrival_date: this.boat.arrival_date,
          delivery_date: this.boat.delivery_date,
          status: this.boat.status
        }).then(response => {
          this.updated = true;
        });
      }
    },
    created() {
      let id = parseInt(this.$route.params.id);
      this.getBoat(id);
    }
  }
</script>



<style scoped>
h1, h4{
  font-weight: normal;
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
