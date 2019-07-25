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

@section('section')
<div>
<section class="container">
    <div>
      <form  method="GET" action="{{ route('compras') }}" class="">
        @csrf
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Costo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td class="fa fa-edit"></td>
      <td class="fa fa-trash"></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td class="fa fa-edit"></td>
      <td class="fa fa-trash"></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td class="fa fa-edit"></td>
      <td class="fa fa-trash"></td>
    </tr>
  </tbody>
</table>
<p align="right">Total $:</p>
<p align="right">Seguir Comprando</p>
</form>
</div>
</section>
</div>
@endsection
