<?php
require_once(__DIR__ . "/../libs/database.php");
require_once(__DIR__ . "/../libs/Model.php");
include_once("../class/Aprendiz.php");

$database = new Database();
$connection = $database->getConnection();
$aprendiz = new Aprendiz($connection);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $Aprendiz= $aprendiz->getId($id);
    if ($Aprendiz) {
        $aprendiz->delete($id);
        echo "Aprendiz eliminado con éxito";
    } else {
        echo "Aprendiz no encontrado";
    }
} else {
    echo "No se proporcionó el ID del Aprendiz";
}
?>