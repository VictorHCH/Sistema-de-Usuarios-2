<?php
function accion($x){
    if($x == "Modificar"){
        return 1;
    }
    if($x == "Cancelar"){
        return 2;
    }
}
$accion = accion(filter_input(0, "action"));
switch ($accion){
    case 1:
        session_start();
        $reg = $_SESSION['mod'];
        $usu=filter_input(0,"usuario");
        $tipo=filter_input(0,"tipo");
        $c1=filter_input(0,"contra1");
        $c2=filter_input(0,"contra2");

        if($usu != null && $tipo != null ){
            $usu=substr(trim($usu)."            ",0,12);
            if($tipo==1){
                $t = 'u';
            }
            else{
                $t = 'a';
            }
            $t=substr(trim($t)." ",0,1);
            $arch = fopen("usuarios.dat","r+");
            $dato=$usu.$t;
            fseek($arch,$reg*16);
            fwrite($arch,$dato);
            if($c1 != null && $c2 != null && $c1 == $c2){
                $c1=substr($c1."   ",0,3);
                fwrite($arch,$c1);
                fclose($arch);
            }
            header("Location: usuarios.php");
        }else{
            echo 'Algo salio mal, intentalo de nuevo';
        }
        break;
    case 2:
        header("Location: usuarios.php");
        break;
}

?>