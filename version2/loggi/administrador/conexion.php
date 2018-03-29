<?php
$servidor="127.0.0.1";
$usuario="root";
$pass="";
$bd="sai";
$con=mysqli_connect($servidor,$usuario,$pass,$bd) or die("No se pudo conectar a la base de datos "); 
 mysqli_set_charset($con, 'utf8');
?>