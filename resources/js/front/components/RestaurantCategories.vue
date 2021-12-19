<template>
  <section class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2>Le categorie di ristoranti più amate</h2>
      </div>
    </div>

    <ul class="d-flex flex-wrap">
      <li class="d-flex col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3 justify-content-center" v-for="category in categories" :key="category.id">
        <div class="card mx-1 card-menu" style=" cursor: pointer" @click="$emit('category', category.id)" v-if="category.id < 5">
          <div class="card_body" data-aos="fade-left" data-aos-duration="1000">
            <img v-if="category.img_path" :src="require('../img/restaurant_category/' + category.img_path)" alt="category img">
            <h4>{{ category.name }}</h4>
          </div>
        </div>
      </li>
    </ul>

      <!-- Stampa tag categorie -->
    <h2>Cerchi qualcos'altro?</h2>
    <ul>
      <li class="row tag">
        <div class="d-flex flex-wrap justify-content-center mx-1" v-for="category in categories" :key="category.id" @click="$emit('category', category.id)">
          <router-link class="badge" to="">
            <h4>{{category.name}}</h4>
          </router-link>
        </div>
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

.container-fluid{
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
@mixin tag{
  background-color: #ececec;
  padding: 8px 10px;
  border-radius: 5px;
}
.container-fluid{
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
  .card_body {
    padding: 0;
    h4{
      @include title;
      padding-top: .62rem;
    }
    img{
      height: 12.5rem;
      width: 15rem;
      object-fit: cover;
    }
  }
  .card {
    border: none;
  }
}
.tag{
  .badge{
    padding-left: 15px;
    h4{
      @include title;
      @include tag;
    }  
  }
}
</style>