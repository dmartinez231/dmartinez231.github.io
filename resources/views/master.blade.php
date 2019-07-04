<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="body-home" class="login" @yield('background')>
	@yield('video')
  <nav @yield('style') class="container-navegador">
    <div id="logo">
      <h2 class="marca"><a href="{{route('home')}}">WINE</a></h2>
    </div>
    <div id="menu">
      <div class="control-menu">
        <a href="#menu" class="open"><span>Menu</span></a>
        <a href="#" class="close"><span>Cerrar</span></a>
      </div>
      <ul class="list-menu">
        <li>
          <a href="{{route('productos')}}">Productos</a>
        </li>
        <li>
          <a href="{{route('compras')}}">Compras</a>
        </li>
        <li>
          <a href="{{route('login')}}">Iniciar Sesion</a>
        </li>
        <li>
          <a href="{{route('register')}}">Registrarse</a>
        </li>
      </ul>
    </div>
  </nav>
  @yield('section')
  <footer @yield('style')>
    <div class="container">
      <ul class="list-unstyled list-inline text-right">
        <li class="list-inline-item">Contactanos:</li>
        <li class="list-inline-item"><i class="fa fa-home"> Belgrano 803</i>
        </li>
        <li class="list-inline-item"><a href="mailto::wine@wine.com"class="fa fa-envelope"> wine@wine.com</a>
        </li>
        <li class="list-inline-item"><a href="https://www.skype.com" class="fa fa-phone-square"> +5491122335577</a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating mx-0">
            <a href="https://www.facebook.com" class="fa fa-facebook-square"></a>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating mx-1">
            <a href="https://www.twitter.com" class="fa fa-twitter-square"></a>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating mx-1">
            <a href="https://www.instagram.com" class="fa fa-instagram"></a>
          </a>
        </li>
      </ul>
      <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="https://github.com/dmartinez231/dmartinez231.github.io.git">Wine.com</a>
      </div>
    </div>
  </footer>
</body>
</html>
