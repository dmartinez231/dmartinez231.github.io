@extends('master')

@section('title')
  <title>Iniciar Sesion</title>
@endsection

@section('section')
  <div class="container">
      <div class="center">
        <form action="login.php" method="POST" class="border p-3 form">
        <h1 class="login">Login</h1>
        <hr>
        <div class="form-group text-center">
          <a class="create" href="registro.php">Crear una Cuenta</a>
        </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <div class="contenedor-input">
                <input class="form-control" type="email" name="email" value="" placeholder="E-mail">
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
@endsection
