<template>
  <section class="container">
    <ul class="row justify-content-center" style="margin-bottom: 20px;">
      <li class="d-flex col col-md-6 col-lg-4 flex-grow-0" v-for="category in categories" :key="category.id">
        <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;cursor:pointer;" @click="$emit('category',category.id)">
          <div class="card-body d-flex flex-column">

          <img  :src="require('../img/restaurant_category/' + category.img_path)" alt="category img">
          {{ category.name }}

          </div>
        </div>
      </li>
      <li class="row justify-content-center" style="width: 100%; margin-top:20px;" >

        <h4 class="d-flex flex-wrap justify-content-center mx-1" v-for="category in categories" :key="category.id" @click="$emit('category',category.id)">
          <router-link  class="badge badge-warning" to="">{{ category.name }}</router-link>
        </h4>

      </li>
    </ul>
  </section>
</template>

<script>
export default {
  name: "RestaurantCategories",
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

<style lang="scss" scoped>
.container {
  border: 3px solid orange;
  border-radius:15px;
  ul {
    display: flex;
    justify-content: space-between;
    list-style: none;
  }
}



</style>