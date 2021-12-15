@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">{{ __('Benvenuto nella tua Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Accesso eseguito con successo!') }}
                </div>
                <ul>
                    <li>
                        <a href="{{route('admin.plates.index')}}" class="d-flex justify-content-center">
                            <button class="btn-primary btn">Visualizza il Menu</button>                            
                        </a>
                    </li>
                </ul>
                <div class="image_burger d-flex justify-content-center">
                    <img src="{{asset('images/dashboard/dashboard.jpeg')}}" alt="Image burger">
                </div>
            </div>
        </div>

        <div class="col-6 user_info d-flex justify-content-end">
            <ul>
                {{-- se il path dell'imagine conduce ad un file che esiste --}}
                @if (file_exists(('storage/'.$user->img_path)))
                   <li><span><img class="img_account" src="{{asset('storage/'. $user->img_path)}}" alt=""></span></li> 
                @else
                    <li><span><img class="img_account" src="{{asset('images/seeder_images/'. $user->img_path)}}" alt=""></span></li> 
                @endif

                <li><span>Nome Attività: {{$user->name}}</span></li>
                <li><span>Indirizzo e-mail: {{$user->email}}</span></li>
                <li><span>Indirizzo: {{$user->address}}</span></li>
                <li><span>P.IVA: {{$user->piva}}</span></li>
                @if ($user->description)
                    <li><span>Descrizione: {{$user->description}}</span></li>  
                @endif
                <img class="salad" src="{{asset('images/dashboard/salad.webp')}}" alt="Image salad">
            </ul> 
        </div>
  
    </div>

    <div class="row">
        <div class="col-12">
            <div class="logo">
                <img src="{{asset('images/dashboard/logo.png')}}" alt="logo deliveboo">
                <h2>deliveboo</h2>
            </div>
        </div>
    </div>
</div>
@endsection