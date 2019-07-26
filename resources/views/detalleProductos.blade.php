@extends('master')

@section('title')
  <title>Productos</title>
@endsection

@section('style')
style ="background-color: rgba(0,0,0,1)"
@endsection


@section('background')
style ="background:none"
@endsection


@section('section')
@yield('section')
<div>
<section class="container">
    <div>
      <form  method="GET" action="{{ route('compras') }}" class="">
        @csrf
        <div class="row">
          <div class="col">
            <img src="..." alt="..." class="img-thumbnail">
          </div>
          <div class="col">
            <h5 class="card-title">Card title</h5>
            <p>Precio $</p>
            <hr>
            <p>Disponibilidad</p>
            <p>Unidades Disponibles: XXXX</p>
            <div class="row">
              <div class="col">
                <p class="fa fa-truck"> Enviar a Domicilio</p>
              </div>
                <div class="col">
                <p class="fa fa-shopping-bag"> Retirar en tienda</p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="number" name="cantidad">
              </div>
              <div class="col">
                <button class="btn btn-primary btn-sm" type="submit" >Agregar al Carrito</button>
              </div>
            </div>
            <p>Especificaciones</p>
            <div class="row">
              <div class="col">
                <p>Año: XXXX</p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
</section>
</div>
@endsection
