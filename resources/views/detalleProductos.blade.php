<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Detalle de Producto</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <h3 class="text-center">Detalle de Producto</h3>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel">{{$producto->name}}</h4>
            </div>
            <div class="modal-body row">
                 <img class="col-sm-6" class="card-img-top" src="/storage/img/{{$producto->photo}}" alt="{{$producto->name}}">
              <div class="col-sm-6 text-center" style="margin:auto">
                <p >Año: {{$producto->year}}</p>
                <p >{{$producto->description}}</p>
                <p >Precio ${{$producto->price}}</p>
                <p >stock: {{$producto->stock}}</p>
            </div>
           </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{route('productos')}}">Volver</a>
            <a class="btn btn-primary" href="{{ route('compras-add',$producto->id)}}">Agregar carrito</a>            
          </div>
      </div>
    </div>
  </body>
</html>
