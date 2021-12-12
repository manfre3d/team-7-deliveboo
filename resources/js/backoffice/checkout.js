

// prendo i dati del carrello in local storage
const localStorageCart = JSON.parse(localStorage.cart);
const cart = localStorageCart.data;

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
          <button type="button" id="${elm.id}_decrease" class="modify_quantity">-</button>
          <span class="quantity">${elm.quantity}x</span>
          <button type="button" id="${elm.id}_increase" class="modify_quantity">+</button>
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
  const increaseBtnList = document.querySelectorAll('.modify_quantity');

  increaseBtnList.forEach( elm => {
    elm.addEventListener('click', (e) => {
      const idTarget = parseInt(e.target.id);
      const increase = e.target.innerHTML == '+';
      const descrease = e.target.innerHTML == '-';
      
      // trovo elemento nel carrello con l'id target 
      // modifico la quantità
      cart.forEach( (cartItem, index) => {
        // aumento o diminuisco la quantità
        if ( cartItem.id == idTarget && increase ) {
          cartItem.quantity++;
        } else if ( cartItem.id == idTarget && descrease && cartItem.quantity > 0 ) {
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
  localStorageCart.data = cart;
  localStorage.cart = JSON.stringify(localStorageCart);
};
printCart();
