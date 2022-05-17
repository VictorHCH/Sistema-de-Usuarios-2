<?php
    $usu = trim(filter_input(0, 'usu'));
    $pass = trim(filter_input(0, 'pass'));
    $dat = Mysql('localhost', $usu, $pass);
?>