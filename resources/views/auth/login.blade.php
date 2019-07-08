@extends('master')

@section('title')
  <title>Iniciar Sesion</title>
@endsection

@section('section')
  <div class="container">
      <div class="center">

        <form action="{{ route('login') }}" method="post" class="border p-3 form">
          @csrf
        <h1 class="login">Login</h1>
        <hr>
        <div class="form-group text-center">
          <a class="create" href="{{route('register')}}">Crear una Cuenta</a>
        </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <div class="contenedor-input">
                <input class="form-control" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>
              </div>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
              </div>
              <div class="contenedor-input">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">
              </div>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="recordarme" id="remember" {{ old('recordarme') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="form-group col-md-6">
              @if (Route::has('password.request'))
                  <a class="forgot" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
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
