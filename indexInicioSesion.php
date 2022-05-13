<?php
session_start();
if (isset($_SESSION["sesion"]) && $_SESSION["sesion"] == 1) {
    header("location: index.php");
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
    <h1>Iniciar Sesion</h1>
    <form action="usuariosLogon.php" method="post">
        <label for="Usuario">Introduzca nombre de Usuario:</label><br>
        <input type="text" name="usuario" id="Usuario" placeholder="Usuario" maxlength="12" require><br><br>
        <label for="pass">Introduzca contraseña:</label><br>
        <input type="password" name="contra" id="pass" placeholder="Contraseña" minlength="3" maxlength="3" require><br><br>

        <?php
        if (isset($_GET["msj"])) {
            $msj = filter_input(INPUT_GET, "msj");
            echo $msj."<br>";
        }
        ?>
        <input type="submit" value="Iniciar">
    </form>
</body>

</html>