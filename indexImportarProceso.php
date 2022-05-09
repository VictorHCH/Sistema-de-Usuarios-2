<?php 
$nombreArchivo = 'C:\xampp\carpeta-segura\archivo.csv';
if(file_exists($nombreArchivo)){
    ini_set("auto_detect_line_endings", true);
    $arch = file($nombreArchivo);
    $todo = "";
    foreach ($arch as $key => $value) {
        if($value != ""){
            $separado = explode(",", $value);
            $u = substr($separado[0].'            ', 0, 12);
            $t = $separado[1];
            $p = substr($separado[2].'   ',0,3);
            // $usuario = $separado[0].str_repeat(" ", 12- strlen($separado[0])).$separado[1].trim($separado[2]);
            $usuario = $u.$t.$p;
            $todo .= $usuario;
        }
    }
    $base = fopen("usuarios.dat", "w");
    fwrite($base, $todo);
    fclose($base);
    unlink($nombreArchivo);
    ?>
    <h1>Fueron importados los datos!!</h1>
    <a href="index.php">Click aqui para volver...</a>
    <?php
}
else{
    header("location: index.php");
}


?>