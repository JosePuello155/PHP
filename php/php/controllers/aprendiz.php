<?php
require_once(__DIR__ . "/../libs/database.php");
require_once(__DIR__ . "/../libs/Model.php");
include_once("../class/Aprendiz.php");
$database = new Database();
$connection = $database->getConnection();
$aprendiz = new Aprendiz($connection);

var_dump($_REQUEST);

if (isset($_POST["nombre"])) {
    $nombre   = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad     = $_POST["edad"];
    $genero   = $_POST["genero"];
    $carrera  = $_POST["carrera"];
    $cuenta   = $_POST["cuenta"];
    $promedio = $_POST["promedio"];
    $id = isset($_POST["id"]) ? $_POST["id"] : false;

    if($id){
        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'edad' => $edad,
            'genero' => $genero,
            'carrera' => $carrera,
            'cuenta' => $cuenta,
            'promedio' => $promedio,
        ];
        $aprendiz->update($id, $data);
    } else {
        $aprendiz->store([
            "nombre" => $nombre,
            "apellido" => $apellido,
            "edad" => $edad,
            "genero" => $genero,
            "carrera" => $carrera,
            "cuenta" => $cuenta,
            "promedio" => $promedio
        ]);
    }
}


    
  

?>
