<template>
  <section >
    <div v-if="restaurant!=null">

      <div class="restaurant-info">
        <h1>Ristorante{{restaurant.name}}</h1>
      </div>

      <h4>Menù</h4>
      <!-- <ul>
        <li v-for="(plate, index) in plates" :key="index">
          {{ plate.name }} {{ plate.price }}€
        </li>
      </ul> -->
    </div>

    <div class="d-flex">
      <div class="plates d-flex col-6" >


        <!-- lista di piatti del ristorante -->
        <ul class="list-group"  style="width: 100%;">
          <li class="list-group-item" v-for="(plate, index) in plates" :key="index">
            <div v-if="plate.name" class="text_section_restaurant d-flex flex-wrap ">
                <h4 style="width: 100%;">{{ plate.name }}</h4>
                <div v-if="plate.price" class="price" style="width: 50%;">Prezzo: {{ plate.price.toFixed(2) }} €</div>
                <button  class="btn add-cart" @click="addToCart(plate)" style="width: 50%;">
                  Aggiungi al carrello
                </button>
            </div>
            <!-- <img v-if="restaurant.img_path" :src="require('../img/seeder_images/' + restaurant.img_path)" alt="restaurant img"> -->
          </li>
        </ul>


        <!-- versione a schede per i piatti -->
        <!-- <div  class="plate col-4 card card-menu" v-for="(plate, index) in plates" :key="index">
          <div v-if="plates!=0" class="card-body d-flex flex-column" >

            <img v-if="plate.img_path" :src="require('../img/seeder_images/' + plate.img_path)" alt="restaurant img">
            <div v-if="plate.name" class="text_section_restaurant d-flex flex-wrap ">
                <h4>{{ plate.name }}</h4>
                <div v-if="plate.price" class="price">Prezzo: {{ plate.price.toFixed(2) }} €</div>
                <button class="btn add-cart" @click="addToCart(plate)">
                  Aggiungi al carrello
                </button>
            </div>

          </div> 
          
        </div>-->
      </div>
      <div class="cart d-flex flex-column col-6">
        <h2>Carrello</h2>
        <ul class="cart-container">
          <li v-for="(plate, index) in cart" :key="index">
            <h4>{{ plate.name }}</h4>
            <div>{{ plate.price.toFixed(2) }} €</div>
            <button class="btn cart-remove" @click="removeToCart(plate.id)">
              Rimuovi
            </button>
          </li>
        </ul>
        <div class="total-container">
          <h2>Totale:</h2>
          <span id="total-price">€{{ getTotalPrice() }}</span>
        </div>
      </div>

    </div>
    
  </section>
</template>

<script>
export default {
  name: "Restaurant",
  data() {
    return {
      restaurant: null,
      plates:[],
      cart: [],
      restaurantId: 0 ,
    };
  },

  mounted() {
    
   
   axios
      .get(`/api/restaurants/${this.$route.params.slug}`)
      .then((response) => {
        //handle success
        this.restaurant = response.data.data;
        console.log(this.restaurant);
        this.restaurantId = this.restaurant.id;
        console.log(this.restaurantId);
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
      
    if (localStorage.cart) {
      this.cart = JSON.parse(localStorage.cart);
    }
  },
 
 
 watch: {
    cart: {
      handler(newCart) {
        localStorage.cart = JSON.stringify(newCart);
      },
      deep: true,
    },

    restaurant: function () {
      axios
      .get(`/api/plates/${this.restaurantId}`)
      .then((response) => {
        console.log(response);
        if(response.data.data=="no results found"){
          this.plates=0;
        }else{
          this.plates = response.data.data;

        }
      })
      .catch((error) => {
        console.log(error);
      });
    }
  },
  

  methods: {
    addToCart: function (plate) {
      if(!this.cart.includes(plate)){
        this.cart.push(plate);
      }
    },
    removeToCart: function (id) {
      // this.cart = this.cart.filter((elm) => {
      //   if (elm.id != id) {
      //     return true;
      //   }
      //   return false;
      // });
      let count = 0;
      this.cart.forEach ((elm, index) => {
        if (elm.id == id && count == 0) {
          this.cart.splice(index, 1);
          count++;
        }
      })
      console.log(this.cart)
    },
    getTotalPrice: function () {
      let tot = 0;

      this.cart.forEach((elm) => {
        tot += elm.price;
      });
      
      return tot.toFixed(2);
    },
  },
};
</script>

<style lang="scss" scoped>


.plates {
	display: flex;
	flex-wrap: wrap;
  padding:0;
  border: 3px solid black;
}
.cart {
	width: 30%;
	height: 100%;
	right: 0;
	padding: 40px 20px;
	text-align: center;
	background-color: #00eb91;
}
// .plate {
// 	width: calc(100% / 5);
// }

.cart {
  border: 3px solid black;
}
.btn.add-cart {
	background-color: #00CCBC;
}
.cart-container {
	margin-top: 40px;
}
.cart-container li {
	list-style: none;
	display: flex;
	justify-content: space-between;
	border-bottom: 1px solid #999;
	padding: 10px;
}

.cart-remove {
	background-color: #ad0000;
  color: white;
}
   
</style>