<?php
include_once "mysql.php";
include_once "functions.php";
$mysql = new Mysql;
class Wine{



  //FUNCION PARA DETECTAR QUE PAGINA ESTA ABIERTA Y DETERMINAR QUE NOMBRE MOSTRAR
  public function nombrePagina(){
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
        case $pagina=="perfil.php":
          echo "<title>Mi Perfil | Wine</title>";
        break;
        case $pagina=="compras.php":
          echo "<title>Compras | Wine</title>";
        break;
        case $pagina=="productos.php":
          echo "<title>Productos | Wine</title>";
        break;
        }
    }

    public static function validar($datos){
    global $mysql;
    $errores=[];
    $trimeados=[];
    foreach ($datos as $posicion => $valor) {
      $trimeados[$posicion]=trim($valor);
    }

    // VALIDACION PARA NOMBRE
    if (!strlen($trimeados["name"])) {
      $errores["nombre"] = "Campo obligatorio";
    } elseif (!Funciones::nombreYApellido($trimeados["name"])) {
      $errores["nombre"] = "El campo contiene carateres invalidos";
    } elseif (!Funciones::determinarNombreYApellido($trimeados["name"])){
      $errores["nombre"] = "El campo puede tener primer y segundo nombre";
    }

    // VALIDACION PARA APELLIDO
    if (!strlen($trimeados["last_name"])) {
      $errores["apellido"] = "Campo obligatorio";
    } elseif (!Funciones::nombreYApellido($trimeados["last_name"])) {
      $errores["apellido"] = "El campo contiene carateres invalidos";
    } elseif (!Funciones::determinarNombreYApellido($trimeados["last_name"])){
      $errores["apellido"] = "El campo debe tener primer y segundo apellido";
    }
    // VALIDACION PARA NACIMIENTO
     $user_agent = $_SERVER['HTTP_USER_AGENT'];
     $navegador = Funciones::getBrowser($user_agent);
    if($navegador == "Safari"){
      $date = explode('-', $trimeados["birthday"]);
      $dateActual = date("Y-m-d");
      $dateCount = explode('-', $dateActual);
    if(strlen($trimeados["birthday"]) == 0){
        $errores["nacimiento"]= "Campo obligatorio";
    }else if(($dateCount[0]-$date[0])<18){
        $errores["nacimiento"]= "Usted es menor de edad";
    }else if((($dateCount[0]-$date[0])==18) && ($dateCount[1] = $date[1]) && ($dateCount[2] < $date[2])){
        $errores["nacimiento"]= "Usted es menor de edad";
    }else if((($dateCount[0]-$date[0])==18) && ($dateCount[1] < $date[1])){
          $errores["nacimiento"]= "Usted es menor de edad";
    }else if(!checkdate($date[1], $date[2], $date[0]) || !count($date) == 3
        || $trimeados["birthday"] > $dateActual){
          $errores["nacimiento"]= "El formato es incorrecto";
    }
    }else{
    if(!strlen($trimeados["birthday"])){
      $errores["nacimiento"] = "Campo obligatorio";
    }elseif (!Funciones::formatoEdad($trimeados["birthday"])) {
      $errores["nacimiento"] = "El formato es incorrecto";
    }elseif (!Funciones::mayorDeEdad($trimeados["birthday"])) {
      $errores["nacimiento"] = "Usted es menor de edad";
    }
    }

    // VALIDACION PARA EMAIL
    if (!strlen($trimeados["email"])) {
      $errores["email"] = "Campo obligatorio";
    }elseif (!filter_var($trimeados["email"] , FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "No tiene un formato correcto";
    }elseif ($mysql->existeElUsuario($trimeados["email"])) {
      $errores["email"] = "El email ya esta registrado";
    }

    //VALIDACION PARA CONTRASEÑAS
    if (!strlen($trimeados["password"])) {
      $errores["pass"] = "Campo obligatorio";
    }elseif (!strlen($trimeados["confirmpass"])) {
      $errores["pass"] = "Verifique la contraseña";
    }elseif (Funciones::contraseñaMezcla($trimeados["password"]) !== 0) {
      $errores["pass"] = "La contraseña debe incluir al menos una mayuscula, una minuscula y un numero";
    }elseif (!Funciones::contraseñaPermitida($trimeados["password"])) {
      $errores["pass"] = "La contraseña debe incluir al menos un numero";
    }

    //VALIDACION PARA OFERTAS
    if (!isset($trimeados["sale"])) {
      $errores["ofertas"] = "Elija una opcion";
    }
    return $errores;
  }

  public static function validarLogin($datos){
    global $mysql;
    $errores=[];
    $trimeados=[];
    foreach ($datos as $posicion => $valor) {
      $trimeados[$posicion]=trim($valor);
    }

    //VALIDACION PARA EMAIL
    if (!strlen($trimeados["email"])) {
      $errores["email"] = "Campo obligatorio";
    }elseif (!filter_var($trimeados["email"] , FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "No tiene un formato correcto";
    }elseif (!$mysql->existeElUsuario($trimeados["email"])) {
      $errores["email"] = "El email no se encuentra registrado";
    }

    //VALIDACION PARA CONTRASEÑA
    $usuario = $mysql->buscarEmail($trimeados["email"]);
    if (!strlen($trimeados["password"])) {
      $errores["pass"] = "Campo obligatorio";
    }elseif($usuario !== null){
      if(!password_verify($trimeados["password"] , $usuario->getPassword())){
       $errores["pass"] = "La contaseña es incorrecta";
      }
    }
    return $errores;
  }

   //FUNCION PARA VALIDAR PERFIL
  public static function validarPerfil($datos){
    $errores=[];
    $trimeados=[];
    foreach ($datos as $posicion => $valor) {
      $trimeados[$posicion]=trim($valor);
    }

    // VALIDACION PARA NOMBRE
    if (!strlen($trimeados["name"])) {
      $errores["nombre"] = "Campo obligatorio";
    } elseif (!Funciones::nombreYApellido($trimeados["name"])) {
      $errores["nombre"] = "El campo contiene carateres invalidos";
    } elseif (!Funciones::determinarNombreYApellido($trimeados["name"])){
      $errores["nombre"] = "El campo puede tener primer y segundo nombre";
    }

    // VALIDACION PARA APELLIDO
    if (!strlen($trimeados["last_name"])) {
      $errores["apellido"] = "Campo obligatorio";
    } elseif (!Funciones::nombreYApellido($trimeados["last_name"])) {
      $errores["apellido"] = "El campo contiene carateres invalidos";
    } elseif (!Funciones::determinarNombreYApellido($trimeados["last_name"])){
      $errores["apellido"] = "El campo debe tener primer y segundo apellido";
    }

    //VALIDACION PARA CONTRASEÑAS
    if (!strlen($trimeados["password"])) {
      $errores["pass"] = "Campo obligatorio";
    }elseif (!strlen($trimeados["confirmpass"])) {
      $errores["pass"] = "Verifique la contraseña";
    }elseif (Funciones::contraseñaMezcla($trimeados["password"]) !== 0) {
      $errores["pass"] = "La contraseña debe incluir al menos una mayuscula, una minuscula y un numero";
    }elseif (!Funciones::contraseñaPermitida($trimeados["password"])) {
      $errores["pass"] = "La contraseña debe incluir al menos un numero";
    }

    //VALIDACION PARA OFERTAS
    if (!isset($trimeados["sale"])) {
      $errores["ofertas"] = "Elija una opcion";
    }
    return $errores;
  }

  public static function setearNuevosDatosPerfil($errores,$usuario){
    if (!isset($errores["nombre"])) {
        $usuario->setNombre(trim($_POST["name"]));
    }
    if (!isset($errores["apellido"])) {
        $usuario->setApellido(trim($_POST["last_name"]));
    }
    if (!isset($errores["mail"])) {
        $usuario->setEmail(trim($_POST["email"]));
    }
    if (!isset($errores["nacimiento"])) {
        $usuario->setNacimiento(trim($_POST["birthday"]));
    }
    if (!isset($errores["pass"])) {
        $usuario->setPassword(trim($_POST["password"]));
    }
    if ($_POST["sale"] == "si") {
      $usuario->setOfertas(1);
    }else {
      $usuario->setOfertas(0);
     } 
  }

}

 ?>
