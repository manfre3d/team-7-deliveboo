<template>
  <div class="container-fluid">
    <div class="row">
        <!-- Menu del ristorante -->
      <div class="col-lg-6 col-xl-7 a">
          <h1>ciaooosaoda</h1>
          <h1>ciaooosaoda</h1>
          <h1>ciaooosaoda</h1>
          <h1>ciaooosaoda</h1>
          
      </div>
      
      <!-- Carrello del ristorante -->
      <div class="col-lg-6 col-xl-5 a">
        <table class="table">
          <thead>
            <tr>
              <th>Piatto</th>
              <th class="responsive-desktop" colspan="2">Quantità</th>
              <th class="responsive">Quantità</th>
              <th>Prezzo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(plate, index) in cart" :key="index">
              <td>{{ plate.name }}</td>
              <td class="responsive-desktop" colspan="2">
                <button @click="removeToCart(plate.id)">
                  <i class="fas fa-minus"></i>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <i class="fas fa-plus"></i>
                </button>
              </td>
              <td class="responsive">
                <button @click="removeToCart(plate.id)">
                  <i class="fas fa-minus-circle"></i>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <i class="fas fa-plus-circle"></i>
                </button>
              </td>
              <td>{{ plate.price.toFixed(2) }} &euro;</td>
              <td><button>Rimuovi</button></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Prezzo totale</td>
              <td>{{ getTotalPrice() }} &euro;</td>
              <td ><a href="/checkout">Procedi al pagamento</a></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Restaurant",
  data() {
    return {
      restaurant: null,
      plates: [],
      cart: [],
      restaurantId: 0,
    };
  },

  mounted() {
    axios
      .get(`/api/restaurants/${this.$route.params.slug}`)
      .then((response) => {
        //handle success
        this.restaurant = response.data.data;
        this.restaurantId = this.restaurant.id;

        if (localStorage.cart != []) {
          let previewsCart = JSON.parse(localStorage.cart);
          if (previewsCart[0].user_id != this.restaurantId) {
            localStorage.cart = "";
          } else {
            this.cart = previewsCart;
          }
        }
      })
      .catch((error) => {
        //handle error
        console.log(error);
      });
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
          if (response.data.data == "no results found") {
            this.plates = 0;
          } else {
            this.plates = response.data.data;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  methods: {
    addToCart: function (plate) {
      if (this.cart.length == 0) {
        this.cart.push(plate);
        Vue.set(this.cart[this.cart.length - 1], "quantity", 1);
        // if(this.cart[0]['user_id']==plate.user_id )
      } else {
        let find = false;
        this.cart.forEach((elm) => {
          if (elm.id == plate.id) {
            find = true;
            elm.quantity++;
          }
        });
        if (find == false) {
          this.cart.push(plate);
          Vue.set(this.cart[this.cart.length - 1], "quantity", 1);
        }
      }
    },

    removeToCart: function (id) {
      let count = 0;
      this.cart.forEach((elm, index) => {
        // se l'id del piatto da rimuovere è uguale a quello del piatto nel carrello, il contatore è a 0 è
        // la quantità del piatto del carrello è 1
        if (elm.id == id && count == 0 && elm.quantity == 1) {
          this.cart.splice(index, 1);
          count++;

          // se l'id del piatto da rimuovere è uguale a quello del piatto nel carrello, il contatore è a 0 è
          // la quantità del piatto del carrello è > 1
        } else if (elm.id == id && count == 0 && elm.quantity > 1) {
          elm.quantity--;
        }
      });
    },

    getTotalPrice: function () {
      let tot = 0;

      this.cart.forEach((elm) => {
        // sommo i prezzi alla variabile totale, moltiplicando per la quantità dell'elemento
        tot += elm.price * elm.quantity;
      });

      return tot.toFixed(2);
    },
  },
};
</script>

<style lang="scss" scoped>
.row {
  border: 5px solid blue;
  .a {
    border: 5px solid red;
  }
}

th,
td {
  text-align: center;
  border: 3px solid purple;
}

button {
    border: none;
    // border-radius: 5px;
    background-color: transparent;
    // padding: 0 6px;
    
}


.responsive {
    display: none;
}
@media screen and (max-width: 520px) {
    th,td,tr {
        padding: 0;
    }
    .responsive {
        display: grid;
    }
    .responsive-desktop {
        display: none;
    }
}

</style>