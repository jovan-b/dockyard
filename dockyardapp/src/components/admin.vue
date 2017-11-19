<template>
  <div class="admin">
    <b-tabs>
      <b-tab title="Add Boat" active>
        <div v-if="submitted">
          <b-alert variant="success" show>Boat Added</b-alert>
        </div>
        <div id="add-boat">
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
              <input class="form-control" type="date" v-model.lazy="boat.arrival_date" required/>
              <label>Delivery Date:</label>
              <input class="form-control" type="date" v-model.lazy="boat.delivery_date" required/>
              <label>Status:</label>
              <input class="form-control" type="text" v-model.lazy="boat.status" required/>
            </div>
            <button v-on:click.prevent="addBoat" class="btn btn-primary">Add Boat</button>
          </form>
        </div>
      </b-tab>
      <b-tab title="Delete Boats">
        <div v-if="deleted">
          <b-alert variant="success" show>Boat Deleted</b-alert>
        </div>
        <div v-if="assigned">
          <b-alert variant="success" show>Worker Assigned</b-alert>
        </div>
        <div v-if="unassigned">
          <b-alert variant="success" show>Worker Unassigned</b-alert>
        </div>
        <div id="edit-boats">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Delivery Date</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="b in boats">
                <td><router-link :to="{name: 'boat', params: {id: b.id}}">{{b.name}}</router-link></td>
                <td>{{b.arrival_date}}</td>
                <td>{{b.delivery_date}}</td>
                <td>
                  <b-dropdown id="ddown1" text="Assign" class="m-md-2">
                    <div v-for="w in workers">
                      <b-dropdown-item v-if="!w.boatIds.includes(b.id)" v-on:click.prevent="assign(b.id, w.id, w.boatIds)">{{w.name}}</b-dropdown-item>
                    </div>
                  </b-dropdown>
                  <b-dropdown id="ddown1" text="Unassign" class="m-md-2">
                    <div v-for="w in workers">
                      <b-dropdown-item v-if="w.boatIds.includes(b.id)" v-on:click.prevent="unassign(b.id, w.id, w.boatIds)">{{w.name}}</b-dropdown-item>
                    </div>
                  </b-dropdown>
                  <button v-on:click.prevent="deleteBoat(b.id)"  class="btn btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </b-tab>
    </b-tabs>
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
        boats: [],
        workers: [],
        submitted: false,
        deleted: false,
        assigned: false,
        unassigned: false
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
          this.getBoats();
        });
      },
      deleteBoat: function(id){
        let path = "http://localhost:3000/boats/" + id;

        this.$http.delete(path).then(response => {
          this.deleted = true;

          for(var i = 0; i < this.workers.length; i++){
            if(this.workers[i].boatIds.includes(id)){
              this.unassign(id, this.workers[i].id, this.workers[i].boatIds);
            }
          }

          this.getWorkers();
          this.getBoats();
        }, error => {
          console.log(error);
        });
      },
      assign: function(bid, wid, boatIds){
        boatIds.push(bid)
        let path = 'http://localhost:3000/workers/' + wid;
        this.$http.patch(path, {
          boatIds: boatIds
        }).then(response => {
          this.assigned = true;
          this.getWorkers();
        });
      },
      unassign: function(bid, wid, boatIds){
        let index = boatIds.indexOf(bid)
        boatIds.splice(index, 1);
        let path = 'http://localhost:3000/workers/' + wid;
        this.$http.patch(path, {
          boatIds: boatIds
        }).then(response => {
          this.unassigned = true;
          this.getWorkers();
        });
      }
    },
    created() {
      this.getBoats();
      this.getWorkers();
    }
  }
</script>



<style scoped>

.admin {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  background: #eee;
  text-align: left;
}

</style>
