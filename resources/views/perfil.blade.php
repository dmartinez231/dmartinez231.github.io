@extends('master')

@section('title')
  <title>Perfil</title>
@endsection
@section('section')

  <div class="registros">
  <section class="container">
      <div class="center">
        <form action="{{route ('perfil')}}" class="border p-3 form" method="post">
          {{ csrf_field() }}
          <h1 class="login">Perfil</h1>
          <div class="form-group text-center">
          <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="form-check-label" for="nombre">Nombre:</label>
                    <input class="form-control" id="nombre" type="text" name="name" value="{{Auth::user()->name}}">
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
                    <input class="form-control" id="apellido" type="text" name="last_name" value="{{Auth::user()->last_name}}">
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
                    <input class="form-control" type="date" name="birthday" value="{{Auth::user()->birthday}}" readonly="readonly">
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
                      @if (isset(Auth::user()->country))
                        <select class="form-control" id="pais" class="" name="country">
                          @if (Auth::user()->country == "arg")
                          <option value="arg" selected>Argentina</option>
                        @endif
                        @if (Auth::user()->country == "uru")
                          <option value="uru" selected>Uruguay</option>
                        @endif
                          @if (Auth::user()->country == "bra")
                          <option value="bra" selected>Brasil</option>
                        @endif
                        @if (Auth::user()->country == "chi")
                          <option value="chi" selected>Chile</option>
                        @endif
                        @if (Auth::user()->country == "arg")
                          <option value="arg" selected>Argentina</option>
                        @endif



                          <option value="col">Colombia</option>
                          <option value="ven">Venezuela</option>
                        </select>
                      @else
                      <select class="form-control" id="pais" class="" name="country">
                        <option value="arg">Argentina</option>
                        <option value="uru">Uruguay</option>
                        <option value="bra">Brasil</option>
                        <option value="chi">Chile</option>
                        <option value="col">Colombia</option>
                        <option value="ven">Venezuela</option>
                      </select>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="mail">E-mail:</label>
                    <input class="form-control" id="mail" type="email" name="email" value="{{Auth::user()->email}}" readonly="readonly">
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
                    <input class="form-check-input" id="" type="radio" name="sale" value="si">
                    <label class="form-check-label"> Sí</label>
                    <?php if (isset($errores["ofertas"])): ?>
                      <div class="input-group mb-3">
                        <p class="small text-danger"><?= $errores["ofertas"]?> </p>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <input  class="form-check-input" id="" type="radio" name="sale" value="no">
                    <label class="form-check-label"> No</label>
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
@endsection
