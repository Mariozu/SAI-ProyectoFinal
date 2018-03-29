<?php
$servidor="localhost";
$user="root";
$contrasen="NoLoHagaCompa.2015";
$bd="pixki";
$con=mysqli_connect($servidor,$user,$contrasen,$bd) or die("No se pudo conectar a la base de datos "); 
mysqli_set_charset($con,"utf8");
?>