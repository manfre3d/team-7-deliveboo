
// prendo i dati del carrello in local storage
const cart = JSON.parse(localStorage.cart);

// braintree token
const js_script = document.getElementById('js_script');
let braintreeToken = js_script.getAttribute('data-token');

// page pre loader js
const paymentForm= document.getElementById("payment-form");
const preLoader= document.getElementById("loader-wrapper");
const preLoaderText= document.getElementById("description-text-loader");

const showLoader = ()=>{
  paymentForm.style.display = "none";
  preLoader.style.display = "flex";
  preLoaderText.style.display = "flex";
};


var form = document.querySelector('#payment-form');
// token generato
var client_token = braintreeToken;

// creo drop in braintree
braintree.dropin.create({
  authorization: client_token,
  selector: '#bt-dropin'

}, function (createErr, instance) {
  if (createErr) {
    console.log('Create Error', createErr);
    return;
  }
  form.addEventListener('submit', function (event) {
    event.preventDefault();

    instance.requestPaymentMethod(function (err, payload) {
      if (err) {
        console.log('Request Payment Method Error', err);
        return;
      }

      showLoader();

      // Add the nonce to the form and submit
      document.querySelector('#nonce').value = payload.nonce;
      form.submit();
    });
  });
});


// funzione che aggiorna il prezzo totale
const updatePrice = () => {
  let totalPrice = 0;

  cart.forEach( cartItem => {
    const quantity = cartItem.quantity;
    const price = cartItem.price;
    totalPrice += price * quantity;
  });

  document.querySelector('#amount').value = totalPrice.toFixed(2);
  document.querySelector('#total_price').innerHTML = `${totalPrice.toFixed(2)}€`;
};
updatePrice();


// funzione che stampa il carrello
const printCart = () => {

  const cartItemList = document.querySelector('#cart_data');

  cartItemList.innerHTML = '';
  cart.forEach( elm => {
    cartItemList.innerHTML += `
      <li class="cart_item">
        <div class="quantity_wrapper">
          <button type="button" id="${elm.id}_decrease" class="modify_quantity decrease">
            <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM7 13.5V10.5H17V13.5H7Z"></path></svg>
          </button>
          <span class="quantity">${elm.quantity}x</span>
          <button type="button" id="${elm.id}_increase" class="modify_quantity increase">
            <svg height="24" width="24" viewBox="0 0 24 24" class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"><path fill="#00ccbc" d="M12 2C17.5228 2 22 6.47725 22 12C22 17.5228 17.5228 22 12 22C6.47717 22 2 17.5228 2 12C2 6.47725 6.47717 2 12 2ZM12 20C16.4113 20 20 16.4113 20 12C20 7.58875 16.4113 4 12 4C7.58875 4 4 7.58875 4 12C4 16.4113 7.58875 20 12 20ZM13.5 7V10.4999H17V13.5H13.5V17H10.5V13.5H7V10.4999H10.5V7H13.5Z"></path></svg>
          </button>
        </div>

        <div class="info_wrapper">
          <h4 class="product_name">${elm.name}</h4>
          <div class="ingredients">${elm.ingredients}</div>
        </div>

        <div class="product_price">${elm.price}€</div>
      </li>
    `;  
  });

  // aggiungo eventi di modifica quantità ai bottoni
  const editQuantityButtons = document.querySelectorAll('.modify_quantity');

  editQuantityButtons.forEach( elm => {
    elm.addEventListener('click', (e) => {
      const buttonTarget = e.target.closest(".modify_quantity");
      const idTarget = parseInt(buttonTarget.id);
      const increase = buttonTarget.classList.contains('increase');
      const decrease = buttonTarget.classList.contains('decrease');      
      
      // trovo elemento nel carrello con l'id target 
      // modifico la quantità
      cart.forEach( (cartItem, index) => {
        // aumento o diminuisco la quantità
        if ( cartItem.id == idTarget && increase ) {
          cartItem.quantity++;
        } else if ( cartItem.id == idTarget && decrease && cartItem.quantity > 0 ) {
          cartItem.quantity--;
        }
        // se quantità è = 0 tolgo l'elemento dal cart
        if ( cartItem.quantity == 0 ) {
          cart.splice(index, 1);
        } 
      });
      // ristampo carrello
      printCart();
      // aggiorno il prezzo
      updatePrice();
    });
  });

  // salvo il carrello in un input nel form
  document.querySelector('#cart_json').value = JSON.stringify(cart);
  // aggiorno il local storage
  localStorage.cart = JSON.stringify(cart);
};
printCart();
