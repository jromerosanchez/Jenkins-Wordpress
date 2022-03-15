<?php

  
class Vendedor {

  // ********************************************
  // ESTADO!!!
  // ********************************************
  // Properties

  private $nombre;   
  private $dni;
  private $direccion;  
  private $email;     
  private $telefono;  
  
  // ********************************************
  // COMPORTAMIENTO!!!
  // ********************************************
  // Methods
  // Constructor
  function __construct($nNombre, $nDni, $nDireccion, $nEmail, $nTelefono) {
  
    $this->nombre = $nNombre;
    $this->dni = $nDni;
    $this->direccion = $nDireccion;
    $this->email = $nEmail;
    $this->telefono = $nTelefono; 
    
  }


  
  //Getters

  function getNombre() {
    return $this->nombre;
  }

  function getdDni() {
    return $this->dni;
  }
  
  function getDireccion() {
    return $this->direccion;
  }

  function getEmail() {
    return $this->email;
  }
  
  function getTelefono() {
    return $this->telefono;
  }

  function imprimeVendedores() {
    return "<p>$this->nombre,$this->dni,$this->direccion,$this->email,$this->telefono</p>";
  }


  
  function getInsertVendedoresSQL() {
    $sql = "INSERT INTO vendedores (nombre,dni,direccion,email,telefono) VALUES ('$this->nombre','$this->dni','$this->direccion','$this->email', '$this->telefono') ";

    return $sql;
}
}
?>
