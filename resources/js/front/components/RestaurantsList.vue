<template>
  <section class="container-fluid">
    <div>
      <div v-if="category.length!=0" class="d-flex flex-wrap row">
        <h2 class="col-12 my-5" data-aos="fade-zoom-in">Filtri selezionati</h2> 
        <div class="left-col col-12 col-md-6" data-aos="fade-zoom-in">
          <ul class="col-12 flex-wrap d-flex">
            <li v-for="(_categories,index) in category" :key="index" class="d-flex flex-wrap">
              <h3><span class="badge badge-secondary d-flex align-content-center mx-1">
                {{categoriesNames[_categories-1]}}
                
              <button class="btn_delete_filter mx-2" @click="removeFilter(_categories)">X</button>
              </span></h3>
              
            </li>
          </ul>

        </div>
        <div class="right-col col-12 col-md-6 d-flex justify-content-end">
          <button class="btn_delete_filter mx-2" @click="removeAllFilters()">
            <h3>
              <span class="badge d-flex align-content-center mx-1  btn-danger">      
              Rimuovi tutti i filtri          
              </span>
            </h3>

          </button>
        </div>
      </div>
    </div>
    
    <!-- tutti i ristoranti  -->
    <div class="row justify-content-center container-responsive" v-if="category == 0">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 d-flex justify-content-center img_container" v-for="restaurant in restaurants" :key="restaurant.id" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-offset="0" data-aos-delay="200" data-aos-duration="500">

        <router-link :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }">
          <img class="img-fluid" :src="checkImg(restaurant.img_path)" alt="restaurant img">
          <h4>{{ restaurant.name }}</h4>
        </router-link>
      </div>
    </div>
    <!-- ristoranti filtrati -->

    <div class="row justify-content-center container-responsive " v-if="category != 0">
      <div v-for="restaurant in filteredRestaurants" :key="restaurant.id" class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3 flex-wrap d-flex justify-content-center img_container" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-offset="0" data-aos-delay="200" data-aos-duration="500">

        <router-link :to="{ name: 'Restaurant', params: { slug: restaurant.slug } }">

          <img
          class="img-fluid"
          :src="checkImg(restaurant.img_path)"
          alt="restaurant img">

          <h4>{{ restaurant.name }}</h4>
        </router-link>
        <div class="tags col-12 justify-content-center">
          <h6 class="badge badge-warning" v-for="(type,index) in restaurant.types" :key="index">
            {{ categoriesNames[type - 1] }}
          </h6>
        </div> 
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
      category: [],
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
        console.error(error);
      });
    axios
      .get("/api/restaurants")
      .then((response) => {
        //handle success
        
        this.restaurants = response.data.data;
      })
      .catch((error) => {
        //handle error
        console.error(error);
      });
  },
  watch: {
    selectedCategory: function () {
      if(!this.category.includes(this.selectedCategory) && this.selectedCategory != ''){
        this.category.push(this.selectedCategory);
      }

      this.searchForCategory(this.category);
    },
  },
  methods: {
    searchForCategory(id_category) {
      
      let stringCategories='';
      id_category.forEach((elm,index)=>{
        if(index==0){
          stringCategories+=elm;
        }else{
          stringCategories+='-'+elm;
        }
      });
      axios
        .get("http://127.0.0.1:8000/api/restaurants/type/" + stringCategories)
        .then((response) => {
          this.filteredRestaurants = response.data.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    checkImg(img_path){
      
      try {
        let fileName = require('../img/seeder_images/'+ img_path);
        return require('../img/seeder_images/'+ img_path);
        
      } catch (e) {
        if(img_path!=null){

          this.imgPath=`http://127.0.0.1:8000/api/image/${img_path}`;
          return this.imgPath;
        }
      }
    },
    removeFilter(category_id){
      let indexOfElement=this.category.indexOf(category_id);
      this.category.splice(indexOfElement, 1);
      
      this.searchForCategory(this.category);
    },
    removeAllFilters(){
      this.category=[];
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
  // background-color: $basicColor;
  padding: 0.5rem 0.62rem;
  border-radius: 0.31rem;
}
.container-fluid{
  background-color: #F9FAFA;
  padding-bottom: 5rem;
}
.row{
  @include centered;
}
.img_container{
  padding-top: 5rem;
  padding-bottom: 30px;
  img {
    height: 12.5rem;
    width: 17rem;
    object-fit: cover;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }
  .badge{
    @include tag;
  }
  h4{
    @include title;
    background-color: white;
    padding: 10px 0 20px 10px;
    box-shadow: 0px 0px 5px 0px #b1b0b0;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
  }
  a{
    text-decoration: none;
  }
  h6{
    background-color: white;
    margin-right: 5px;
    // color: #00CCBD;
  }
}
.tags{
  display: flex;
}
.btn_delete_filter {
  background-color: transparent;
  border: none;
  cursor: pointer;
  font-weight: 600;
  color: white;
  vertical-align: middle;
}

@media screen and (min-width:1700px) {
  .container-responsive {
    max-width: 1800px;
  }
}
</style>