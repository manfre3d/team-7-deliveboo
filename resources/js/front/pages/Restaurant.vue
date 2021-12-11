<template>
  <section>
    <div class="container">

      <h4>Menù</h4>
      <ul>
        <li v-for="(plate, index) in plates" :key="index">
          {{ plate.name }} {{ plate.price }}€
        </li>
      </ul>
    </div>

    <div class="plates" id="plates">
      <div class="plate" v-for="plate in plates" :key="plate.id">
        <h3>{{ plate.name }}</h3>
        <div class="price">Prezzo: {{ plate.price }} €</div>
        <button class="btn add-cart" @click="addToCart(plate)">
          Aggiungi al carrello
        </button>
      </div>
    </div>
    
    <div class="cart">
      <h2>Carrello</h2>
      <ul class="cart-container" id="cart-container">
        <li v-for="plate in cart" :key="plate.id">
          <h4>{{ plate.name }}</h4>
          <div>{{ plate.price }} €</div>
          <button class="btn cart-remove" @click="removeToCart(plate.id)">
            Rimuovi
          </button>
        </li>
      </ul>
      <div class="total">
        <strong>Totale:</strong>
        <span id="total-price">€{{ getTotalPrice() }}</span>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Restaurant",
  data() {
    return {
      plates:[],
      cart: [],
      restaurants:[],
    };
  },

  mounted() {
    
   
   axios
      .get("/api/restaurants")
      .then((response) => {
        //handle success
        this.restaurants = response.data.data;
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
    
    
    
    axios
      .get(`/api/plates/16`)
      .then((response) => {
        console.log(response);
        this.plates = response.data.data;
      })
      .catch((error) => {
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
  },
  
  methods: {
    addToCart: function (plate) {
      this.cart.push(plate);
    },
    removeToCart: function (id) {
      this.cart = this.cart.filter((elm) => {
        if (elm.id != id) {
          return true;
        }
        return false;
      });
    },
    getTotalPrice: function () {
      let tot = 0;

      this.cart.forEach((elm) => {
        tot += elm.price;
      });

      return tot;
    },
  },
};
</script>

<style lang="scss" scoped>


.plates {
	display: flex;
	flex-wrap: wrap;
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
.plate {
	width: calc(100% / 5);
}

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