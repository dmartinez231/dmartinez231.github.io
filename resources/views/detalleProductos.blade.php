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

      <form  method="GET" action="{{ route('detalleProductos') }}" class="">
        @csrf

</form>
</div>
</section>
</div>
@endsection
