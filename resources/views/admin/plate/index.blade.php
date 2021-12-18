@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-menu">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Menu') }}

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('admin.plates.create')}}" class="d-flex px-1 justify-content-center align-items-end">
                            <button class="btn-primary btn">Crea un piatto</button>                            
                        </a>
                        <a href="{{route('admin.home')}}" class="d-flex justify-content-center align-items-end">
                            <button class="btn-primary btn">Dashboard</button>                            
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
                    <div class="p-lg-5 d-flex col-12 d-flex flex-wrap mx-auto justify-content-around">
                        @foreach ($plates as $plate)
                            
                        <div class="card mx-1 mt-3 card-menu col-12 col-lg-3">

                            <div class="card-body d-flex flex-column {{ ($plate->availability)? '' : 'not_available_plate'}}">
                                <div class="img-container d-flex justify-content-center pb-4">
                                    @if (!$plate->img_path==null)
                                        <img class="card-img-top" src="{{asset('storage/'.$plate->img_path)}}" alt="Card plate image">   
                                    @else
                                        <img class="card-img-top" src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS27Vm-OQBERqxwBt1KGktBPAlEG77NGAoHUTDOey9svEDUyPPPMAgthitFHmH2rwhATkQ&usqp=CAU')}}" alt="Card plate image">    
                                    @endif
                                </div>
                                <h5 class="card-title">{{$plate['name']}}</h5>
                                <p class="card-text">{{$plate['description']}}</p>
                                <h6 class="card-subtitle mb-2 text-muted">{{$plate['ingredients']}}</h6>
                                <h6 class="card-subtitle mb-3 mt-3 text-muted d-flex flex-grow-1 justify-content-center align-items-end">€{{str_replace(".",",",number_format($plate['price'], 2))}}</h6>

                                {{-- button section of the card --}}
                                <div class="d-flex justify-content-around buttons flex-wrap">
                                    <a href="{{route('admin.plates.show',$plate['id'])}}" class="m-1">
                                        <button class="btn-primary btn">Visualizza</button>                            
                                    </a>
                                    <a href="{{route("admin.plates.edit",  $plate["id"])}}" class="m-1">
                                        <button type="button" class="btn btn-warning">Modifica</button>
                                    </a>

                                    <a href="#" class="m-1">
                                        <button type="button" class="btn btn-danger btn-delete" data-id="{{$plate["id"]}}" data-toggle="modal" data-target="#deleteModal">
										Elimina
									    </button>
                                    </a>
                                    
                                </div>  
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modale per la cancellazione di un piatto-->
<div class="modal fade" id="deleteModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conferma cancellazione Piatto</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route("admin.plates.destroy", 'id')}}" method="POST">
			@csrf
			@method("DELETE")

            {{-- passaggio id del piatto tramite js --}}
			<input type="hidden" id="delete-id" name="id">
			<div class="modal-body">
				Sei sicuro di voler cancellare il piatto?
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Si</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			</div>
		</form>
		</div>
	</div>
</div>
<script src="{{ asset('js/crud_delete_plate.js') }}" defer></script>

@endsection