<?php
//SESSION INICIADA EN FUNCIONES INCLUIDAS EN TODAS LAS PAGINAS
session_start();

//FUNCION PARA INDICAR EL NAVEGADOR QUE SE ESTA USANDO
function getBrowser($user_agent){

    if(strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'No hemos podido detectar su navegador';

}

//FUNCION PARA DETECTAR QUE PAGINA ESTA ABIERTA Y DETERMINAR QUE NOMBRE MOSTRAR
function nombrePagina(){
  $pagina=basename($_SERVER["PHP_SELF"]);
      switch ($pagina) {
      case $pagina=="index.php":
        echo "<title>Bienvenido a Wine</title>";
        break;
      case $pagina=="login.php":
        echo "<title>Login | Wine</title>";
        break;
      case $pagina=="registro.php":
        echo "<title>Registro | Wine</title>";
      break;
      }
}
//FUNCION PARA DETERMINAR QUE TENGA NOMBRE Y APELLIDO
function determinarNombreYApellido($nombre){
  //CUENTO CUANTAS PALABRAS INGRESAN
  $palabras = str_word_count($nombre);
  if ($palabras <= 2) {
    return true;
  }
  return false;
}

// FUNCION PARA CARACTERES PERMITIDOS EN NOMBRE Y APELLIDO
function nombreYApellido($nombre){
  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ áéíóúÁÉÍÓÚñÑ'";
   for ($i=0; $i<strlen($nombre); $i++){
      if (strpos($permitidos, substr($nombre,$i,1)) === false){
         return false;
      }
   }
   return true;
  }

//FUNCION PARA DETERMINAR CONTRASEÑA
function contraseñaPermitida($contraseña){
  $contadorNum= 0;
  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑ'_,.0123456789";
   for ($i=0; $i<strlen($contraseña); $i++){
      if (strpos($permitidos, substr($contraseña,$i,1)) === false){
        return false;
      }
      if (is_numeric(substr($contraseña,$i,1))) {
        $contadorNum= $contadorNum + 1;
      }
   }
   if ($contadorNum == 0) {
     return false;
   }
   return true;
  }

//FUNCION PARA DETERMINAR MAYUSCULA, MINUSCULA O MEZCLA
function contraseñaMezcla($contraseña){
  if (is_numeric($contraseña)){
    return 2;
  }
  if ($contraseña === strtoupper($contraseña)) {
    return 1;
  }
  if ($contraseña === strtolower($contraseña)) {
    return -1;
  }
  return 0;
}

// FUNCION COMPRUEBA SI VIENE EN FORMATO INCORRECTO LA FECHA DE NACIMIENTO
function formatoEdad($nacimiento){
  list($año,$mes,$dia) = explode("-",$nacimiento);
  //PREGUNTA SI ESTA VACIO Y SI ES NUMERICO
  if (empty($año) || empty($mes) || empty($dia) && !is_numeric($año) || !is_numeric($mes) || !is_numeric($dia)) {
    return false;
  }
  return true;
}

//OBTENER FECHA
$añoActual = date("Y");
$mesActual = date("m");
$diaActual = date("d");

//FUNCION PARA VERIFICAR SI ES MAYOR DE EDAD
function mayorDeEdad($nacimiento){
  //LLAMO LAS VARIABLES GLOBALES AÑO, MES Y DIA CREADAS
  global $añoActual; global $mesActual; global $diaActual;
  //SEPARO FECHA DE NACIMIENTO EN AÑO, MES Y DIA PARA DESPUES COMPARAR CON LA FECHA ACTUAL
  list($año,$mes,$dia) = explode("-",$nacimiento);
  if (($añoActual - $año) < 18){
    return false;
  }
  if (($añoActual - $año) == 18) {
    if ($mesActual < $mes) {
    return  false;
    }
    if ($mesActual == $mes){
      if($diaActual < $dia){
        return  false;
      }
    }
  }
  return true;
}

//VALIDACION DE USUARIO
function validar($datos){
  $errores=[];
  $trimeados=[];
  foreach ($datos as $posicion => $valor) {
    $trimeados[$posicion]=trim($valor);
  }

  // VALIDACION PARA NOMBRE
  if (!strlen($trimeados["nombre"])) {
    $errores["nombre"] = "Campo obligatorio";
  } elseif (!nombreYApellido($trimeados["nombre"])) {
    $errores["nombre"] = "El campo contiene carateres invalidos";
  } elseif (!determinarNombreYApellido($trimeados["nombre"])){
    $errores["nombre"] = "El campo puede tener primer y segundo nombre";
  }

  // VALIDACION PARA APELLIDO
  if (!strlen($trimeados["apellido"])) {
    $errores["apellido"] = "Campo obligatorio";
  } elseif (!nombreYApellido($trimeados["apellido"])) {
    $errores["apellido"] = "El campo contiene carateres invalidos";
  } elseif (!determinarNombreYApellido($trimeados["apellido"])){
    $errores["apellido"] = "El campo debe tener primer y segundo apellido";
  }
   // VALIDACION PARA NACIMIENTO
   $user_agent = $_SERVER['HTTP_USER_AGENT'];
   $navegador = getBrowser($user_agent);
  if($navegador == "Safari"){
    $date = explode('-', $trimeados["nacimiento"]);
    $dateActual = date("Y-m-d");
    $dateCount = explode('-', $dateActual);
  if(strlen($trimeados["nacimiento"]) == 0){
      $errores["nacimiento"]= "Campo obligatorio";
  }else if(($dateCount[0]-$date[0])<18){
      $errores["nacimiento"]= "Usted es menor de edad";
  }else if((($dateCount[0]-$date[0])==18) && ($dateCount[1] = $date[1]) && ($dateCount[2] < $date[2])){
      $errores["nacimiento"]= "Usted es menor de edad";
  }else if((($dateCount[0]-$date[0])==18) && ($dateCount[1] < $date[1])){
        $errores["nacimiento"]= "Usted es menor de edad";
  }else if(!checkdate($date[1], $date[2], $date[0]) || !count($date) == 3
      || $trimeados["nacimiento"] > $dateActual){
        $errores["nacimiento"]= "El formato es incorrecto";
  }
  }else{
  if(!strlen($trimeados["nacimiento"])){
    $errores["nacimiento"] = "Campo obligatorio";
  }elseif (!formatoEdad($trimeados["nacimiento"])) {
    $errores["nacimiento"] = "El formato es incorrecto";
  }elseif (!mayorDeEdad($trimeados["nacimiento"])) {
    $errores["nacimiento"] = "Usted es menor de edad";
  }
}

  // VALIDACION PARA EMAIL
  if (!strlen($trimeados["mail"])) {
    $errores["mail"] = "Campo obligatorio";
  }elseif (!filter_var($trimeados["mail"] , FILTER_VALIDATE_EMAIL)) {
    $errores["mail"] = "No tiene un formato correcto";
  }elseif (validarEmail($trimeados["mail"])) {
    $errores["mail"] = "EL email ya esta registrado";
  }

  //VALIDACION PARA CONTRASEÑAS
  if (!strlen($trimeados["pass"])) {
    $errores["pass"] = "Campo obligatorio";
  }elseif (!strlen($trimeados["confirmpass"])) {
    $errores["pass"] = "Verifique la contraseña";
  }elseif (contraseñaMezcla($trimeados["pass"]) !== 0) {
    $errores["pass"] = "La contraseña debe incluir al menos una mayuscula, una minuscula y un numero";
  }elseif (!contraseñaPermitida($trimeados["pass"])) {
    $errores["pass"] = "La contraseña debe incluir al menos un numero";
  }

  //VALIDACION PARA OFERTAS
  if (!isset($trimeados["ofertas"])) {
    $errores["ofertas"] = "Elija una opcion";
  }
  return $errores;
}

//FUNCION PARA GENERAR UN ID
function generarID(){
  if (!file_exists("db.json")) {
    $valor = 0;
    return $valor;
  }
  $json = file_get_contents("db.json");
  $db = json_decode($json, true);
  //VOY AL ULTIMO USUARIO
  $ultimoUsuario = end($db["usuarios"]);
  //ENTRO EN LA PRIMERA POSICION DEL ULTIMO USUARIO
  $id = reset($ultimoUsuario);
  return $id + 1;
}
// DEFINO REGISTRO PARA USUARIO
function usuario(){
  $usuario = [
    "id" => generarID(),
    "nombre" => trim($_POST["nombre"]),
    "apellido" => trim($_POST["apellido"]),
    "nacimiento" => trim($_POST["nacimiento"]),
    "pais" => trim($_POST["pais"]),
    "email" => trim($_POST["mail"]),
    "password" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
    "ofertas" => trim($_POST["ofertas"])
  ];
  return $usuario;
}

// FUNCION PARA VALIDAR EL EMAIL
function validarEmail($email){
  if (!file_exists("db.json")) {
    return false;
  }
  $json = file_get_contents("db.json");
  $db = json_decode($json, true);
  foreach ($db["usuarios"] as $usuario) {
    if ($usuario["email"] == $email) {
      return $usuario;
    }
  }
  return false;
}

//GUARDAR USUARIO
function guardarUsuario($usuario){
  if (!file_exists("db.json")) {
   file_put_contents("db.json","usuarios");
  }
  $json = file_get_contents("db.json");
  $db = json_decode($json, true);
  $db["usuarios"][] = $usuario;
  $usuarios =  json_encode($db, JSON_PRETTY_PRINT);
  file_put_contents("db.json", $usuarios);
}

//VALIDACION PARA LOGIN
function validarLogin($datos){
  $errores=[];
  $trimeados=[];
  foreach ($datos as $posicion => $valor) {
    $trimeados[$posicion]=trim($valor);
  }

  //VALIDACION PARA EMAIL
  if (!strlen($trimeados["mail"])) {
    $errores["mail"] = "Campo obligatorio";
  }elseif (!filter_var($trimeados["mail"] , FILTER_VALIDATE_EMAIL)) {
    $errores["mail"] = "No tiene un formato correcto";
  }elseif (!validarEmail($trimeados["mail"])) {
    $errores["mail"] = "El email no se encuentra registrado";
  }

  //VALIDACION PARA CONTRASEÑA
  $usuario = validarEmail($trimeados["mail"]);
  if (!strlen($trimeados["pass"])) {
    $errores["pass"] = "Campo obligatorio";
  }elseif(!password_verify($trimeados["pass"], $usuario["password"])) {
    $errores["pass"] = "La contaseña es incorrecta";
  }
  return $errores;
  }

  function loguearUsuario($email){
    $_SESSION["email"] = $email;
  }

  function modificarUsuario($datos){
    $json = file_get_contents("db.json");
    $db = json_decode($json, true);
    foreach ($db["usuarios"] as $usuario) {
      if ($usuario["id"] == $datos["id"]) {
        $usuario = [
          "id" => $datos["id"],
          "nombre" => trim($_POST["nombre"]),
          "apellido" => trim($_POST["apellido"]),
          "nacimiento" => trim($_POST["nacimiento"]),
          "pais" => trim($_POST["pais"]),
          "email" => trim($_POST["mail"]),
          "password" => password_hash($_POST["pass"], PASSWORD_DEFAULT),
          "ofertas" => trim($_POST["ofertas"]),
        ];
        $db["usuarios"][$datos["id"]]= $usuario;
        $usuarios =  json_encode($db, JSON_PRETTY_PRINT);
        file_put_contents("db.json", $usuarios);
      }
    }
  }
  function validarPerfil($datos){
    $errores=[];
    $trimeados=[];
    foreach ($datos as $posicion => $valor) {
      $trimeados[$posicion]=trim($valor);
    }

    // VALIDACION PARA NOMBRE
    if (!strlen($trimeados["nombre"])) {
      $errores["nombre"] = "Campo obligatorio";
    } elseif (!nombreYApellido($trimeados["nombre"])) {
      $errores["nombre"] = "El campo contiene carateres invalidos";
    } elseif (!determinarNombreYApellido($trimeados["nombre"])){
      $errores["nombre"] = "El campo puede tener primer y segundo nombre";
    }

    // VALIDACION PARA APELLIDO
    if (!strlen($trimeados["apellido"])) {
      $errores["apellido"] = "Campo obligatorio";
    } elseif (!nombreYApellido($trimeados["apellido"])) {
      $errores["apellido"] = "El campo contiene carateres invalidos";
    } elseif (!determinarNombreYApellido($trimeados["apellido"])){
      $errores["apellido"] = "El campo debe tener primer y segundo apellido";
    }

    //VALIDACION PARA CONTRASEÑAS
    if (!strlen($trimeados["pass"])) {
      $errores["pass"] = "Campo obligatorio";
    }elseif (!strlen($trimeados["confirmpass"])) {
      $errores["pass"] = "Verifique la contraseña";
    }elseif (contraseñaMezcla($trimeados["pass"]) !== 0) {
      $errores["pass"] = "La contraseña debe incluir al menos una mayuscula, una minuscula y un numero";
    }elseif (!contraseñaPermitida($trimeados["pass"])) {
      $errores["pass"] = "La contraseña debe incluir al menos un numero";
    }

    //VALIDACION PARA OFERTAS
    if (!isset($trimeados["ofertas"])) {
      $errores["ofertas"] = "Elija una opcion";
    }
    return $errores;
  }





?>
