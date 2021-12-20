
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Deliveboo</title>
  <link rel="icon" type="image/x-icon" href="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/checkout_page.css') }}">
 

</head>
<body>
  <header>
    <div class="logo_container">
      {{-- <svg width="200" height="50" viewBox="0 0 300 80" xmlns="http://www.w3.org/2000/svg"><title>Artboard</title><path d="M116.41 59.926l-1.133-5.28V23.172h-6.542v14.357c-1.968-2.27-4.675-3.6-7.87-3.6-6.545 0-11.61 5.376-11.61 13.27 0 7.895 5.065 13.272 11.61 13.272 3.246 0 6.05-1.383 8.018-3.752l.688 3.207h6.84zm126.18-17.81l3.1-6.956c-1.428-.89-3.1-1.283-4.722-1.283-2.952 0-5.412 1.328-6.985 3.8l-.69-3.21h-6.74l1.082 4.982V59.92h6.54v-16.23c.885-1.677 2.56-2.712 4.723-2.712 1.332.002 2.56.346 3.692 1.135zm8.904 5.08c0-3.946 2.806-6.41 6.59-6.41 3.84 0 6.595 2.464 6.595 6.41 0 3.9-2.756 6.415-6.594 6.415-3.786 0-6.592-2.514-6.592-6.413zm-155.895 0c0-3.946 2.803-6.41 6.59-6.41 3.84 0 6.593 2.464 6.593 6.41 0 3.9-2.754 6.415-6.59 6.415-3.788 0-6.594-2.514-6.594-6.413zm191.462 6.415c-3.787 0-6.59-2.514-6.59-6.413 0-3.947 2.803-6.412 6.59-6.412 3.837 0 6.59 2.465 6.59 6.412 0 3.9-2.753 6.414-6.59 6.414zM138.594 44.88h-12.592c.738-2.91 2.95-4.49 6.295-4.49 3.395 0 5.61 1.58 6.297 4.49zm78.268 0H204.27c.737-2.91 2.95-4.49 6.295-4.49 3.395 0 5.61 1.58 6.297 4.49zm-27.695 15.048l6.84-25.457h-7.134l-5.016 20.622-5.02-20.623h-7.035l6.84 25.455h10.525zm-27.4 0h6.538V34.468h-6.54v25.458zm-18.233-2.44l-2.508-5.623c-2.362 1.233-4.97 1.973-7.626 1.973-3.442 0-5.853-1.332-6.887-3.8h18.397c.197-.936.297-1.873.297-3.008 0-7.894-5.46-13.173-12.79-13.173-7.378 0-12.79 5.33-12.79 13.272 0 8.09 5.362 13.27 13.676 13.27 3.64 0 7.23-.987 10.23-2.91zm143.528-23.56c-7.43 0-12.938 5.377-12.938 13.27 0 7.896 5.51 13.272 12.937 13.272 7.43 0 12.94-5.376 12.94-13.27 0-7.895-5.51-13.272-12.938-13.272zm-65.377 23.63l-2.51-5.625c-2.363 1.234-4.97 1.973-7.627 1.973-3.443 0-5.854-1.33-6.887-3.8h18.4c.197-.936.294-1.873.294-3.007 0-7.894-5.46-13.173-12.79-13.173-7.38 0-12.79 5.327-12.79 13.272 0 8.09 5.363 13.27 13.676 13.27 3.64.003 7.23-.983 10.235-2.908zm49.338-10.36c0-7.893-5.51-13.27-12.938-13.27-7.43 0-12.938 5.377-12.938 13.27 0 7.896 5.51 13.272 12.937 13.272 7.43 0 12.94-5.376 12.94-13.27zM155.91 59.927V23.17h-6.542v36.755h6.542zm13.233-33.108c0-2.368-1.77-4.144-4.082-4.144-2.36 0-4.13 1.776-4.13 4.144 0 2.368 1.77 4.144 4.132 4.144 2.31 0 4.08-1.776 4.08-4.144zM48.916 35.276l-6.39-29.74-20.03 4.215 6.385 29.74L0 45.563 5.1 69.32 55.89 80l11.614-25.813L73.03 2.12 52.66 0l-3.744 35.276zM32.712 51.552c-1.466-.482-2.118-2.237-1.562-4.36.414-1.575 2.362-1.81 3.337-1.828.37-.006.735.068 1.07.218.69.31 1.857.968 2.094 1.973.343 1.45.013 2.667-1.034 3.616-1.05.953-2.434.866-3.904.382zm13.882 1.788c-1.324-.642-1.314-2.277-1.17-3.274.078-.543.298-1.055.642-1.487.473-.594 1.263-1.367 2.175-1.39 1.485-.04 2.762.62 3.483 1.812.724 1.188.362 2.498-.4 3.81-.767 1.307-2.764 1.48-4.73.528z" fill="#fff" fill-rule="evenodd"/></svg> --}}
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="https://newsmondo.it/wp-content/uploads/2021/08/FB_Deliveroo.jpg" alt="Deliveboo logo">
          Deliveboo
      </a>
    </div>
  </header>
  <main>
    {{-- se il pagamento restituisce un errore --}}
    @if ( count($errors) > 0 )
    <div class="container-fluid error">
      <div class="row justify-content-center">
        <div class="col-6">C'è stato un errore e il pagamento è stato interrotto</div>
      </div>
    </div>
    @endif 
    
    
    <form method="post" id="payment-form" action="{{ url('/checkout_process') }}">
      @csrf
      <section class="form_input_section">
        <div class="input_wrapper name">
          <label for="customer_name">nome*</label>
          <input type="text" name="customer_name" id="customer_name" placeholder="nome" required>
        </div>
        <div class="input_wrapper">
          <label for="customer_surname">cognome*</label>
          <input type="text" name="customer_surname" id="customer_surname" required placeholder="cognome">
        </div>
        <div class="input_wrapper email">
          <label for="customer_email">la tua email*</label>
          <input type="email" name="customer_email" id="customer_email" required placeholder="la tua e-mail">
        </div>
        <div class="input_wrapper">
          <label for="customer_phone_number">telefono*</label>
          <input type="text" name="customer_phone_number" id="customer_phone_number" required placeholder="0433123456">
        </div>
        <div class="input_wrapper address">
          <label for="customer_address">indirizzo di consegna*</label>
          <input type="text" name="customer_address" id="customer_address" required placeholder="indirizzo di consegna">
        </div>

        <input type="text" name="cart_json" id="cart_json" value="">

        {{-- drop in braintree --}}
        <div class="bt-drop-in-wrapper braintree_dropin">
          <div id="bt-dropin"></div>
        </div>      

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button id="form_submit" class="button submit_btn" type="submit"><span>Pagamento</span></button>
      </section>
      
      <section class="cart_section">
        <h3>Carrello</h3>

        <ul id="cart_data">
        </ul>

        <hr>
        
        <label for="amount">
          <h3 class="input-label">Totale:<span id="total_price"></span></h3>
          <div class="input-wrapper amount-wrapper">
            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
          </div>
        </label>
      </section>
    </form>
    {{-- page pre loader html --}}
    <div id="loader-wrapper" class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <h2 id="description-text-loader" class="description-text">Pagamento in corso.. </h2>
  </main>
  
  <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
  <script id="js_script" src="{{ asset('js/checkout.js') }}" data-token="{{$token}}" defer></script>
</body>
</html>