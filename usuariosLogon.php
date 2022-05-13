<?php
    session_start();
    $usuario = filter_input(0, "usuario");
    $contra = filter_input(0, "contra");

    if(isset($usuario)&&isset($contra)){
        $arch = file("usuarios.dat");
        $usuarios = str_split($arch[0], 16);

        $logeado = false;

        foreach ($usuarios as $usr) {
            $nombre = substr($usr, 0, 12);
            $rango = substr($usr, 12, 1);
            $pass = substr($usr, 13, 3);
            if(trim($nombre) === $usuario && $rango === 'a' && $pass === $contra){
                $logeado = true;
                break;
            }
        }
        if($logeado){
            $_SESSION["sesion"] = 1;
            echo "LOGUEADO!!!";
            header("location: index.php");
        }
        else {
            echo "$usuario - $contra";
            header("location: indexInicioSesion.php?msj=Error+al+iniciar");
        }
    }
    else {
        header("location: indexInicioSesion.php");
    }
?>