@extends('master')

@section('title')
  <title>Compras</title>
@endsection

@section('style')
style ="background-color: rgba(0,0,0,1)"
@endsection


@section('background')
style ="background:none"
@endsection
@section('script')
  <script type="text/javascript" src="/js/validar.js"></script>
@endsection

@section('section')
<div>
<section class="container">
    <div>
      <div class='text-success'>
        {{Session::get('status')}}
      </div>
      @if(count($cart))
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Quitar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $item)
              <tr>
                <th><img style="width:50px" src="/storage/img/{{$item->photo}}" alt="{{$item->name}}"></th>
                <td>{{$item->name}}</td>
                <td> <input
                        type="number"
                        min="1"
                        max="{{$item->stock}}"
                        value="{{$item->quantity}}"
                        id="product_{{$item->id}}">
                     <a href="#"
                        class="btn btn-warning btn-update-item"
                        data-href="{{route('compras-update',$item->id)}}"
                        data-id="{{$item->id}}">
                     <i class="fa fa-refresh"></i> </a>
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->price * $item->quantity}} </td>
                <td>
                   <a href="{{route('compras-delete',$item->id)}}" class="btn btn-danger"> <i class="fa fa-remove"></i>  </a>
                </td>
              </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <h3 class="text-center"><span class="label label-warning">No hay productos en el carrito</span></h3>
      @endif
<h3> <span class="label label-success"> Total $: {{$total}}</span></h3>
<button class="btn btn-danger" align="right"><a href="{{ route('productos') }}">Seguir Comprando</a></button>
<button class="btn btn-danger"> <a href="{{route('compras-trash')}}">Vaciar carrito</a></button>
<a href="{{route('compras-detalle')}}"><h3> <span class="label label-success">Finalizar compra</span></h3></a>
</div>
</section>
</div>
@endsection
