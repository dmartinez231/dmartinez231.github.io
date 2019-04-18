<?php
include ("funciones.php");
$errores = [];
$nombreOk= "";

if ($_POST){

var_dump (validar ($_POST));
}




 ?>

<!DOCTYPE html>

<html>
<head>
	<title>Register | Wine</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body id="body-home" class="login">
	<nav class="container-navegador">
		<div id="logo">
				<h2 class="marca"><a href="index.html">WINE</a></h2>
		</div>
		<div id="menu">
			<div class="control-menu">
				<a href="#menu" class="open"><span>Menu</span></a>
				<a href="#" class="close"><span>Cerrar</span></a>
			</div>
			<ul class="list-menu">
						<li >
							 <a href="registro.html">Registro</a>
						</li>
						<li>
								 <a href="login.html">Login</a>
							</li>
							<li>
								 <a href="#">Productos</a>
							</li>
							<li>
								 <a href="#">Compras</a>
							</li>
							<li>
								 <a href="index.html#como-trabajamos">Como trabajamos</a>
							</li>
			</ul>
		</div>
	</nav>
	<div class="registros">
	<section class="container">
			<div class="center">
				<form action="registro.php" class="border p-3 form" method="post">
					<h1 class="login">Registro</h1>
					<div class="form-group text-center">
					<hr>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Nombre y Apellido:</label>
										<input class="form-control" id="nombre" type="text" name="nombre" value="">
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="nacimiento">Fecha de nacimiento:</label>
										<input class="form-control" type="date" name="nacimiento" value="">
									</div >
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						 	    <div class="input-group mb-3">
						 	    	<div class="input-group-prepend">
						 	    		<label class="form-check-label" for="pais">País:</label>
										<select class="form-control" id="pais" class="" name="pais">
											<option value="arg">Argentina</option>
											<option value="uru">Uruguay</option>
											<option value="bra">Brasil</option>
											<option value="chi">Chile</option>
											<option value="col">Colombia</option>
											<option value="ven">Venezuela</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="mail">e-mail:</label>
										<input class="form-control" id="mail" type="text" name="mail" value="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="pass">Contraseña:</label>
										<input class="form-control" id="pass" type="password" name="pass" value="">
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="confirmpass">Confirmar contraseña:</label>
										<input class="form-control" id="confirmpass" type="password" name="confirmpass" value="" >
									</div>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
								<label class="form-check-label" for="info">¿Desea recibir nuestras ofertas mensuales?</label>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6">
										<input class="form-check-input" id="" type="radio" name="ofertas" value="si" checked><label class="form-check-label"> Sí</label>
								</div>
								<div class="form-group col-md-6">
										<input class="form-check-input" id="" type="radio" name="ofertas" value="no"><label class="form-check-label"> No</label>
								</div>
							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
								</div>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary" type="reset" name="limpia">limpiar</button>
								<button class="btn btn-primary" type="submit" name="crea">crear usuario</button>
							</div>
					</div>
					</div>
				</form>
			</div>
		</section>
	</div>
	<footer class="">
	    <div class="container">
	      <ul class="list-unstyled list-inline text-right">
					<li class="list-inline-item">Contactanos:</li>
					<li class="list-inline-item"><i class="fa fa-home"> Belgrano 803</i>
					</li>
					<li class="list-inline-item"><i class="fa fa-envelope"> wine@wine.com</i>
					</li>
					<li class="list-inline-item"><i class="fa fa-phone-square"> +5491122335577</i>
					</li>
	        <li class="list-inline-item">
						<a class="btn-floating mx-0">
	            <i class="fa fa-facebook-square"></i>
	          </a>
	        </li>
	        <li class="list-inline-item">
	          <a class="btn-floating mx-1">
	            <i class="fa fa-twitter-square"></i>
	          </a>
	        </li>
	        <li class="list-inline-item">
	          <a class="btn-floating mx-1">
	            <i class="fa fa-instagram"></i>
	          </a>
	        </li>
	      </ul>
	    <div class="footer-copyright text-center py-3">© 2019 Copyright:
	      <a href="https://dmartinez231.github.io/Trabajo-grupal/wine/">Wine.com</a>
	    </div>
		</div>
	  </footer>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
