<?php
include_once("autoload.php");

//POR SI QUIEREN ENTRAR DESDE LA URL Y YA ESTAN LOGUEADOS LO MANDA A INDEX
Auth::sesionIniciada();
//CUANDO YA ENVIAMOS LOS DATOS POR POST
if($_POST){
	//WINE VALIDA LOS DATOS ENVIADOS POR POST
  	$errores =  Wine::validar($_POST);
  	//PERSISTENCIA PARA SALE = OFERTAS
  	if (!isset($errores["ofertas"])) {
    	if ($_POST["sale"] == "si") {
      		$si= "checked";
    	}
    else {
      		$no= "checked";
    	}
  	}
  	//SI NO HAY ERRORES 
  	if(empty($errores)){
	    //GENERAMOS UN OBJETO USUARIO
	    $usuario = new Usuario($_POST);
	    //GUARDAMOS EL USUARIO
	    $mysql->guardarUsuario($usuario);
	    //LOGUEAMOS EL USUARIO
	    Auth::loguearUsuario($_POST["email"]);
	    //DIRECCIONAMOS AL USUARIO A INDEX
	   	redirect("index.php");
  	}
}
 ?>

<!DOCTYPE html>
<html>
<?php require_once("head.php"); ?>
<body id="body-home" class="login">
  <?php include_once("menu.php"); ?>
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
										<label  class="form-check-label" for="nombre">Nombre:</label>
										<input class="form-control" id="nombre" type="text" name="name" value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("name");?>">
									</div>
                  <?php if (isset($errores["nombre"])): ?>
                    <p class="small text-danger"><?= $errores["nombre"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
              <div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Apellido:</label>
										<input class="form-control" id="apellido" type="text" name="last_name" value="<?=(isset($errores["apellido"]) )? "" : inputUsuario("last_name");?>">
									</div>
                  <?php if (isset($errores["apellido"])): ?>
                    <p class="small text-danger"><?= $errores["apellido"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
            </div>
            <div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="nacimiento">Fecha de nacimiento:</label>
										<input class="form-control" type="date" name="birthday" value="<?=(isset($errores["nacimiento"]) )? "" : inputUsuario("birthday");?>">
									</div >
                  <?php if (isset($errores["nacimiento"])): ?>
                    <p class="small text-danger"><?= $errores["nacimiento"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						 	    <div class="input-group mb-3">
						 	    	<div class="input-group-prepend">
						 	    		<label class="form-check-label" for="pais">País:</label>
										<select class="form-control" id="pais" class="" name="country">
											<?php foreach ($paisesRegistro as $value => $pais): ?>
                        <?php if ($_POST["country"] == $value): ?>
                            <option  value="<?= $value ?>" selected> <?= $pais ?> </option>
                        <?php else : ?>
                            <option  value="<?= $value ?>"> <?= $pais ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="email">E-mail:</label>
										<input class="form-control" id="email" type="email" name="email" value="<?=(isset($errores["email"]) )? "" : inputUsuario("email");?>" >
									</div>
                  <?php if (isset($errores["email"])): ?>
                    <p class="small text-danger"><?= $errores["email"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="pass">Contraseña:</label >
										<input class="form-control" id="pass" type="password" name="password" value="">
									</div>
                  <?php if (isset($errores["pass"])): ?>
                    <p class="small text-danger"><?= $errores["pass"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="confirmpass">Confirmar contraseña:</label>
										<input class="form-control" id="confirmpass" type="password" name="confirmpass" value="">
									</div>
                  <?php if (isset($errores["pass"])): ?>
                    <p class="small text-danger"><?= $errores["pass"]?> </p>
                  <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
								<label class="form-check-label" for="info">¿Desea recibir nuestras ofertas mensuales?</label>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6">
										<input class="form-check-input" id="" type="radio" name="sale" value="si" <?= $si ?>><label class="form-check-label"> Sí</label>
                    <?php if (isset($errores["ofertas"])): ?>
                      <div class="input-group mb-3">
                        <p class="small text-danger"><?= $errores["ofertas"]?> </p>
                      </div>
                    <?php endif; ?>
								</div>
								<div class="form-group col-md-6">
										<input  class="form-check-input" id="" type="radio" name="sale" value="no" <?= $no ?>><label class="form-check-label"> No</label>
                    <?php if (isset($errores["ofertas"])): ?>
                      <div class="input-group mb-3">
                        <p class="small text-danger"><?= $errores["ofertas"]?> </p>
                      </div>
                    <?php endif; ?>
								</div>

							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
								</div>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary" type="reset" >limpiar</button>
								<button class="btn btn-primary" type="submit" >crear usuario</button>
							</div>
					   </div>
					</div>
				</form>
			</div>
		</section>
	</div>
<?php include_once("footer.php"); ?>
<?php require_once("script.php"); ?>
</body>
</html>
