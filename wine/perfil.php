<?php
include_once "autoload.php";

//PREGUNTA SI EXISTE UNA SESION INICIADA
if (!isset($_SESSION["email"])) {
  //SI NO EXISTE LO ENVIA A LOGIN
  redirect("login.php");
} else{
    //SI ESISTE UNA SESION INICIADA TRAE LOS DATOS DEL OBJETO USUARIO
    $usuario = Auth::traerUsuario($_SESSION["email"]);
}
if($_POST){
  //VALIDA LOS DATOS DE PERFIL ENVIADOS POR POST
  $errores = Wine::validarPerfil($_POST);
  // VA SETEANDO LOS DATOS EN EL OBJETO USUARIO
  Wine::setearNuevosDatosPerfil($errores,$usuario); 
  //SI NO EXISTEN ERRORES EMPIEZA A GUARDAR EL USUARIO
  if(empty($errores)){
    //GUARDA LOS DATOS MODIFICADOS EN LA DB
    $mysql->modificarUsuario($usuario);
    //SE DESTRUYE LA SESSION PARA QUE VUELVA INICIAR CON LOS NUEVOS DATOS
    session_destroy();
    //SE REDIGIGE A LOGIN
    redirect("login.php");
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
                    <input class="form-control" id="nombre" type="text" name="name" value="<?=$usuario->getNombre()?>">
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
                    <input class="form-control" id="apellido" type="text" name="last_name" value="<?=$usuario->getApellido()?>">
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
                    <input class="form-control" type="date" name="birthday" value="<?=$usuario->getNacimiento()?>" readonly="readonly">
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
                      <select class="form-control" id="pais" class="" name="country" disabled>
  											<?php foreach ($paisesRegistro as $value => $pais): ?>
                          <?php if ($usuario->getPais() == $value): ?>
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
                    <input class="form-control" id="mail" type="email" name="email" value="<?=$usuario->getEmail();?>" readonly="readonly">
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
                    <label class="form-check-label" for="pass">Nueva Contraseña:</label >
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
                    <input class="form-check-input" id="" type="radio" name="sale" value="si" <?php if ($usuario->getOfertas() == 1) : echo "checked"?> <?php endif;?>><label class="form-check-label"> Sí</label>
                    <?php if (isset($errores["ofertas"])): ?>
                      <div class="input-group mb-3">
                        <p class="small text-danger"><?= $errores["ofertas"]?> </p>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <input  class="form-check-input" id="" type="radio" name="sale" value="no" <?php if ($usuario->getOfertas() == 0) : echo "checked"?> <?php endif;?>><label class="form-check-label"> No</label>
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
