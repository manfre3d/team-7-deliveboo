<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/payment_success.css') }}">
  
  <link rel="icon" type="image/x-icon" href="https://cdn.iconscout.com/icon/free/png-256/deliveroo-3442893-2875354.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="payment_success">
    <header>
        <div class="logo_container d-flex justify-content-center">
            <img src="https://newsmondo.it/wp-content/uploads/2021/08/FB_Deliveroo.jpg" alt="Deliveboo logo">
        </div>
      </header>
      <main class="d-flex flex-column align-items-center container_main">
        <h1 class="flex-wrap">Pagamento avvenuto con successo</h1>  
        <div class="riepilogo">
            <h3>Riepilogo ordine:</h3>
            <ul class="d-flex flex-wrap justify-content-between list">
                @foreach ($cartData as $item)
                    <li class="col-2">{{$item->quantity}}x</li>
                    <li class="col-8">{{$item->name}}</li>
                    <li class="col-2">{{str_replace(".",",",number_format($item->price, 2))}}€</li>
                @endforeach
            </ul>
            <h5 class="text-center">Totale: {{str_replace(".",",",number_format($amount, 2))}}€</h5>
        </div>
      </main>
      <footer>
          <h4 class="text-center">
              <a class="navbar-brand" href="{{ url('/') }}">
                Torna alla HomePage
              </a>
          </h4>
      </footer>
      
      <script src="{{ asset('js/checkout_cart_delete.js') }}" defer></script>  

</body>
</html>

