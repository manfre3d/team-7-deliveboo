<template>
  <div >
    <!-- tutti i ristoranti  -->
    <div v-if="category==0" class="row justify-content-center">
        <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;" v-for="restaurant in restaurants" :key="restaurant.id">
            <div class="card-body d-flex flex-column">

            <img  :src="require('../img/seeder_images/' + restaurant.img_path)" alt="restaurant img">
            <div class="text_section_restaurant d-flex flex-wrap ">
                <h4>{{ restaurant.name }}</h4>
                <p>{{ restaurant.description }}</p>
            </div>

            </div>
        </div>

    </div>
    <!-- ristoranti filtrati -->
    <div v-if="category!=0" class="row justify-content-center">
        <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;" v-for="restaurant in filteredRestaurants" :key="restaurant.id">
            <div class="card-body d-flex flex-column">

            <img  :src="require('../img/seeder_images/' + restaurant.img_path)" alt="restaurant img">
            <div class="text_section_restaurant d-flex flex-wrap ">
                <h4>{{ restaurant.name }}</h4>
                <p style="width: 100%;">{{ restaurant.description }}</p>
                <h6 class="badge badge-warning">{{categoriesNames[restaurant.pivot.restaurant_type_id-1]}}</h6>
                
            </div>

            </div>
        </div>

    </div>
  </div>
  
</template>

<script>
export default {
  name: "RestaurantsList",
  props:['selectedCategory'],
  data() {
    return {
      category:0,
      categories:[],
      categoriesNames:[],
      restaurants:[],
      filteredRestaurants:[],
    }
  },
  mounted() {    
    axios.get("/api/categories")
        .then((response) => {
        //handle success
        this.categories = response.data.data;
        this.categories.forEach((element)=>{
            this.categoriesNames.push(element.name);
        });
        })
        .catch((error) => {
        //handle error
        console.log(error);
        });
    axios.get("/api/restaurants")
      .then((response) => {
        //handle success
        // console.log(response.data.data);
        this.restaurants=response.data.data;
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
  },
  watch:{
    selectedCategory:function(){
        this.category=this.selectedCategory;
        this.searchForCategory(this.category);
    }
  },
  methods:{
      searchForCategory(id_category){

        // console.log(id_category);
        axios.get('http://127.0.0.1:8000/api/restaurants/type/'+id_category)
          .then((response)=> {
          // console.log(response.data.data);
          this.filteredRestaurants=response.data.data;


          })
          .catch(error =>{
            console.log(error)
          });

      },
  },
}
</script>

<style lang="scss">

</style>