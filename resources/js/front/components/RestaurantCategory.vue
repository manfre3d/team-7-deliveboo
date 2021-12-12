<template>
  <div class="row justify-content-center">
    <li class="d-flex col col-md-6 col-lg-4 flex-grow-0" v-for="category in categories" :key="category.id">
      <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;" @click="$emit('category',category.id)">
        <div class="card-body d-flex flex-column">

        <img  :src="require('../img/restaurant_category/' + category.img_path)" alt="category img">
        {{ category.name }}

        </div>
      </div>
    </li>
  </div>
  
</template>

<script>
export default {
  name: "RestaurantCategory",
  data() {
    return {
      categories: [],
    }
  },
  mounted() {
    axios.get("/api/categories")
      .then((response) => {
        //handle success
        this.categories = response.data.data;
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
  },
  methods:{
      
  },
}
</script>

<style lang="scss">
</style>