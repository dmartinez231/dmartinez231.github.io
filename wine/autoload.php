<?php 
include_once "helpers.php";
include_once "datos.php";
include_once "clases/db.php";
include_once "clases/functions.php";
include_once "clases/mysql.php";
include_once "clases/usuario.php";
include_once "clases/wine.php";
include_once "clases/auth.php";

$mysql = new Mysql;
Auth::iniciarSesion();
$errores = [];
 ?>