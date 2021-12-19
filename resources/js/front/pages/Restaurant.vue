<template>
  <div class="general-container">
    <div class="container">
      <i id="cart" class="fas fa-cart-plus openbtn" @click="toggleNav()">
        <span></span>
        {{ cartCounter() }}
        <span></span>
      </i>
    </div>
    <!-- Section restaurant-info -->
    <section class="restaurant-info" v-if="restaurant != null">
      <div class="container b">
        <div class="row">
          <div class="col-12 col-lg-5">
            <img
              class="restaurant-image"
              :src="checkImg(restaurant.img_path)"
              alt=""
            />
          </div>
          <div class="col-12 col-lg-7 restaurant-description">
            <h2 class="restaurant-name">Ristorante {{ restaurant.name }}</h2>
            <p>
              <a
                class="btn btn-info"
                data-toggle="collapse"
                href="#collapseExample"
                role="button"
                aria-expanded="false"
                aria-controls="collapseExample"
              >
                Info
              </a>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                {{ restaurant.description }}
              </div>
            </div>

            <p><span>Indirizzo: </span>{{ restaurant.address }}</p>
            <p><span>Email: </span> {{ restaurant.email }}</p>
          </div>
        </div>
      </div>
      <!-- Section order -->
    </section>

    <Menu />

    <!-- Sidebar shopping cart -->
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" @click="toggleNav()">×</a>
      <div class="cart a">
        <table class="table">
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
                  <svg
                    height="24"
                    width="24"
                    viewBox="0 0 24 24"
                    class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"
                  >
                    <path
                      fill="#00ccbc"
                      d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"
                    ></path>
                  </svg>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <svg
                    height="24"
                    width="24"
                    viewBox="0 0 24 24"
                    class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"
                  >
                    <path
                      fill="#00ccbc"
                      d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"
                    ></path>
                  </svg>
                </button>
              </td>
              <td class="responsive">
                <button @click="removeToCart(plate.id)">
                  <svg
                    height="24"
                    width="24"
                    viewBox="0 0 24 24"
                    class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"
                  >
                    <path
                      fill="#00ccbc"
                      d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"
                    ></path>
                  </svg>
                </button>
                {{ plate.quantity }}
                <button @click="addToCart(plate)">
                  <svg
                    height="24"
                    width="24"
                    viewBox="0 0 24 24"
                    class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"
                  >
                    <path
                      fill="#00ccbc"
                      d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"
                    ></path>
                  </svg>
                </button>
              </td>
              <td colspan="2">{{ plate.price.toFixed(2) }} &euro;</td>
              <td>
                <button @click="removeElementCart(plate.id)">
                  <i class="fas fa-trash-alt text-danger"></i>
                </button>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Prezzo totale</td>
              <td colspan="2">{{ getTotalPrice() }} &euro;</td>
              <td><a v-if="cart.length > 0" href="/checkout">Procedi al pagamento</a></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
        <button class="clear-cart btn" @click="removeAllCart()">
          Svuota il carrello
        </button>
      </div>
    </div>

    <!-- Section Menu -->
    <section class="order container-xl">
      <!-- Menu -->

      <ul class="row d-flex">
        <li
          class="menu-plate col-10 col-md-5 col-xl-3 a"
          v-for="(plate, index) in plates"
          :key="index"
        >
          <div v-if="plate.name">
            <img
              class="plate-image"
              :src="
                plate.img_path != null
                  ? `http://127.0.0.1:8000/api/image/${plate.img_path}`
                  : ''
              "
              alt=""
            />
            <h3 class="plate-name">{{ plate.name }}</h3>
            <p class="plate-description">{{ plate.description }}</p>
            <div v-if="plate.price" class="price">
              <strong>Prezzo:</strong> {{ plate.price.toFixed(2).replace(".",",") }} €
            </div>
            <button
              class="btn add-cart"
              @click="addToCart(plate)"
              :data-toggle="modalConnection"
              data-target="#exampleModalCenter"
            >
              Aggiungi al carrello
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="exampleModalCenter"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                      Attenzione!
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Puoi ordinare solo da un ristorante alla volta.<br />
                    Desideri svuotare il tuo carrello?
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      @click="removeAllCart()"
                      data-dismiss="modal"
                      class="btn add-cart"
                    >
                      Si
                    </button>
                    <button
                      type="button"
                      class="btn add-cart"
                      data-dismiss="modal"
                    >
                      No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>


    </section>
  </div>
</template>

<script>
import Menu from "../components/Menu.vue";
export default {
  name: "Restaurant",
  components: {
    Menu,
  },
  data() {
    return {
      restaurant: null,
      plates: [],
      cart: [],
      restaurantId: 0,
      modalConnection: "",
      navCounter:0
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

    cartCounter: function () {
      let counter = 0;

      this.cart.forEach((elm) => {
        counter += elm.quantity;
      });
      return counter;
    },
    // /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    // openNav: function () {
    //   document.getElementById("mySidebar").style.width = "min-content";
    // },

    // /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    // closeNav: function () {
    //   document.getElementById("mySidebar").style.width = "0";
    // },
    toggleNav: function(){
      if(this.navCounter==0){
        document.getElementById("mySidebar").style.width = "min-content";
        this.navCounter=1;
        document.getElementById("cart").style.display = "none";


      }else{
        document.getElementById("mySidebar").style.width = "0";
        this.navCounter=0;
        document.getElementById("cart").style.display = "flex";

      }
    },

    checkImg(img_path) {
      try {
        let fileName = require("../img/seeder_images/" + img_path);
        return require("../img/seeder_images/" + img_path);
      } catch (e) {
        this.imgPath = `http://127.0.0.1:8000/api/image/${img_path}`;
        return this.imgPath;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";

.general-container {
  background-image: url("../img/menu-pattern1.jpg");
  background-attachment: fixed;
}

ul {
  list-style: none;
  margin: 0;
}

.row {
  //   border: 5px solid blue;
  // display: flex;
  .a {
    // border: 5px solid red;
    // justify-content: space-between;
    // margin: 0 50px;
    padding: 40px 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 8px;
    margin: 30px;
  }
}
// ---------------Restaurant info section------------------

.restaurant-info {
  // border: 5px solid blue;
  background-color: rgb(255, 255, 255);
  padding: 100px 20px 130px 20px;
  color: white;

  .btn-info {
    font-size: 20px;
    cursor: pointer;

    padding: 2px 10px;
    border-radius: 5px;

    color: $mainColor;
    border: 1px solid $mainColor;
    background-color: transparent;
    &:hover {
      background-color: #04cbbf;
      color: white;
    }
  }

  #img1 {
    width: 400px;
    position: absolute;
    right: 30px;
  }

  .row {
    // align-items: center;
    margin: 0 !important;
  }

  span {
    font-weight: 600;
    font-size: 18px;
  }

  h2 {
    margin: 0 0 30px 0;
    font-weight: 700;
    font-size: 36px;
    color: rgb(46, 46, 46);
  }

  .restaurant-image {
    width: inherit;
    // max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .restaurant-description {
    margin-left: auto;
    // padding-top: 40px;
    // background-color: #EFCBAD;
    color: black;
    // font-family: monospace;
  }

  .card-body {
    max-height: 200px;
    overflow-y: scroll;
  }
}

// -----------------Order Section-----------------
.order {
  border-radius: 8px;
  // padding: 30px 0;
  .row {
    justify-content: center;
  }
}
.price {
  text-align: end;
  margin: 20px 0;
}

.add-cart,
.clear-cart {
  border: 1px solid $mainColor;
  font-weight: bold;
  &:hover {
    background-color: $mainColor;
  }
}

.menu-plate {
  padding: 40px 0;
  border: 1px solid;
  background-color: white;
}

.plate-image {
  border-radius: 10px;
  margin-bottom: 20px;
  height: 120px;
  max-width: 100%;
}

.plate-description {
  height: 150px;
  overflow-y: scroll;
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

// Sidebar shopping cart
.sidebar {
  height: min-content;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 50px;
  right:100px;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding: 40px 0;
  display: flex;
  justify-content: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 8px;

  .table {
    border-radius: 8px;
  }
}

.sidebar a {
  text-decoration: none;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  left: 25px;
  font-size: 36px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: $mainColor;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  position: fixed;
  right: 10px;
  margin-top: 15px;
  z-index: 10;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left 0.5s;
  padding: 16px;
}

// --------------------------------------------

@media screen and (max-width: 520px) {
  th,
  td,
  tr {
    // padding: 0;
    vertical-align: middle !important;
  }
  .responsive {
    display: grid;
  }
  .responsive-desktop {
    display: none;
  }

  .row {
    .a {
      padding: 20px;
    }
  }
}

@media screen and (max-width: 768px) {
  .openbtn {
    right: 20px;
  }
}

@media screen and (max-width: 576px) and (max-height: 900px) {
  .sidebar {
    top: 0;
    height: 100vh;
    // width: 100vw!important;
  }
}

@media screen and (min-width: 1100px) {
  .order {
    max-width: 1400px !important;
  }
}

@media screen and (max-width: 991px) {
  .restaurant-name {
    padding-top: 50px;
  }
}
</style>