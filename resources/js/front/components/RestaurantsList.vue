<template>
  <section class="container-fluid">
     <!-- tutti i ristoranti  -->
    <div class="row justify-content-center" v-if="category == 0">
      <div class="col-sm-2 col-md-6 col-lg-4 d-flex justify-content-center img_container" v-for="restaurant in restaurants" :key="restaurant.id">
        <router-link :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }">
      
          <img
          :src="checkImg(restaurant.img_path)"
          alt="restaurant img"/>


          <h4>{{ restaurant.name }}</h4>
        </router-link>
      </div>
    </div>
<!-- ristoranti filtrati -->
    <div class="row" v-if="category != 0">
      <div v-for="restaurant in filteredRestaurants" :key="restaurant.id" class="col-sm-12 col-md-6 col-lg-4 img_container d-flex flex-column align-items-center">
        <router-link :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }">

          <img
          :src="checkImg(restaurant.img_path)"
          alt="restaurant img"/>

          <h4>{{ restaurant.name }}</h4>
        </router-link>
        <h6 class="badge badge-warning">
          {{ categoriesNames[restaurant.pivot.restaurant_type_id - 1] }}

        </h6>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "RestaurantsList",
  props: ["selectedCategory"],
  data() {
    return {
      category: 0,
      categories: [],
      categoriesNames: [],
      restaurants: [],
      filteredRestaurants: [],
      imgPath:"",
    };
  },
  mounted() {
    axios
      .get("/api/categories")
      .then((response) => {
        //handle success
        this.categories = response.data.data;
        this.categories.forEach((element) => {
          this.categoriesNames.push(element.name);
        });
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
    axios
      .get("/api/restaurants")
      .then((response) => {
        //handle success
        // console.log(response.data.data);
        this.restaurants = response.data.data;
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
  },
  watch: {
    selectedCategory: function () {
      this.category = this.selectedCategory;
      this.searchForCategory(this.category);
    },
  },
  methods: {
    searchForCategory(id_category) {
      // console.log(id_category);
      axios
        .get("http://127.0.0.1:8000/api/restaurants/type/" + id_category)
        .then((response) => {
          // console.log(response.data.data);
          this.filteredRestaurants = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    checkImg(img_path){
      
      try {
        let fileName = require('../img/seeder_images/'+ img_path);
        return require('../img/seeder_images/'+ img_path);
        
      } catch (e) {
        this.imgPath=`http://127.0.0.1:8000/api/image/${img_path}`;
        return this.imgPath;
      }
    }
  },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";

@mixin centered {
    max-width: 85%;
    margin: auto;
}
@mixin title{
  font-size: 1.25rem;
  font-weight: 700;
  color: $titleColor;
  padding-top: .62rem;
}
@mixin tag{
  background-color: $basicColor;
  padding: 0.5rem 0.62rem;
  border-radius: 0.31rem;
}
.container-fluid{
  background-color: $bgColor3;
  padding-bottom: 5rem;
}
.row{
  @include centered;
}
.img_container{
  padding-top: 5rem;
  img {
    height: 12.5rem;
    width: 17rem;
    object-fit: cover;
  }
  .badge{
    @include tag;
  }
  h4{
    @include title;
  }
  a{
    text-decoration: none;
  }
}
</style>