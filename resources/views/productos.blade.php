@extends('master')

@section('title')
  <title>Productos</title>
@endsection

@section('section')
@yield('section')
<div>
<section class="container">
    <div>

      <form  method="GET" action="{{ route('productos') }}" class="">
        @csrf
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p align="right">Precio $</p>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary" type="submit" >Agregar al Carrito</button>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p align="right">Precio $</p>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary" type="submit" >Agregar al Carrito</button>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p align="right">Precio $</p>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary" type="submit" >Agregar al Carrito</button>
    </div>
  </div>
</div>
</form>
</div>
</section>
</div>
@endsection
