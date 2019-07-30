@extends('master')

@section('title')
  <title>Productos</title>
@endsection

@section('section')
@yield('section')
<div>
<section class="container">
    <div>

    <form  method="GET" action="{{ route('detalleProductos') }}" class="">
      @csrf
      <div class="card-deck">
        @foreach ($productos as $producto)
          <div class="card">
            <img class="card-img-top" src="/storage/img/{{$producto->photo}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$producto->name}}</h5>
              <p class="left">Año: {{$producto->year}}</p>
              <p class="card-text">{{$producto->description}}</p>
              <p align="right">Precio ${{$producto->price}}</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" type="submit" >Agregar al Carrito</button>
            </div>
          </div>
        @endforeach
      </div>
    </form>
  </div>
</section>
</div>
@endsection
