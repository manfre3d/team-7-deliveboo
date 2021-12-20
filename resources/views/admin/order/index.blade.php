@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-menu">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Ordini') }}

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('admin.home')}}" class="d-flex justify-content-center align-items-end">
                            <button class="btn-primary btn">Torna alla pagina precedente</button>                            
                        </a>
                        <a class="btn-primary btn" href="{{route('admin.grafici-ordini', date("Y"))}}">Statistiche</a>
                    </div>
                </div>

                <div class="content d-flex flex-wrap">
                    @if ($message = Session::get('success'))
					<div class="alert alert-success alert-block col">
						<button type="button" class="close" data-dismiss="alert">×</button>    
						<strong>{{ $message }}</strong>
					</div>
					@endif  

                    <div class="d-flex col-12 d-flex flex-wrap mx-auto justify-content-around mb-3">

                        @foreach ($orders as $key=>$order)                        
                        <div class="card mx-1 mt-3 card-menu" style="width: 20.5rem;">
                            <h5 class="riepilogo">Riepilogo ordine n°{{count($orders) - $key}}</h5>
                            <div class="card-body d-flex flex-column padding">
                                <h5>Ordinato da:</h5>
                                <h6 class="card-title">{{$order['customer_name']}} {{$order['customer_surname']}}</h6>
                                <h5>Email:</h5>
                                <h6 class="card-title">{{$order['customer_email']}}</h6>
                                <h5>Numero di Telefono:</h5>
                                <h6 class="card-title">{{$order['customer_phone_number']}}</h6>
                                <h5>Indirizzo:</h5>
                                <h6 class="card-title">{{$order['customer_address']}}</h6>
                                <h6 class="card-subtitle mb-3 mt-3 text-muted d-flex flex-grow-1 align-items-end">Importo pagato: €{{str_replace(".",",",number_format($order['total_price'], 2))}}</h6>
                                <a href="{{route('admin.orders.show',$order['id'])}}" class="m-1 d-flex justify-content-center">
                                    <button class="btn-primary btn mb-2">Dettagli ordine</button>                            
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection