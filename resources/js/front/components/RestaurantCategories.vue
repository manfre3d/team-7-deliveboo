<template>
  <section class="container">
    <div class="row">
      <div class="col-12">
        <h2>Le categorie di ristoranti più amate</h2>
      </div>
    </div>

    <ul class="row justify-content-center" style="margin-bottom: 20px">
      <li class="d-flex col col-md-6 col-lg-4 flex-grow-0 justify-content-center" v-for="category in categories" :key="category.id">
        <div class="card mx-1 card-menu" style=" cursor: pointer" @click="$emit('category', category.id)">
          <div class="card-body d-flex flex-column">
            <img v-if="category.img_path" :src="require('../img/restaurant_category/' + category.img_path)" alt="category img">
            <span>{{ category.name }}</span>
          </div>
        </div>
      </li>

      <!-- Stampa tag categorie -->
      <li class="row justify-content-center tag">
        <h4 class="d-flex flex-wrap justify-content-center mx-1" v-for="category in categories" :key="category.id" @click="$emit('category', category.id)">
          <router-link class="badge" to="">
            {{category.name}}
          </router-link>
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
  padding: 3.75rem 0;
}

@mixin centered {
    max-width: 85%;
    margin: auto;
}
@mixin title{
  font-size: 1.25rem;
  font-weight: 700;
  color: $titleColor;
}
.container{
  @include centered;
  h2{
    color: $titleColor;
    font-size: 2.5rem;
    font-weight: 600;
    padding-bottom: 1.87rem;
  }
  ul{
    width: 100%;
      li{
        list-style: none;
    }
  }
  .card-body {
    span{
      @include title;
      padding-top: .62rem;
    }
    
  }
  .card {
    border: none;
  }
}
.tag{
  h4{
    .badge{
      @include title;
      background-color: #ececec;
      margin-top: 3.75rem;
    }
  }
}
</style>