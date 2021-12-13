<template>
<div class="container">
  <h1 class="text-center">Sono la Homepage</h1>
  <h2>Categorie di Ristoranti</h2>
  <ul>
    <RestaurantCategories @category="getCategory"/>    
  </ul>
  <hr>
  <h2>Ristoranti</h2>
  <RestaurantsList :selectedCategory="category"/>
  </div>
</template>

<script>
import RestaurantsList from '../components/RestaurantsList';
import RestaurantCategories from '../components/RestaurantCategories';

export default {
    components: {
      RestaurantsList,
      RestaurantCategories,
    },
    data() {
      return {
        category: 0,
        restaurants:[],
        filteredRestaurants:[],

      }
    },
    methods:{
      getCategory(categorySelected){

        // console.log(categorySelected);
        this.category=categorySelected;

      }

    }
}
</script>

<style lang="scss" scoped>

</style>