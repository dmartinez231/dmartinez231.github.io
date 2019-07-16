@extends('master')

@section('title')
  <title>Formulario</title>
@endsection

@section('section')
@yield('section')
<div class="registros">
<section class="container">
    <div class="center">

      <form  method="POST" action="{{ route('formulario') }}" class="border p-3 form">
        @csrf
        <h1 class="login">Cargar Productos</h1>
        <div class="form-group text-center">
        <hr>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label  class="form-check-label" for="name">Nombre:</label>
                  <input class="form-control @error('name') is-invalid @enderror"  id="name" type="text" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label  class="form-check-label" for="year">Año:</label>
                  <input class="form-control @error('year') is-invalid @enderror" id="year" type="number" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>
                  @error('year')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label  class="form-check-label" for="stock">Disponbles:</label>
                <input class="form-control @error('stock') is-invalid @enderror" id="stock" type="number" name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>
                @error('stock')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label  class="form-check-label" for="photo">Foto:</label>
                <input class="form-control @error('photo') is-invalid @enderror" id="photo" type="text" name="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>
                @error('photo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          </div>
          <div class="form-row">
            <div class="form-group">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="description">Descripcion:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" rows="3" required autocomplete="description" autofocus></textarea>
                    @error('description')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="form-check-label" for="price">Precio:</label>
                    <input class="form-control  @error('price') is-invalid @enderror" id="price" type="number" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                      <span class="invalid-feedback" role="alert">
                        @error('price')
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          <div class="form-group text-center">
            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit" >crear Producto</button>
              <button class="btn btn-primary" type="reset" >limpiar</button>
            </div>
           </div>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection
