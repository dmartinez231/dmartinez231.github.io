<?php

class Usuario{
  private $id;
  private $nombre;
  private $apellido;
  private $nacimiento;
  private $pais;
  private $email;
  private $password;
  private $ofertas;

  public function __construct($usuario){
    if (isset($usuario["id"])) {
      $this->id = trim($usuario["id"]);
      $this->password = trim($usuario["password"]);
    }
    else{
      $this->id = null;
      $this->password = password_hash($usuario["password"], PASSWORD_DEFAULT);
    }
    $this->nombre = $usuario["name"];
    $this->apellido = $usuario["last_name"];
    $this->nacimiento = $usuario["birthday"];
    $this->pais = $usuario["country"];
    $this->email = $usuario["email"];
    $this->ofertas = $usuario["sale"];

  }

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  return $this;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  return $this;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function setApellido($apellido){
    $this->apellido = $apellido;
  return $this;
  }
  public function getNacimiento(){
    return $this->nacimiento;
  }
  public function setNacimiento($nacimiento){
    $this->nacimiento = $nacimiento;
  return $this;
  }
  public function getPais(){
    return $this->pais;
  }
  public function setPais($pais){
    $this->pais = $pais;
  return $this;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setEmail($email){
    $this->email = $email;
  return $this;
  }
  public function getPassword(){
    return $this->password;
  }
  public function setPassword($password){
    $this->password = $password;
  return $this;
  }
  public function getOfertas(){
    return $this->ofertas;
  }
  public function setOfertas($ofertas){
    $this->ofertas = $ofertas;
  return $this;
  }

}

 ?>
