<?php

function validar ($datos){
  $errores = [];
  $trimeados = [];

  foreach ($datos as $key => $valor){
    $trimeados [$key] = trim ($valor);
  }
  if (empty ($trimeados ["nombre"])){
    $errores ["nombre"] = "el campo no puede estar vacío";
  } else if (!strpos ($trimeados["nombre"], " ") ){
    $errores ["nombre"] = "el campo debe tener nombre y apellido";
  // else if ($trimeados ["nombre"] )//SI CONTIENE SOLO CARACTERES ALFABÉTICOS)
  } else {
    $nombreOk = $trimeados ["nombre"];
    return $nombreOk;
  }

  return $errores;

}
