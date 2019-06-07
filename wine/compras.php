<?php
include_once "autoload.php";

//PREGUNTA SI EXISTE UNA SESION INICIADA
if (isset($_SESSION["email"])){
	//SI EXISTE TRAE LOS DATOS DEL OBEJO USUARIO
	$usuario = Auth::traerUsuario($_SESSION["email"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include_once "head.php"; ?>
  <body>
  <?php include_once "menu.php" ?>
    <img style="width: 500px" src="img/enconstruccion.jpg" alt="">
  <?php include_once "script.php" ?>
  </body>
</html>
