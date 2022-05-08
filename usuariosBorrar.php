<?php
    function accion($x){
        if($x == "Borrar"){
            return 1;
        }
        if($x == "Cancelar"){
            return 2;
        }
    }
    $accion = accion(filter_input(0, "action"));
    switch($accion){
        case 1:
            session_start();
            $d = file('usuarios.dat');
            $archivo = fopen("usuarios.dat", "w");
            $reg = $_SESSION['mod'];
            $d1 = substr($d[0], 0, $reg*16);
            $d2 = substr($d[0], ($reg+1)*16);
            fwrite($archivo,$d1.$d2);
            fclose($archivo);
            header("Location: usuarios.php");
            break;
        case 2:
            session_destroy();
            header("Location: usuarios.php");
            break;

    }

?>