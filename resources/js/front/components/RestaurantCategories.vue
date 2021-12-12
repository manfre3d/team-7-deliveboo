<template>
  <section class="container">
    <ul>
      <li v-for="category in categories" :key="category.id">
        <router-link to="">{{ category.name }}</router-link>
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
}

ul {
display: flex;
  justify-content: space-between;
}

li {
  border: 1px solid black;
}
</style>