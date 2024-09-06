<?php

include_once("personas.php");


class Aprendiz extends Personas {
    private $cuenta;
    private $promedio;

    public function __construct(PDO $connection){
        parent::__construct("id", "users", $connection);
    }

    function getCuenta() 
    {
        return $this->cuenta;
    }
    function setCuenta($cuenta)
    {
        return $this->cuenta = $cuenta;
    }
    function getPromedio() 
    {
        return $this->promedio;
    }
    function setPromedio() 
    {
        return $this->promedio = $promedio;
    }

    public function cancelarMatricula() 
    {
        echo "<p>Cancelar la matricula del aprendiz" .$this->nombre ."</p>";
    }
}