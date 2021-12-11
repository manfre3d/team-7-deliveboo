<template>
  <section class="container">
    <ul>
      <li v-for="restaurant in restaurants" :key="restaurant.id">
        <router-link to="/restaurant">{{ restaurant.name }}</router-link>
        </li>
    </ul>
  </section>
</template>

<script>
export default {
  name: "Restaurants",
  data() {
    return {
      restaurants: [],
    };
  },
  mounted() {
    axios
      .get("/api/restaurants")
      .then((response) => {
        //handle success
        this.restaurants = response.data.data;
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
    border: 3px solid green;
}
ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
}
li {
    border: 3px solid rgb(243, 122, 122);
    width: calc(100% / 4);
}
</style>