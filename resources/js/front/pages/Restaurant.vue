<template>

  <section class="container">
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
                <button  
                class="btn add-cart" 
                @click="addToCart(plate)" 
                :data-toggle="modalConnection" 
                data-target="#exampleModalCenter" 
                style="width: 50%;">
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

            <!-- Parte Manfredi da implementare -->
              <!-- <td >
                <div class="quantity_wrapper d-flex">
                  <button type="button" @click="removeToCart(plate.id)" class="modify_quantity decrease mx-1">
                    <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"></path></svg>
                  </button>
                  <span class="quantity"> {{plate.quantity}}</span>
                  <button type="button" @click="addToCart(plate)" class="modify_quantity increase mx-1">
                    <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"></path></svg>
                  </button>
                </div>

              </td>

              <td>{{ plate.price.toFixed(2) }}</td>
              <td>
                <button class="btn cart-remove" @click="removeElementCart(plate.id)">
                  Rimuovi
                </button> -->
                
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
  </section>
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
  th,
  td,
  tr {
    padding: 0;
  }
  .responsive {
    display: grid;
  }
  .responsive-desktop {
    display: none;
  }
}

.modify_quantity {
  background-color: transparent;
  border: none;
  cursor: pointer;
  vertical-align: middle;
}
</style>