<template>
<div class="container">
  <h1>sono la Homepage</h1>
  <ul>
    <li v-for="category in categories" :key="category.id" >
      <router-link to="/advanced_search">{{category.name}}</router-link>
    </li>
  </ul>
  </div>
</template>

<script>
export default {
    name: "home",
    data() {
      return {
        categories: []
      }
    },
    mounted() {
      axios.get('/api/categories')
        .then((response) => {
          //handle success
          this.categories= response.data.data
        })
        .catch( (error)=> {
          //handle error
          console.log(error);
        })
    },
}
</script>

<style lang="scss" scoped>

</style>