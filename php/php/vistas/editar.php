<?php
require_once(__DIR__ . "/../libs/database.php");
require_once(__DIR__ . "/../libs/Model.php");
include_once("../class/Aprendiz.php");

$database = new Database();
$connection = $database->getConnection();

$obj = new Aprendiz($connection);

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id) {
    $usuario = $obj->getId($id);
    ?>
    <form action="../controllers/aprendiz.php" method="post">
        <input type="hidden"  name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>"><br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $usuario['edad']; ?>"><br>
        <label for="genero">Genero:</label>
        <select id="genero" name="genero">
            <option value="Masculino" <?php echo ($usuario['genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option value="Femenino" <?php echo ($usuario['genero'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
        </select><br>
        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" value="<?php echo $usuario['carrera']; ?>"><br>
        <label for="cuenta">Cuenta:</label>
        <input type="text" id="cuenta" name="cuenta" value="<?php echo $usuario['cuenta']; ?>"><br>
        <label for="promedio">Promedio:</label>
        <input type="text" id="promedio" name="promedio" value="<?php echo $usuario['promedio']; ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
<?php
}
?>
