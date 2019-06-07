<?php
include_once("autoload.php");

//POR SI QUIEREN ENTRAR DESDE LA URL Y YA ESTAN LOGUEADOS LO MANDA A INDEX
Auth::sesionIniciada();
// CARGA LA COOKIE EMAIL SI SE TILDO EN RECORDARME
$email = Auth::setearCookie("email");
//CUANDO YA ENVIAMOS LOS DATOS POR POST
if ($_POST) {
	//WINE VALIDA LOS DATOS ENVIADOS POR POST
  	$errores = Wine::validarLogin($_POST);
  	//SI NO HAY ERRORES 
    if (empty($errores)) {
    	//LOGUEAMOS EL USUARIO
      	Auth::loguearUsuario($_POST["email"]);
      	//CREAMOS LA COOKIE SI SE TILDO EN RECORDAME
      	Auth::crearCookie("recordarme");
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
	<div class="container">
  		<div class="center">
		    <form action="login.php" method="POST" class="border p-3 form">
				<h1 class="login">Login</h1>
				<hr>
        <?php if (isset($errores["email"])): ?>
          <div class="form-group text-center">
  					<a style="color: #B31C17 ; border: 1px solid #B31C17; padding: 10px ; background-color: black; border-radius: 5px" href="registro.php">Crear una Cuenta</a>
  				</div>
        <?php else : ?>
				<div class="form-group text-center">
					<a class="create" href="registro.php">Crear una Cuenta</a>
				</div>
      <?php endif; ?>
		      <div class="form-group">
					  <div class="input-group mb-3">
						  <div class="input-group-prepend">
							  <span class="input-group-text"><i class="fa fa-user"></i></span>
						  </div>
              <div class="contenedor-input">
                <input class="form-control" type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
              </div>
              <?php if (isset($errores["email"])): ?>
                <p class="small text-danger text-center"  id="errorLogin" ><?= $errores["email"]?> </p>
                <?php endif; ?>
					  </div>
				  </div>
		    	<div class="form-group">
					  <div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-key"></i></span>
						  </div>
              <div class="contenedor-input">
						  <input type="password" name="password" class="form-control" placeholder="Contraseña">
              </div>
              <?php if (isset($errores["pass"])): ?>
                <p class="small text-danger text-center" id="errorLogin"><?= $errores["pass"]?> </p>
              <?php endif; ?>
            </div>
          </div>
				<div class="form-row">
		    		<div class="form-group col-md-6">
						<div class="form-check">
              <?php if (isset($_COOKIE["email"])): ?>
                <input class="form-check-input" type="checkbox" value="si" id="defaultCheck1" name="recordarme" checked>
                <label class="form-check-label" for="defaultCheck1">Recordar mis datos</label>
              <?php else: ?>
							  <input class="form-check-input" type="checkbox" value="si" id="defaultCheck1" name="recordarme">
							  <label class="form-check-label" for="defaultCheck1">Recordar mis datos</label>
            <?php endif; ?>
			    		</div>
		  			</div>
			    	<div class="form-group col-md-6">
							<a href="#" class="forgot">Recuperar contraseña</a>
					</div>
			    </div>
			    <div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
					</div>
				</div>
				<div class="form-group text-center">
			      	<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
		    </form>
		</div>
	</div>
  <?php include_once("footer.php"); ?>
  <?php require_once("script.php"); ?>
</body>
</html>
