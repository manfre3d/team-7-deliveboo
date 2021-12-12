<template>
<div class="container">
  <h1>sono la Homepage</h1>
  <ul>
    <RestaurantCategories/>
    <Restaurants/>
  </ul>
  </div>
</template>

<script>
import RestaurantCategories from '../components/RestaurantCategories';
import Restaurants from '../components/Restaurants';

export default {
    components: {
      RestaurantCategories,
      Restaurants
    }
    
}
</script>

<style lang="scss" scoped>

</style>