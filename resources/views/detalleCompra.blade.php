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
<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
		</div>
    <div class="page">
  			<div class="table-responsive">
  				<h3>Datos del usuario</h3>
  				<table class="table table-striped table-hover table-bordered">
  					<tr><td>Nombre:</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
  					<tr><td>Email:</td><td>{{ Auth::user()->email }}</td></tr>
  				</table>
  			</div>
  			<div class="table-responsive">
  				<h3>Datos del pedido</h3>
  				<table class="table table-striped table-hover table-bordered">
  					<tr>
  						<th>Producto</th>
  						<th>Precio</th>
  						<th>Cantidad</th>
  						<th>Subtotal</th>
  					</tr>
  					@foreach($cart as $item)
  						<tr>
  							<td>{{ $item->name }}</td>
  							<td>${{ number_format($item->price,2) }}</td>
  							<td>{{ $item->quantity }}</td>
  							<td>${{ number_format($item->price * $item->quantity,2) }}</td>
  						</tr>
  					@endforeach
  				</table><hr>
  				<h3>
  					<span class="label label-success">
  						Total: ${{ number_format($total, 2) }}
  					</span>
  				</h3><hr>
  				<p>
  					<a href="{{ route('compras-show') }}" class="btn btn-primary">
  						<i class="fa fa-chevron-circle-left"></i> Regresar
  					</a>

  					<a href="{{ route('thanks')}}" class="btn btn-warning">Pagar con <i class="fa fa-cc-paypal fa-2x"></i>
  					</a>
  				</p>
  			</div>
  		</div>
</div>
@endsection
