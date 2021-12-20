<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email conferma ordine</title>
    <style>
        body{
            font-family: sans-serif;
            background-color: #F9FAFA
        }
        header{
            background-color: #00CCBE;
            padding: 28px 0px;
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
            text-align: center;
        }
        header img{
            margin-left: -10px;
            max-width:70px; 
            display:inline-block; 
            text-align:center;
        }
        header h2{
            color:white; 
            display:inline-block;
            font-size:28px;
        }
        header h1{
            color: white;
            font-size: 28px;
            text-align: center
        }
        main{
            padding: 10px;
            width: 100%;
        }
        main ul{
            width: 100%;
            display: flex;
        }
        main ul li{
            list-style: none;
            display: flex;
        }
        .list{
            padding: 10px;
        }
        .container {
            width: 100%;
        }
        .order {
            display: inline-block;
            width: 250px;
            word-spacing: 2px;
            font-size: 15px;
        }
        .order.price {
            text-align: end;
            width: 45px;
        }
        footer{
            display: flex;
            justify-content: center;
        }
        .btn{
            background-color: #00CCBE;
            border: none;
            border-radius: 20px;
            padding: 10px;
            margin: 30px 0;
        }
        .btn a{
        text-decoration: none;
        color: white;
        font-size:13px;
        font-weight:bold;
        text-align: center;
        }
    </style>
    </head>

    <body>
        <header>
            <div class="d-flex">
                <img src="https://newsmondo.it/wp-content/uploads/2021/08/FB_Deliveroo.jpg" alt="Deliveboo logo">
                <h2>deliveboo</h2>
            </div>
            <h1>Riepilogo ordine:</h1>
        </header>

        <main>
            <h4>Nome: {{$newOrder['customer_name']}}</h4>
            <h4>Cognome: {{$newOrder['customer_surname']}}</h4>
            <h4>Email: {{$newOrder['customer_email']}}</h4>
            <h4>Nome Attività: {{$restaurant['name']}}</h4>
                @foreach ($cartData as $item)
                    <div class="container">
                        <div class="row">
                            <div class="d-flex order">{{$item->quantity}}x {{$item->name}}</div> 
                            <div class="order price">{{$item->price}}€</div>
                        </div>
                    </div>
                @endforeach

            <h4>Prezzo totale pagato: {{$newOrder['total_price']}}€</h4> 
        </main>

        <footer>
            <button class="btn">
                <a href="{{ url('/') }}" target="_blank">
                    Vai alla HomePage
                </a>
            </button>
        </footer>
    </body>
</html>