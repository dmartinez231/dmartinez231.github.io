<?php

class Funciones{

  //FUNCION PARA INDICAR EL NAVEGADOR QUE SE ESTA USANDO
public static function getBrowser($user_agent){

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

  //FUNCION PARA DETERMINAR QUE TENGA NOMBRE Y APELLIDO
  public static function determinarNombreYApellido($nombre){
    //CUENTO CUANTAS PALABRAS INGRESAN
    $palabras = str_word_count($nombre);
    if ($palabras <= 2) {
      return true;
    }
    return false;
  }
  // FUNCION PARA CARACTERES PERMITIDOS EN NOMBRE Y APELLIDO
  public static function nombreYApellido($nombre){
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ áéíóúÁÉÍÓÚñÑ'";
     for ($i=0; $i<strlen($nombre); $i++){
        if (strpos($permitidos, substr($nombre,$i,1)) === false){
           return false;
        }
     }
     return true;
  }
  //FUNCION PARA DETERMINAR CONTRASEÑA
  public static function contraseñaPermitida($contraseña){
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
  public static function contraseñaMezcla($contraseña){
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
  public static function formatoEdad($nacimiento){
    list($año,$mes,$dia) = explode("-",$nacimiento);
    //PREGUNTA SI ESTA VACIO Y SI ES NUMERICO
    if (empty($año) || empty($mes) || empty($dia) && !is_numeric($año) || !is_numeric($mes) || !is_numeric($dia)) {
      return false;
    }
    return true;
  }

  //FUNCION PARA VERIFICAR SI ES MAYOR DE EDAD
  public static function mayorDeEdad($nacimiento){
    //OBTENER FECHA
    $añoActual = date("Y");
    $mesActual = date("m");
    $diaActual = date("d");
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
}
 ?>
