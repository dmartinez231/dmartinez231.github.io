<?php
include_once "funciones.php";
include_once "datos.php";

if (isset($_SESSION["email"])) {
  $usuario = validarEmail($_SESSION["email"]);
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
