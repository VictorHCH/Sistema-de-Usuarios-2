<?php
    function accion($x){
        if($x == "Agregar"){
            return 1;
        }
        if($x == "Cancelar"){
            return 2;
        }
    }
    $accion = accion(filter_input(0,"action"));
    switch ($accion){
        case 1:
            $usuario = filter_input(0, "usuario");
            $tipo = filter_input(0, "tipo");
            $pass1 = filter_input(0, "pass1");
            $pass2 = filter_input(0, "pass2");
            if($usuario != "" && $pass1 != "" && $pass2 != "" && $pass1 == $pass2){
                $usuario = substr(trim($usuario).'            ',0,12);
                if($tipo == 0){
                    $tipo = 'u';
                }
                else{
                    $tipo = 'a';   
                }
                $tipo = substr(trim($tipo).' ',0,1);
                $pass1 = substr(trim($pass1).'   ',0,3);
                $dato = $usuario.$tipo.$pass1;
                $archivo = fopen("usuarios.dat", "a");
                fwrite($archivo, $dato);
                fclose($archivo);
            }
            header("Location: usuarios.php");
            break;
        case 2:
            header("Location: usuarios.php");
            break;
    }
?>