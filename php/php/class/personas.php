<?php

class Personas extends Model
{
    protected $nombre;
    protected $apellido;
    protected $edad;
    protected $genero;
    protected $carrera;

    function __construct($id,
    $table,
    PDO $connection) {
      parent::__construct($id, $table, $connection);
    }
    function getNombre() {
    return $this->nombre;
   }
    function setNombre($nombre){
   $this->nombre = $nombre;
   }
    function getApellido() {
   return $this->apellido;
   }
    function setApellido($apellido){
   $this->apellido = $apellido;
   }
    function getEdad(){
    return $this->edad;
   }
    function setEdad($edad){
   $this->edad = $edad;
   }
    function getGenero(){
   return $this->genero;
   }
 
    function setGenero($genero){
   $this->genero = $genero;
   }
 
    function getCarrera(){
   return $this->carrera;
   }
 
    function setCarrera($carrera){
   $this->carrera = $carrera;
 }
 function saludar(){
    return "<p>Hola soy". " " .$this ->nombre . " " . $this ->apellido . "</p>";
 }
}
