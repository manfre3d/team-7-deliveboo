<template>
  <div class="container">
    <li v-for="category in categories" :key="category.id">
      {{ category.name }}
      <!-- <img :src="'../img/restaurant_category/' + category.img_path" alt="category img"> -->
      <img :src="'/images/restaurant_category/' + category.img_path" alt="category img">
      <!-- <img src="../img/restaurant_category/cucina-cinese.jpg" alt="category img"> -->
    </li>
  </div>
</template>

<script>
export default {
  name: "RestaurantCategory",
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    axios
      .get("/api/categories")
      .then((response) => {
        //handle success
        this.categories = response.data.data;
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
  },
};
</script>

<style>
</style>