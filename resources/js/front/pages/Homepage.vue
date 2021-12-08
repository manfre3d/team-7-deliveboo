<template>
<div class="container">
  <h1>sono la Homepage</h1>
  <ul>
    <RestaurantCategory/>
  </ul>
  </div>
</template>

<script>
import RestaurantCategory from '../components/RestaurantCategory';
export default {
    name: "Home",
    components: {
      RestaurantCategory
    }
    
}
</script>

<style lang="scss" scoped>

</style>