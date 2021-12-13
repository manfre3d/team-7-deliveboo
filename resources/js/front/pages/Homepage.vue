<template>
  <div class="container-xxl">
    <Hero />
    <RestaurantCategories @category="getCategory" />
    <RestaurantsList :selectedCategory="category" />
  </div>
</template>

<script>
import Hero from "../components/Hero.vue";

import RestaurantsList from "../components/RestaurantsList";
import RestaurantCategories from "../components/RestaurantCategories";

export default {
  components: {
    Hero,
    RestaurantsList,
    RestaurantCategories,
  },
  data() {
    return {
      category: 0,
      restaurants: [],
      filteredRestaurants: [],
    };
  },
  methods: {
    getCategory(categorySelected) {
      // console.log(categorySelected);
      this.category = categorySelected;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>