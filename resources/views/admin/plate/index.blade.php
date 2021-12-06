@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Menu') }}

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('admin.plates.create')}}" class="d-flex px-1 justify-content-center align-items-end">
                            <button class="btn-primary btn">Crea un piatto</button>                            
                        </a>
                        <a href="{{route('admin.home')}}" class="d-flex justify-content-center align-items-end">
                            <button class="btn-primary btn">Torna alla pagina precedente</button>                            
                        </a>

                    </div>
                </div>

                <div class="content d-flex flex-wrap">                            
                    
                    <div class="jumbotron col-12 jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Fluid jumbotron</h1>
                            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                        </div>
                    </div>

                    <div class="p-5 d-flex col-10 flex-wrap justify-content-center mx-auto">
                        @foreach ($plates as $plate)
                            
                        <div class="card mx-1" style="width: 18rem;">
                            <div class="card-body d-flex flex-column">
                                <img class="card-img-top" src="{{asset('storage/'.$plate->img_path)}}" alt="Card- plate image">
                                <h5 class="card-title">{{$plate['name']}}</h5>
                                <p class="card-text">{{$plate['description']}}</p>
                                <h6 class="card-subtitle mb-2 text-muted">{{$plate['ingredients']}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$plate['price']}}</h6>

                                {{-- button section of the card --}}
                                <a href="{{route('admin.plates.show',$plate['id'])}}" class="m-1 d-flex flex-grow-1 justify-content-center align-items-end">
                                    <button class="btn-primary btn px-3">Visualizza Piatto</button>                            
                                </a>
                                <a href="{{route("admin.plates.edit",  $plate["id"])}}" class="m-1 d-flex flex-grow-1 justify-content-center align-items-end">
                                    <button type="button" class="btn btn-warning">Modifica</button>
                                </a>
                                <form action="{{route("admin.plates.destroy", $plate["id"])}}" method="POST" class="m-1 d-flex flex-grow-1 justify-content-center align-items-end">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
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