@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-menu">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('admin.orders.index')}}">
                        <button class="btn-primary btn">Torna agli ordini</button>                            
                    </a>
                </div>

                <div class="card-body">
                    <div class="p-5 d-flex col-12 d-flex flex-wrap mx-auto justify-content-around">
                        
                            
                        <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;">
                            <div class="card-body d-flex flex-column ">
                                <h3>Ordine a:</h3>
                                <h5 class="card-title">{{$order['customer_name']}} {{$order['customer_surname']}}</h5>
                                <h3>Email:</h3>
                                <h5 class="card-title">{{$order['customer_email']}}</h5>
                                <h3>Numero di Telefono:</h3>
                                <h5 class="card-title">{{$order['customer_phone_number']}}</h5>
                                <h3>Indirizzo:</h3>
                                <h5 class="card-title">{{$order['customer_address']}}</h5>
                                <h6 class="card-subtitle mb-3 mt-3 text-muted d-flex flex-grow-1 justify-content-center align-items-end">Importo Totale pagato: <br> €{{str_replace(".",",",number_format($order['total_price'], 2))}}</h6>
                                <h4>Piatti Ordinati</h4>
                                <ol>
                                    @foreach ($platesOrdered as $plate)

                                        <li>
                                            <h5>Nome Piatto: <br> {{$plate['plate']['name']}}</h5>
                                            <h6>Quantità: {{$plate['quantity']}}</h6>
                                            <h6>Prezzo pagato: €{{str_replace(".",",",number_format($plate['plate']['price']*$plate['quantity'], 2))}}</h6>
                                            
                                            

                                        </li>
                                    @endforeach
                                    
                                </ul>

                                 
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
@endsection