<template>
  <div class="boats">
    <div v-for="boat in boats" class="single-boat">
      <router-link :to="{name: 'boat', params: {id: boat.id}}">
      <b-card :title="boat.name" :img-src="boat.photo" :img-alt="boat.name" img-top style="max-width: 25rem;" class="mb-2">
        <p class="card-text">
          {{boat.work_description}}
        </p>
      </b-card>
      </router-link>
    </div>
  </div>
</template>



<script>
  export default {
    name: 'boats',
    data() {
      return {
        boats: []
      }
    },
    created() {
      this.getBoats();
    }
  }
</script>



<style scoped>

a {
  color: inherit;
}

.boats {
  max-width: 400px;
  margin: 0 auto;
}

.single-boat {
  margin: 0 auto;
  padding: 20px;
  margin: 20px 0;
  box-sizing: border-box;
  background: #eee;
}

</style>
