@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-menu">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('admin.orders.index')}}">
                        <button class="btn-primary btn">Torna agli ordini</button>                            
                    </a>
                </div>

                <div class="card-body">
                
                    <h3 class="mb-3 text-center">Riepilogo ordine n°{{$order_number}}</h3>
                    <div class="padding">
                        <h5>Ordinato da:</h5>
                                <h6 class="card-title">{{$order['customer_name']}} {{$order['customer_surname']}}</h6>
                                <h5>Email:</h5>
                                <h6 class="card-title">{{$order['customer_email']}}</h6>
                                <h5>Numero di Telefono:</h5>
                                <h6 class="card-title">{{$order['customer_phone_number']}}</h6>
                                <h5>Indirizzo:</h5>
                                <h6 class="card-title">{{$order['customer_address']}}</h6>
                                <h6 class="card-subtitle mb-3 mt-3 text-muted d-flex flex-grow-1 align-items-end">Importo Totale pagato: €{{str_replace(".",",",number_format($order['total_price'], 2))}}</h6>
                                <h5>Piatti Ordinati:</h5>
                                <ol>
                                    @foreach ($platesOrdered as $plate)
                                        <li>
                                            <h6 class="mt-3"><strong>{{$plate['plate']['name']}}</strong></h6>
                                            <h6>Quantità: {{$plate['quantity']}}</h6>
                                            <h6>Prezzo pagato: €{{str_replace(".",",",number_format($plate['plate']['price']*$plate['quantity'], 2))}}</h6>
                                        </li>
                                    @endforeach
                                </ol>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection