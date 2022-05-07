<?php
    session_start();
    $us = file("usuarios.dat");
    $numRegistros = sizeof($us);
    if ($numRegistros >0){
        $separados = str_split($us[0], 16);
        $_SESSION["usuarios"] = $separados;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stila.css">
</head>
<body>
    <h1>Busqueda de Usuarios</h1>  
    Localiza: <input type="text"><br>
    <form action="seleccion.php" method="post">
        <select name="usuarios" size="15">
            <?php
                foreach ($separados as $key => $s){
                    $nombre = substr($s, 0, 12);
                    $tipo = substr($s, 12, 13);
                    $pass = substr($s, 13, 16);
                    ?>
                        <option value="<?php echo $key ?>"><?php echo $nombre ?></option>
                    <?php
                }
            ?>
            <!-- Selected es para tener una opcion selecionada de fault -->
        </select><br><br>
        
        <input type="submit" name="action" value="Agregar">
        <input type="submit" name="action" value="Modificar">
        <input type="submit" name="action" value="Borrar">
        <input type="submit" name="action" value="Seleccionar">
        <input type="submit" name="action" value="Cancelar">
    </form>
</body>
</html>