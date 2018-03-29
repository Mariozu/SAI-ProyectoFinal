<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


require("../../conexion.php");
$evento = $_POST['evento'];
$fecha = $_POST['fecha'];
$descrip = $_POST['descripcion'];
$usuario = $_POST['usuario'];
$id_user = $_SESSION['id_gerente'];
$users = implode(",", $usuario);
$hh     =  $_POST['hora'];
$consulta = "";

 $fch=explode("-",$fecha);
 $fecha=$fch[2]."-".$fch[1]."-".$fch[0];


$sqll = "SELECT * FROM usuarios WHERE id IN (".$users.")";
$result1 = mysqli_query($con, $sqll);
if(mysqli_num_rows($result1) != 0){
    while($row = mysqli_fetch_assoc($result1)){

    $consulta .= ",('".$evento."','".$fecha."T".$hh."','#','gerente', '".$descrip."', '".$evento."', '".$row['id']."', '".$_SESSION['empresa']."','T".$hh."','0')";
    
    }

}else{echo '1';}

$consul = "INSERT INTO eventos_general (title,start,url,cargo,descripcion,asignado, id_usuario,empresa,hora,id_control) VALUES('".$evento."','".$fecha."T".$hh."','#','gerente', '".$descrip."', '".$evento."', '".$id_user."', '".$_SESSION['empresa']."', 'T".$hh."','".$id_user."')".$consulta;

$r = mysqli_query($con,$consul);
mysqli_close($con);



?>
