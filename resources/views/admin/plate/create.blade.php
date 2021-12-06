@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Crea un Piatto') }}
                    <a href="{{route('admin.plates.index')}}" class="d-flex justify-content-center align-items-end">
                        <button class="btn-primary btn">Torna alla pagina precedente</button>                            
                    </a>
                </div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.plates.store') }}"  enctype="multipart/form-data">
                        @csrf

                        {{-- name input --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>               

                        

                        {{-- description textarea tag --}}
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ingredients textarea tag --}}
                        <div class="form-group row">
                            <label for="ingredients" class="col-md-4 col-form-label text-md-right">{{ __('Ingredients') }}</label>

                            <div class="col-md-6">
                                <textarea id="ingredients"  class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') }}" required autocomplete="ingredients" autofocus></textarea>

                                @error('ingredients')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- price input --}}
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">

                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus/>
                                @error('price')
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
                        
                        <div class="form-group">
							<label for="plate_type_id">Categoria</label>
							<select name="plate_type_id" class="form-control @error('plate_type_id') is-invalid @enderror">
								<option value="">-- Selezion una categoria --</option>

								@foreach ($plateCategories as $category)
								<option {{ old("plate_type_id") == $category["id"] ? 'selected' : null }} value="{{$category["id"]}}">{{$category["name"]}}</option>
								@endforeach

							</select>
							@error('plate_type_id')
							<div class="alert alert-danger">{{ $message }}</div>
						  	@enderror
						</div>


                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crea piatto') }}
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