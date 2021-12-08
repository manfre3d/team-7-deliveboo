@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-menu">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{$plate['name']}}
                    <a href="{{route('admin.plates.index')}}">
                        <button class="btn-primary btn">Torna al menu</button>                            
                    </a>
                </div>

                <div class="card-body">
                    <div class="show_img">
                        <img class="card-img-top mb-3" src="{{asset('storage/'.$plate->img_path)}}" alt="Card plate image">
                    </div>
                    <h5 class="card-title">{{$plate['name']}}</h5>
                    <p class="card-text">{{$plate['description']}}</p>
                    <h6 class="card-subtitle mb-3 text-muted">{{$plate['ingredients']}}</h6>
                    <h6 class="card-subtitle mb-3 text-muted">€{{str_replace(".",",",number_format($plate['price'], 2))}}</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{route("admin.plates.edit",  $plate["id"])}}" class="m-1">
                            <button type="button" class="btn btn-warning">Modifica</button>
                        </a>
                        <form action="{{route("admin.plates.destroy", $plate["id"])}}" method="POST" class="m-1">
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