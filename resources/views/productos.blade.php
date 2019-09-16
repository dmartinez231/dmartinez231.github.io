@extends('master')

@section('title')
  <title>Productos</title>
@endsection

@section('section')
<div>
<section class="container">
      <div class="card-deck">
        <div class="row">
        @foreach ($productos as $producto)
          <div class="col-xs-6 col-md-4 col-lg-3 col-sm-4">
            <div style="margin-bottom:20px" class="card">
              <img class="card-img-top" src="/storage/img/{{$producto->photo}}" alt="{{$producto->name}}">
              <div class="card-body">
                <h4 class="card-title">{{$producto->name}}</h4>
                <p align="right">Precio ${{$producto->price}}</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('detalleproducto',$producto->id)}}">Detalle</a>
                <a class="btn btn-primary" href="{{ route('compras-add',$producto->id)}}">Agregar carrito</a>
            </div>
          </div>
        </div>
        @endforeach
       </div>
      </div>
</section>
</div>
@endsection
