<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="controllers/aprendiz.php" method = "post">
<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre"><br>
<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido"><br>
<label for="edad">Edad:</label>
<input type="number" id="edad" name="edad"><br>
<label for="genero">Genero:</label>
<select id="genero" name="genero">
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select><br>
<label for="carrera">Carrera:</label>
<input type="text" id="carrera" name="carrera"><br>
<label for="carrera">cuenta:</label>
<input type="text" id="cuenta" name="cuenta"><br>
<label for="carrera">promedio:</label>
<input type="text" id="promedio" name="promedio"><br>
<button type="submit">Enviar</button>
</form>
</body>
</html>

<?php
require_once("services/mail.php");

$mail = "correo@gmail.com";
$message = "Chupalooo";
$subject = "77 lo mama";
$body = "Es lo mas bacano que hay";

$mail = new Mail($mail, $message, $subject, $body);

$mail->send();
?>


