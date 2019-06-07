<?php 
include_once "mysql.php";

$mysql = new Mysql;
class Auth{
	
	//FUNCION PARA INICIAR SESION
	public static function iniciarSesion(){
        if(!isset($_SESSION)){
            session_start();
        }
	}
	//FUNCION PARA POR SI INTENTAN INGRESAR EN LOGIN Y REGISTRO, YA LOGUEADOS
	public static function sesionIniciada(){
		if (isset($_SESSION["email"])) {
  			header("location: index.php");
  			exit;
		}
	}
	//FUNCION LOGUEAR USUARIO
  	public static function loguearUsuario($email){
    	$_SESSION["email"] = $email;
  	}
  	//FUNCION PARA SETEAR DATOS DE COOKIE
  	public static function setearCookie($email){
  		if (isset($_COOKIE[$email])) {
  			return $_COOKIE["email"];
		}
  	}
  	//GENERAR COOKIE Y ELIMINAR COOKIE
  	Public static function crearCookie($dato){
  		if (isset($_POST[$dato])) {
        setcookie("email",$_POST["email"], time() + 60 * 60 * 24 * 365);
      }else{
        setcookie("email","",-1 );
      }
  	}
  	public static function traerUsuario($dato){
  		global $mysql;
  		if (isset($_SESSION["email"])) {
 	 		return $mysql->buscarEmail($dato);
		}
  	}
}

 ?>