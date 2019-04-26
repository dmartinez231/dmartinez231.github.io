<?php
include_once "funciones.php";
include_once "datos.php";

if (!isset($_SESSION["email"])) {
  header("location: login.php");
  exit;
} else{
  $usuario = validarEmail($_SESSION["email"]);
    $id = $usuario["id"];
    $nombreOK = $usuario["nombre"];
    $apellidoOK = $usuario["apellido"];
    $nacimientoOK = $usuario["nacimiento"];
    $paisOK = $usuario ["pais"];
    $mailOK = $usuario["email"];
    $si = "";
    $no = "";
    if ($usuario["ofertas"] == "si"){
      $si = "checked";
    } else{
      $no = "checked";
    }
}
$errores = [];
if($_POST){
  $errores = validarPerfil($_POST);
  if (!isset($errores["nombre"])) {
      $nombreOK = trim($_POST["nombre"]);
  }
  if (!isset($errores["apellido"])) {
      $apellidoOK = trim($_POST["apellido"]);
  }
  if (!isset($errores["mail"])) {
      $mailOK = trim($_POST["mail"]);
  }
  if (!isset($errores["nacimiento"])) {
      $nacimientoOK = trim($_POST["nacimiento"]);
  }
  if (!isset($errores["ofertas"])) {
    if ($_POST["ofertas"] == "si") {
      $si= "checked";
    }
    else {
      $no= "checked";
    }
  }
  if(empty($errores)){
    $_POST["pais"]= $paisOK;
    $_POST["id"]= $id;
    modificarUsuario($_POST);
    // BORRO LOS DATOS ALMACENADOS EN PERSISTENCIA.
    unset($_POST); unset($nombreOK); unset($apellidoOK); unset($mailOK); unset($nacimientoOK); unset($si); unset($no);
    session_destroy();
    header("location: login.php");
    exit;
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include_once "head.php"; ?>
  <body id="body-home" class="login">
  <?php include_once "menu.php" ?>

  <div class="registros">
  <section class="container">
      <div class="center">
        <form action="perfil.php" class="border p-3 form" method="post">
          <h1 class="login">Perfil</h1>
          <div class="form-group text-center">
          <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="form-check-label" for="nombre">Nombre:</label>
                    <input class="form-control" id="nombre" type="text" name="nombre" value="<?= $nombreOK ?>">
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
                    <input class="form-control" id="apellido" type="text" name="apellido" value="<?= $apellidoOK ?>">
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
                    <input class="form-control" type="date" name="nacimiento" value="<?= $nacimientoOK ?>" readonly="readonly">
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
                      <select class="form-control" id="pais" class="" name="pais" disabled>
                       	<?php foreach ($paisesRegistro as $value => $pais): ?>
                          <?php if ($paisOK == $value): ?>
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
                    <label class="form-check-label" for="mail">E-mail:</label>
                    <input class="form-control" id="mail" type="email" name="mail" value="<?= $mailOK?>" readonly="readonly">
                  </div>
                  <?php if (isset($errores["mail"])): ?>
                    <p class="small text-danger"><?= $errores["mail"]?> </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="pass">Contraseña:</label >
                    <input class="form-control" id="pass" type="password" name="pass" value="">
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
                    <input class="form-check-input" id="" type="radio" name="ofertas" value="si" <?= $si ?>><label class="form-check-label"> Sí</label>
                    <?php if (isset($errores["ofertas"])): ?>
                      <div class="input-group mb-3">
                        <p class="small text-danger"><?= $errores["ofertas"]?> </p>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <input  class="form-check-input" id="" type="radio" name="ofertas" value="no" <?= $no ?>><label class="form-check-label"> No</label>
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
                <button class="btn btn-primary" type="submit" >modificar</button>
              </div>
             </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <?php include_once "footer.php" ?>
  <?php include_once "script.php" ?>
  </body>
</html>
