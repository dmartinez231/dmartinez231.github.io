<?php

//FUNCION PARA INDICAR FALLOS 
function dd($valor){
    echo "<pre>";
        var_dump($valor);
        exit;
    echo "</pre>";
}
//FUNCION PARA PERSISTENCIA DE DATOS
function inputUsuario($campo){
    if(isset($_POST[$campo])){
        return trim($_POST[$campo]);
    }
}
//FUNCION PARA REDIRECCIONAR
function redirect($destino){
    header("location:" . $destino);
    exit;
}

?>