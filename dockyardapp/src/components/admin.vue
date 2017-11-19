<template>
  <div class="admin">
    <div v-if="submitted">
      <b-alert variant="success" show>Boat added</b-alert>
    </div>
    <div id="add-boat">
      <h2>Add a new boat</h2>
      <form>
          <label><span>Name:</span></label>
          <input type="text" v-model.lazy="boat.name" required/>
          <label>Type:</label>
          <input type="text" v-model.lazy="boat.type" required/>
          <label>Photo (URL):</label>
          <input type="text" v-model.lazy="boat.photo" required/>
          <label>Length:</label>
          <input type="number" step="0.1" v-model.lazy="boat.length" required/>
          <label>Work Description:</label>
          <input type="text" v-model.lazy="boat.work_description" required/>
          <label>Arrival Date:</label>
          <input type="date" v-model.lazy="boat.arrival_date" required/>
          <label>Delivery Date:</label>
          <input type="date" v-model.lazy="boat.delivery_date" required/>
          <label>Status:</label>
          <input type="text" v-model.lazy="boat.status" required/>
          <button v-on:click.prevent="addBoat">Add Boat</button>
      </form>
    </div>
  </div>
</template>



<script>
  export default {
    name: 'admin',
    data() {
      return {
        boat: {
          name: "",
          type: "",
          photo: "",
          length: "",
          work_description: "",
          arrival_date: "",
          delivery_date: "",
          status: ""
        },
        submitted: false
      }
    },
    methods: {
      addBoat: function(){
        this.$http.post('http://localhost:3000/boats', {
          name: this.boat.name,
          type: this.boat.type,
          photo: this.boat.photo,
          length: this.boat.length,
          work_description: this.boat.work_description,
          arrival_date: this.boat.arrival_date,
          delivery_date: this.boat.delivery_date,
          status: this.boat.status
        }).then(response => {
          this.submitted = true;
        });
      }
    },
    created() {
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

label, button{
    display: block;
    margin: 10px 0 10px;
}

.admin {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  background: #eee;
  text-align: left;
}
</style>
