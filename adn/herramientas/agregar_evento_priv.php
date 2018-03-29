<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


require("../../conexion.php");
$evento = $_POST['evento'];
$descrip = $_POST['descripcion'];
$id_user = $_SESSION['id_emp'];
$hh     =  $_POST['hora'];
$fecha = $_POST['fecha'];

 $fch=explode("-",$fecha);
 $fecha=$fch[2]."-".$fch[1]."-".$fch[0];


$consul= "INSERT INTO eventos (title,start,url,descripcion,id_usuario,hora,id_control) VALUES('".$evento."','".$fecha."T".$hh."','#', '".$descrip."', '".$id_user."', 'T".$hh."','".$id_user."')";
$r = mysqli_query($con,$consul);
if($r){
    echo 1;
}else{
    echo 0;
}

mysqli_close($con);



?>
