<?php
include_once "db.php";
include_once "usuario.php";

class Mysql extends Db{

  protected $conection;

  public function __construct(){

    $dns = "mysql:host=localhost;dbname=WINE;port=3306";
    $user = "root";
    $pass = "root";
    $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
    $this->conection = new PDO($dns,$user,$pass,$opt);
    } catch (\Exception $e) {
      echo $e -> getMessage();
    }
  }

  public function guardarUsuario($usuario){
    if ($usuario->getOfertas() == "si") {
      $usuario->setOfertas(1);
    }else{
      $usuario->setOfertas(0);
    }
    $query = $this->conection->prepare("INSERT INTO user (name,last_name,birthday,country,email,password,sale) VALUES (:name,:last_name,:birthday,:country,:email,:password,:sale)");
    $query->bindValue(":name", $usuario->getNombre());
    $query->bindValue(":last_name", $usuario->getApellido());
    $query->bindValue(":birthday", $usuario->getNacimiento());
    $query->bindValue(":country", $usuario->getPais());
    $query->bindValue(":email", $usuario->getEmail());
    $query->bindValue(":password", $usuario->getPassword());
    $query->bindValue(":sale", $usuario->getOfertas());
    $query->execute();
  }
  public function modificarUsuario($usuario){

    $query = $this->conection->prepare("UPDATE user SET name = :name, last_name =:last_name, password = :password, sale = :sale WHERE id = :id ");
    $query->bindValue(":name",$usuario->getNombre());
    $query->bindValue(":last_name",$usuario->getApellido());
    $query->bindValue(":password",password_hash($usuario->getPassword(), PASSWORD_DEFAULT));
    $query->bindValue(":sale",$usuario->getOfertas());
    $query->bindValue(":id",$usuario->getId());
    $query->execute();
  }

  public function buscarEmail($email){
    $query = $this->conection->prepare("SELECT * from user WHERE email = :email");
    $query->bindValue(":email", $email);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    if($usuario == false){
        return null;
    }
    return $usuario = new Usuario($usuario);
  }

  public function existeElUsuario($email){
    return $this->buscarEmail($email) !== NULL;
  }
}

 ?>
