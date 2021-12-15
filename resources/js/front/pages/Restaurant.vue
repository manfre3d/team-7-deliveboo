<template>
    <div>
        <!-- Section restaurant-info -->
        <section class="restaurant-info" v-if="restaurant!=null">
            <div class="container">
                
            </div>
    <!-- Section order -->
        </section>   
        <section class="order container">
    <div class="row">
   <!-- Menu -->
    <div class="col-12 col-lg-6 col-xl-6  a">
        <ul>
          <li class="menu-plate" v-for="(plate, index) in plates" :key="index">
            <div v-if="plate.name" >
                <h2>{{ plate.name }}</h2>
                <p>{{plate.description}}</p>
                <div v-if="plate.price" class="price"><strong>Prezzo:</strong> {{ plate.price.toFixed(2) }} €</div>
                <button  
                class="btn add-cart" 
                @click="addToCart(plate)" 
                :data-toggle="modalConnection" 
                data-target="#exampleModalCenter">
                  Aggiungi al carrello
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Attenzione!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Puoi ordinare solo da un ristorante alla volta.<br>
                        Desideri svuotare il tuo carrello?
                      </div>
                      <div class="modal-footer">
                        <button type="button" @click="removeAllCart()"  data-dismiss="modal" class="btn add-cart">Si</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- possibile img -->
            <!-- <img v-if="restaurant.img_path" :src="require('../img/seeder_images/' + restaurant.img_path)" alt="restaurant img"> -->
          </li>
        </ul>  
    </div>
      <!-- Carrello del ristorante -->
      <div class="col-12 col-lg-6 col-xl-6 cart a">
        <table class="table ">
          <thead>
            <tr>
              <th>Piatto</th>
              <th class="responsive-desktop" colspan="2">Quantità</th>
              <th class="responsive">Quantità</th>
              <th colspan="2">Prezzo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(plate, index) in cart" :key="index">
              <td>{{ plate.name }}</td>

              <td class="responsive-desktop" colspan="2">
                <button @click="removeToCart(plate.id)">
                  <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"></path></svg>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"></path></svg>
                </button>
              </td>
              <td class="responsive">
                <button @click="removeToCart(plate.id)">
                  <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"></path></svg>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"></path></svg>
                </button>
              </td>
              <td colspan="2">{{ plate.price.toFixed(2) }} &euro;</td>
              <td><button  @click="removeElementCart(plate.id)"><i class="fas fa-trash-alt text-danger"></i></button></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Prezzo totale</td>
              <td colspan="2">{{ getTotalPrice() }} &euro;</td>
              <td><a href="/checkout">Procedi al pagamento</a></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
        <button class="clear-cart" @click="removeAllCart()">Svuota il carrello</button>
      </div>
      </div>
        </section>
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
      modalConnection: "",
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

          this.cart = previewsCart;
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
        if (this.cart[0].user_id == plate.user_id) {
          this.modalConnection = "";
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
        } else {
          this.modalConnection = "modal";
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

    removeElementCart: function (id) {
      let count = 0;
      this.cart.forEach((elm, index) => {
        if (elm.id == id && count == 0) {
          this.cart.splice(index, 1);
          count++;
        }
      });
    },
    removeAllCart: function () {
      this.cart = [];
      this.modalConnection = "";
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
@import "../../../sass/front/variables.scss";

.container {
    border: 3px solid blue;
}


ul {
    list-style: none;
}

.row {
//   border: 5px solid blue;
// display: flex;
  .a {
    // border: 5px solid red;
    // justify-content: space-between;
    // margin: 0 50px;
    padding: 50px 100px;
  }
}
.order {
    padding: 50px 20px;
}
.price {
    text-align: end;
}

.add-cart {
    border: 1px solid $mainColor;
    font-weight: bold;
}

.menu-plate {
    padding: 40px 0;
    border-top: 1px dashed rgb(128, 128, 128);
}

// Carrello
th,
td {
  text-align: center;
//   border: 3px solid purple;
}

button {
  border: none;
  background-color: transparent;
}

.cart {
    // padding-top: 50px!important;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.responsive {
  display: none;
}

.clear-cart{
    border: 1px solid;
    border-radius: 3px;
    width: max-content;
}


@media screen and (max-width: 520px) {
  th,
  td,
  tr {
    // padding: 0;
    vertical-align: middle;
  }
  .responsive {
    display: grid;
  }
  .responsive-desktop {
    display: none;
  }

  .row {
      .a {
      padding: 0;
  }
  }
}
</style>