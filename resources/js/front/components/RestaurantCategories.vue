<template>
  <section class="container">
    <div class="row">
      <div class="col-12">
        <h2>Le categorie di ristoranti più amate</h2>
      </div>
    </div>

    <ul class="row justify-content-center" style="margin-bottom: 20px">
      <li
        class="d-flex col col-md-6 col-lg-4 flex-grow-0 justify-content-center"
        v-for="category in categories"
        :key="category.id">
        <div
          class="card mx-1 card-menu"
          style=" cursor: pointer"
          @click="$emit('category', category.id)">
          <div class="card-body d-flex flex-column">
            <img
              v-if="category.img_path"
              :src="require('../img/restaurant_category/' + category.img_path)"
              alt="category img"/>
            {{ category.name }}
          </div>
        </div>
      </li>
      <li
        class="row justify-content-center"
        style="width: 100%; margin-top: 20px"
      >
        <h4
          class="d-flex flex-wrap justify-content-center mx-1"
          v-for="category in categories"
          :key="category.id"
          @click="$emit('category', category.id)"
        >
          <router-link class="badge badge-warning" to="">{{
            category.name
          }}</router-link>
        </h4>
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
@import "../../../sass/front/variables.scss";

.container {
  // border: 5px solid red;
  padding: 100px 0;
}
// .container {
//   border: 3px solid orange;
//   border-radius: 15px;
//   ul {
//     display: flex;
//     justify-content: space-between;
//     list-style: none;
//   }
// }

@mixin centered {
    max-width: 85%;
    margin: auto;
}
.container{
  @include centered;
  // margin-top: -150px;
  h2{
    color: $titleColor;
    font-size: 50px;
    font-weight: 600;
    margin-bottom: 40px;
  }
  ul{
    width: 100%;
      li{
        list-style: none;
      // border: 1px solid black;
      // margin: 30px 0;
      // background-color: hotpink;
      // margin-bottom: 40px;
      // padding: 20px 0;
    }
  }
  .card-body {
    text-align: center;
    font-size: 26px;
  }
  .card {
    border: none;
  }
  
}





</style>