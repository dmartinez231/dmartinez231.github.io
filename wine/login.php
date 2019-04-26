<?php
include_once("funciones.php");
include_once("datos.php");
//POR SI QUIEREN ENTRAR DESDE LA URL Y YA ESTAN LOGUEADOS LO MANDA A INDEX
if (isset($_SESSION["email"])) {
  header("location: index.php");
  exit;
}
$email="";
if (isset($_COOKIE["email"])) {
  $email = $_COOKIE["email"];
}

$errores= [];
if ($_POST) {
  $errores = validarLogin($_POST);
    if (empty($errores)) {
      loguearUsuario($_POST["mail"]);
      if (isset($_POST["recordarme"])) {
        setcookie("email",$_POST["mail"], time() + 60 * 60 * 24 * 365);
      }else{
        setcookie("email","",-1 );
      }
      header("location: index.php");
      exit;
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
        <?php if (isset($errores["mail"])): ?>
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
                <input class="form-control" type="email" name="mail" value="<?= $email ?>" placeholder="E-mail">
              </div>
              <?php if (isset($errores["mail"])): ?>
                <p class="small text-danger text-center"  id="errorLogin" ><?= $errores["mail"]?> </p>
                <?php endif; ?>
					  </div>
				  </div>
		    	<div class="form-group">
					  <div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-key"></i></span>
						  </div>
              <div class="contenedor-input">
						  <input type="password" name="pass" class="form-control" placeholder="Contraseña">
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
