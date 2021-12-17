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

                    </div>
                </div>

                <div class="content d-flex flex-wrap">
                    @if ($message = Session::get('success'))
					<div class="alert alert-success alert-block col">
						<button type="button" class="close" data-dismiss="alert">×</button>    
						<strong>{{ $message }}</strong>
					</div>
					@endif  

                    <div class="p-5 d-flex col-12 d-flex flex-wrap mx-auto justify-content-around">

                        @foreach ($orders as $order)                        
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
                                <h6 class="card-subtitle mb-3 mt-3 text-muted d-flex flex-grow-1 justify-content-center align-items-end">€{{str_replace(".",",",number_format($order['total_price'], 2))}}</h6>
                                <a href="{{route('admin.orders.show',$order['id'])}}" class="m-1">
                                    <button class="btn-primary btn">Dettagli ordine</button>                            
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