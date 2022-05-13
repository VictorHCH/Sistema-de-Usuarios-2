<?php
session_start();
if (!isset($_SESSION["sesion"]) || $_SESSION["sesion"] == 0) {
    header("location: indexInicioSesion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center">
    <form action="indexImportarRecibir.php" method="post" enctype="multipart/form-data">
        <h1>Importar Archivo</h1>
        <label for="archivo">Selección de archivo: </label>
        <input type="file" name="archivo" id="archivo"><br><br>
        <input type="submit" name="accion" value="Enviar">
        <input type="submit" name="accion" value="Cancelar">
    </form>
</body>
</html>