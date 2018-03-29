<?php
/*******************************************************************
*Proyecto: SAST.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 01/12/15.
 * 
*Descripcion: Funcion para el resgitro de nuevos eventos 
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
session_start();
require("../conexion.php");
$fecha1	= $_REQUEST["fecha"]; 
$hora 	= $_REQUEST["hora"]; 
$titulo 	= $_REQUEST["titulo"]; 
$descripcion= $_REQUEST["desc"]; 
$color 	= $_REQUEST['color'];  
$fecha=date("Y-m-d",strtotime($fecha1));
$sql = "INSERT INTO evento_gerente (fecha,hora,titulo,descripcion,color,id_gerente) "
        . "VALUES ('$fecha','$hora','$titulo','$descripcion','$color','$_SESSION[id_gerente]')";  
$r=mysqli_query($con,$sql);
if($r){           
    echo 1;
}else{ 
    echo 0;
} 
?>
