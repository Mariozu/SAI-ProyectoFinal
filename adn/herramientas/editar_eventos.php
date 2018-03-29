<?php

require('../../conexion.php');

$Nota=$_POST['title'];
$fech =  explode("T",$_POST['fecha']);
$des   = $_POST['descripcion'];


$NOT = explode("-",$fech[0]);
$fecha = $NOT[2]."-".$NOT[1]."-".$NOT[0];



$cambiar_cita="UPDATE eventos SET start='".$fecha."T".$fech[1]."', descripcion = '".$des."', Hora = 'T".$fech[1]."'  WHERE title='".$Nota."'";
$result=mysqli_query($con,$cambiar_cita);
if($result){
    echo 1;
}else{
    echo 0;
}
       

			mysqli_close($con);
?>