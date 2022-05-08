<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center;">
<?php
    $usuario = filter_input(0,"usuarios");

    function accion($x){
        if($x == "Agregar"){
            return 1;
        }
        if($x == "Modificar"){
            return 2;
        }
        if($x == "Borrar"){
            return 3;
        }
        if($x == "Seleccionar"){
            return 4;
        }
        if($x == "Cancelar"){
            return 0;
        }
    }
    $accion = accion(filter_input(0,"action"));    
    switch ($accion){
        case 0:
            header('Location: index.php');
            break;
        case 1:
            ?>
                <h1>Agregar Usuarios</h1>
                <form action="usuariosAdd.php" method="post">
                    Usuario: <input type="text" name="usuario"><br><br>
                    Tipó: <select name="tipo"><option value="0">Usuario</option><option value="1">Administrador</option></select><br><br>
                    Contraseña: <input type="password" name="pass1"><br><br>
                    Contraseña: <input type="password" name="pass2"><br><br>
                    <input type="submit" name="action" value="Agregar">
                    <input type="submit" name="action" value="Cancelar">
                </form>
            <?php
            break;
        case 2:
            if(isset($usuario)){
                $_SESSION["mod"] = $usuario;
                $mod = $_SESSION["mod"];
                $archivo = fopen("usuarios.dat", "r");
                fseek($archivo, $usuario*16);
                $d = fread($archivo, 16);
                $u = trim(substr($d,0,12)); 
                $t = trim(substr($d,12,1));
                fclose($archivo);
                ?>
                <h1>Modificar usuarios</h1>
                <form action="usuariosAccionModificar.php" method="post">
                    Usuario: <input type="text" name="usuario" value="<?php echo $u ?>"><br><br>
                    Tipo: <select name="tipo" id="1">
                        <option value="1">Usuario</option>
                        <?php
                            if($t == 'a'){
                                ?>
                                    <option value="2" selected>Administrador</option>
                                <?php
                            }
                            else{
                                ?>
                                    <option value="2">Administrador</option>
                                <?php
                            }
                        ?>
                    </select><br><br>
                    Contraseña: <input type="password" name="contra1" ><br><br>
                    Contraseña: <input type="password" name="contra2" ><br><br>
                    <input type="submit" name="action" value="Modificar">
                    <input type="submit" name="action" value="Cancelar">
                </form>
                <?php
            }
            else{
                header("location: usuarios.php");
            }
            break;
        case 3:
            if(isset($usuario)){
                $_SESSION["mod"] = $usuario;
                $mod = $_SESSION["mod"];
                $nombre = substr($_SESSION["usuarios"][$mod], 0, 12);
            ?>
                <h1>Eliminar Usuarios</h1>
                Realmente desea eliminar al usuario:<span id="usuario"> <?php echo $nombre; ?> </span><br><br>
                <form action="usuariosBorrar.php" method="post">
                    <input type="submit" name="action" value="Borrar">
                    <input type="submit" name="action" value="Cancelar">
                </form>
            <?php
            }
            else{
                header("location: usuarios.php");
            }
           break;
        case 4:
            $_SESSION['mod'] = $usuario;
            if($usuario > 0){
                header('Location: index.php');
            }
            else{
                header('Location: usuarios.php');
            }
            break;
    }
?>
</body>
</html>
