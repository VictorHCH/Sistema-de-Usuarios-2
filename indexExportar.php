<?php
    $fileName = 'resp'.date("Ymd").'.csv';
    $archivo = fopen('usuarios.dat  ', 'r');
    $archivo2 = fopen($fileName, 'w');
    while(!feof($archivo)){
        $dato = fread($archivo, 16);
        $res = trim(substr($dato,0,12)).','.substr($dato,12,1).','.trim(substr($dato,13,3));
        if(strlen($res)>4){
        fwrite($archivo2, $res."\r");
        }
    }
    fclose($archivo);
    fclose($archivo2);  
    
    $filePath = $fileName;
    if(file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        unlink($fileName);
        exit;
    }else{
        echo 'The file does not exist.';
    }
    ?>