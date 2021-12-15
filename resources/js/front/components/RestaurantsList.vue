<template>
  <section class="container-xl justify-content-center">
    <!-- Emanuela -->
     <!-- tutti i ristoranti  -->
    <div class="row" v-if="category == 0">
      <div  v-for="restaurant in restaurants" :key="restaurant.id" class="col-sm-12 col-md-6 col-lg-4 img_container d-flex flex-column align-items-center">
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

    <!-- End Emanuela -->
    
    
    <!-- tutti i ristoranti  -->
     <!-- <div v-if="category == 0" class="row justify-content-center">
      <div
        class="card mx-1 mt-3 card-menu"
        style="width: 20.5rem"
        v-for="restaurant in restaurants"
        :key="restaurant.id">
        <router-link :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }">
          <div class="card-body d-flex flex-column">
            <img
              :src="require('../img/seeder_images/' + restaurant.img_path)"
              alt="restaurant img">
            <div class="text_section_restaurant d-flex flex-wrap">
              <h4>{{ restaurant.name }}</h4>
              <p>{{ restaurant.description }}</p>
            </div>
          </div>
        </router-link>
      </div>
    </div> -->
    <!-- ristoranti filtrati -->
     <!-- <div v-if="category != 0" class="row justify-content-center">
      <div
        class="card mx-1 mt-3 card-menu"
        style="width: 20.5rem"
        v-for="restaurant in filteredRestaurants"
        :key="restaurant.id"
      >
        <router-link
          :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }"
        >
          <div class="card-body d-flex flex-column">
            <img
              :src="require('../img/seeder_images/' + restaurant.img_path)"
              alt="restaurant img"
            />
            <div class="text_section_restaurant d-flex flex-wrap">
              <h4>{{ restaurant.name }}</h4>
              <p style="width: 100%">{{ restaurant.description }}</p>
              <h6 class="badge badge-warning">
                {{ categoriesNames[restaurant.pivot.restaurant_type_id - 1] }}
              </h6>
            </div>
          </div>
        </router-link>
      </div>
    </div>  -->
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
.row {
  margin: 0;
}

.container-xl {
  // border: 3px solid green;
}

.img_container {
  // border: 5px solid red;
  // margin: 0 10px 60px 10px;
  padding: 40px;
  img {
    height: 300px;
    width: 100%;
    object-fit: cover;
  }
}
</style>