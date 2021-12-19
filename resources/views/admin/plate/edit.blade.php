@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Modifica un Piatto') }}
                    <a href="{{route('admin.plates.index')}}">
                        <button class="btn-primary btn">Torna al Menu</button>                            
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.plates.update',$plate) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- name input --}}
                        <div class="form-group row col-12 col-lg-11 input_container">
                            <label for="name" class="col-lg-3 col-form-label text-lg-right">{{ __('Nome') }}</label>

                            <div class="col-lg-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                    name="name" value="{{ $plate->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>               

                        

                        {{-- description textarea tag --}}
                        <div class="form-group col-12  row col-lg-11 input_container">
                            <label for="description" class="col-lg-3 col-form-label text-lg-right">{{ __('Descrizione') }}</label>

                            <div class="col-12 col-lg-9">
                                <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" 
                                    name="description" required autocomplete="description" 
                                    autofocus>{{$plate->description ?? old('description')}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ingredients textarea tag --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="ingredients" class="col-lg-3 col-form-label text-lg-right">{{ __('Ingredienti') }}</label>

                            <div class="col-12 col-lg-9">

                                <textarea id="ingredients" rows="4" class="form-control @error('ingredients') is-invalid @enderror" 
                                    name="ingredients" required autocomplete="ingredients" 
                                    autofocus>{{$plate->ingredients ?? old('description')}}</textarea>


                                @error('ingredients')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- price input --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="price" class="col-lg-3 col-form-label text-lg-right">{{ __('Prezzo') }}</label>

                            <div class="col-12 col-lg-9">

                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price') ?? $plate->price }}" required autocomplete="price" autofocus/>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- image input tag --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <div class="col-lg-9 offset-lg-3">
                                {{-- label per l'input tag --}}

                                @if($plate->img_path)

                                <img class="card-img-top" src="{{asset('storage/'.$plate->img_path)}}" alt="Card- plate image">

                                @endif

                                <label name="image">Inserisci l'immagine del piatto da creare</label>
                            
                                {{-- input tag, type file, per inviare file all'invio del form --}}
                                <input type="file" name="image"
                                    class="form-control-file @error('image') is-invalid @enderror" >
                            
                                {{-- codice per mostrare un errore in caso di validazione non soddisfatta --}}
                                @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror    
                            </div>
                        </div>

                        {{-- category select tag --}}
                        <div class="form-group col-12 row col-lg-12 input_container">
                            <label class="col-form-label col-12" for="plate_type_id">Categoria</label>

                            <div class="col-12">
                                <select id="plate_type_select" name="plate_type_id" class="form-control @error('plate_type_id') is-invalid @enderror">
                                    <option value="">-- Selezion una categoria --</option>
                                    
                                    @foreach ($plateCategories as $category)
                                    <option {{ $category["id"]==$plate['plate_type_id'] ? 'selected' : null }} value="{{$category["id"]}}">{{$category["name"]}}</option>
                                    @endforeach
                                    
                                </select>
                                @error('plate_type_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                        </div>

                        {{-- availability select tag --}}
                        <div class="form-group col-12 row col-lg-12 input_container">
                            <label class="col-form-label col-12" for="availability">Disponibilità</label>

                            <div class="col-12">
                                <select name="availability" class="form-control @error('availability') is-invalid @enderror">
                                    <option value="1">-- Piatto disponibile --</option>								
                                    <option {{ ($plate->availability)? '' : 'selected' }} value="0">-- Piatto non disponibile --</option>

                                </select>
                                @error('availability')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
						</div>

                        <div class="form-group row mb-0 justify-content-center">

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salva modifica') }}

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/crud_plate_type.js') }}" defer></script>
@endsection