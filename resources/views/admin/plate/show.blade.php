@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Piatto') }} {{$plate['name']}}
                    <a href="{{route('admin.plates.index')}}" class="d-flex justify-content-center align-items-end">
                        <button class="btn-primary btn">Torna al menu</button>                            
                    </a>
                </div>

                <div class="card mx-1 d-flex flex-grow-1" style="width: 18rem;">
                    <div class="card-body d-flex flex-column">
                        <img class="card-img-top" src="{{asset('storage/'.$plate->img_path)}}" alt="Card- plate image">
                        <h5 class="card-title">{{$plate['name']}}</h5>
                        <p class="card-text">{{$plate['description']}}</p>
                        <h6 class="card-subtitle mb-2 text-muted">{{$plate['ingredients']}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{$plate['price']}}</h6>
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
                
            </div>
        </div>
    </div>
</div>
@endsection