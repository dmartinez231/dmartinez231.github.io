@extends('master')

@section('title')
  <title>Perfil</title>
@endsection
@section('script')
  <script scr="/js/validar.js"></script>
@endsection
@section('section')

  <div class="registros">
  <section class="container">
      <div class="center">
        <form action="{{route('actualizarPerfil',$user->id)}}" class="border p-3 form" method="post">
          @if (session()->has('msj'))
            <div class="alert alert-success" role="alert">
              {{session('msj')}}
            </div>
          @endif
          {{ csrf_field() }}
          <h1 class="login">Perfil</h1>
          <div class="form-group text-center">
          <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="form-check-label" for="nombre">Nombre:</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="nombre" type="text" name="name" value="{{$user->name}}">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label  class="form-check-label" for="nombre">Apellido:</label>
                    <input class="form-control @error('last_name') is-invalid @enderror" id="apellido" type="text" name="last_name" value="{{$user->last_name}}">
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="nacimiento">Fecha de nacimiento:</label>
                    <input class="form-control  @error('birthday') is-invalid @enderror" type="date" name="birthday" value="{{$user->birthday}}" readonly="readonly">
                      @error('birthday')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div >
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="form-check-label" for="pais">País:</label>
                      @if (isset($user->country))
                        <select class="form-control" id="pais" class="" name="country" disabled>
                          @if ($user->country == "arg")
                          <option value="arg" selected>Argentina</option>
                        @endif
                        @if ($user->country == "uru")
                          <option value="uru" selected>Uruguay</option>
                        @endif
                          @if ($user->country == "bra")
                          <option value="bra" selected>Brasil</option>
                        @endif
                        @if ($user->country == "chi")
                          <option value="chi" selected>Chile</option>
                        @endif
                        @if ($user->country == "col")
                          <option value="col" selected>Colombia</option>
                        @endif
                        @if ($user->country == "ven")
                          <option value="ven" selected>Venezuela</option>
                        @endif
                      </select>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="mail">E-mail:</label>
                    <input class="form-control  @error('email') is-invalid @enderror" id="mail" type="email" name="email" value="{{$user->email}}" readonly="readonly">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="pass">Nueva Contraseña:</label >
                    <input class="form-control @error('password') is-invalid @enderror" id="pass" type="password" name="password" value="">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="form-check-label" for="confirmpass">Confirmar contraseña:</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="confirmpass" type="password" name="password_confirmation" value="">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group text-center">
                <label class="form-check-label" for="info">¿Desea recibir nuestras ofertas mensuales?</label>
              <br>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-check-input" id="" type="radio" name="sale" value="si" @if ($user->sale == "si") checked @endif>
                    <label class="form-check-label"> Sí</label>
                    @error('sale')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input  class="form-check-input" id="" type="radio" name="sale" value="no" @if ($user->sale == "no") checked @endif>
                    <label class="form-check-label"> No</label>
                    @error('sale')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
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
