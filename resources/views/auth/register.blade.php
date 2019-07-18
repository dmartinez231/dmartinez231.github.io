@extends('master')

@section('title')
  <title>Registrarse</title>
@endsection


@section('section')
  <div class="registros">
	<section class="container">
		<div class="center">
   	 <form  method="POST" action="{{ route('register') }}" class="border p-3 form">
          @csrf
					<h1 class="login">Registro</h1>
					<div class="form-group text-center">
					<hr>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Nombres:</label>
										<input class="form-control @error('name') is-invalid @enderror"  id="nombre" type="text" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
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
										<label  class="form-check-label" for="nombre">Apellidos:</label>
										<input class="form-control @error('last_name') is-invalid @enderror" id="apellido" type="text" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
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
										<input class="form-control  @error('birthday') is-invalid @enderror" id="edad" type="date" name="birthday" value="{{ old('birthday') }}">
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
										<select class="form-control form-control @error('country') is-invalid @enderror" id="pais" class="" name="country">
                      <option value="nada">Un pais</option>
										  <option value="arg">Argentina</option>
                      <option value="uru">Uruguay</option>
                      <option value="bra">Brasil</option>
                      <option value="chi">Chile</option>
                      <option value="col">Colombia</option>
                      <option value="ven">Venezuela</option>
										</select>
                    @error('email')
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
										<label class="form-check-label" for="email">E-mail:</label>
										<input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" >
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
										<label class="form-check-label" for="pass">Contraseña:</label >
										<input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value=""
                       autocomplete="new-password">
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
										<input class="form-control @error('password') is-invalid @enderror" id="confirmpass" type="password" name="password_confirmation"  autocomplete="new-password" value="">
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
										<input class="form-check-input @error('sale') is-invalid @enderror" id="saleSi" type="radio" name="sale" value="si" ><label class="form-check-label "> Sí</label>
                    @error('sale')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
								</div>
								<div class="form-group col-md-6">
										<input  class="form-check-input @error('sale') is-invalid @enderror" id="saleNo" type="radio" name="sale" value="no" ><label class="form-check-label"> No</label>
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
								<button class="btn btn-primary" type="reset" >limpiar</button>
								<button class="btn btn-primary" type="submit" >crear usuario</button>
							</div>
					   </div>
					</div>
				</form>
			</div>
		</section>
	</div>
@endsection
