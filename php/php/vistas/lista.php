<?php
require_once(__DIR__ . "/../libs/database.php");
require_once(__DIR__ . "/../libs/Model.php");
include_once("../class/Aprendiz.php");
$database = new Database();
$connection = $database->getConnection();

$obj = new aprendiz($connection);
$usuarios = $obj->getAll();

echo "<pre>";
print_r($usuarios);
echo"</pre>";

?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Carrera</th>
            <th>Cuenta</th>
            <th>Promedio</th>
            <th>Acciones</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        <?php 
        for ($i = 0; $i < count($usuarios); $i++){
            echo "<tr>";
            echo "<td>". $usuarios[$i]['id'] ."</td>";
            echo "<td>". $usuarios[$i]['nombre'] ."</td>";
            echo "<td>". $usuarios[$i]['apellido'] ."</td>";
            echo "<td>". $usuarios[$i]['edad'] ."</td>";
            echo "<td>". $usuarios[$i]['genero'] ."</td>";
            echo "<td>". $usuarios[$i]['carrera'] ."</td>";
            echo "<td>". $usuarios[$i]['cuenta'] ."</td>";
            echo "<td>". $usuarios[$i]['promedio'] ."</td>";
            echo "<td>
                    <a href='editar.php?id=". $usuarios[$i]['id']. "'>Editar</a> 
                    <a href='eliminar.php?id=". $usuarios[$i]['id']. "'>Eliminar</a>
                  </td>";
            echo "</tr>";
         }
         ?>
    </tbody>
</table>

