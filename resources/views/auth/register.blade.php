@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf

                        {{-- name input --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email input --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>


                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password input--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password confirm input--}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma password*') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- description textarea tag --}}
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- image input tag --}}
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                {{-- label per l'input tag --}}
                                <label name="image">Inserisci l'immagine del ristorante da registrare</label>
                            
                                {{-- input tag, type file, per inviare file all'invio del form --}}
                                <input type="file" name="image"
                                    class="form-control-file @error('image') is-invalid @enderror" >
                            
                                {{-- codice per mostrare un errore in caso di validazione non soddisfatta --}}
                                @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror    
                            </div>
                        </div>
                        
                        {{-- address input tag --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address*') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- piva input tag --}}
                        <div class="form-group row">
                            <label for="piva" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva*') }}</label>

                            <div class="col-md-6">
                                <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" required autocomplete="piva" autofocus>

                                @error('piva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- checkbox scelta tipologia ristorante --}}
                        <div class="form-group row my-4">
                            <label for="restaurant_types" class="col-md-4 col-form-label text-md-right">
                                {{ __('Tipologia Ristorante*') }} <br>
                                (max 2)
                            </label>

                            <div class="col-md-6">
                                <div id="checkbox_container">
                                    @foreach ($restaurant_types as $type)
                                        <div class="custom-control custom-checkbox" id="{{$type['id']}}">
                                            <input name="restaurant_type[]" value="{{$type['id']}}" type="checkbox" 
                                                class="checkbox custom-control-input @error('restaurant_type') is-invalid @enderror" 
                                                id="type-{{$type['id']}}">
                                            <label class="custom-control-label" for="type-{{$type['id']}}">
                                                {{$type['name']}}
                                            </label>
                                        </div>
                                    @endforeach                                    
                                </div>

                                <div class="d-flex mt-2">
                                    <input value="" placeholder="nuova tipologia" type="text" class="form-control" id="new_rest_type">
                                    <button type="button" class="btn btn-secondary ml-3" id="add_new_rest_type">aggiungi</button>
                                </div>

                                @error('restaurant_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
