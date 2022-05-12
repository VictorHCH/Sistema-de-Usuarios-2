<?php
ob_start();

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
    <h1>Usuarios del sistema</h1>
    <img src="logo.png" alt="Logo Escuela" width="150px">
    <?php
    $arch = fopen("usuarios.dat", "r");
    echo '<table border=2 style="width=50%; margin: 10px auto" > <tbody>';
    echo '<tr><th>Usuarios</th><th>Tipo</th></tr>';
    while (!feof($arch)){
        $dat = fread($arch, 16);
        $u = substr($dat, 0, 12);
        $t = substr($dat, 12, 1);
        if(strlen($u)>0){
            printf("<tr><th>$u</th><th>$t</th></tr>");
        }
    }
    fclose($arch);
    ?>
    </tbody></table>
</body>
</html>
<?php
    $html = ob_get_clean();

    require_once('C:/xampp/htdocs/_pdf/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    $dompdf = new Dompdf;

    $options = $dompdf->getOptions();
    $options->set(array("isRemoteEnabled"=>true));
    $dompdf->setOptions($options);

    // $dompdf->loadHtml("HOLA MUNDO");
    $dompdf->loadHtml($html);
    $dompdf->setPaper("letter");
    $dompdf->render("Hola, mundo");
    $dompdf->stream("ReporteUsuarios.pdf", array("Attachment"=>false));
?>