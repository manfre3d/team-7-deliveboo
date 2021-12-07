@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Benvenuto nella tua Dashboard') }}</div>

                <div class="card-body">
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
            </div>
        </div>
        <div class="col-md-8">
            <div class="image">
                <img src="{{asset('image/dashboard.jpeg')}}" alt="dashboard image">
            </div>
        </div>
        <div class="col-md-8">
            <div class="logo">
                <img src="{{asset('image/logo.png')}}" alt="logo deliveboo">
                <h2>deliveboo</h2>
            </div>
        </div>
    </div>
</div>
@endsection
