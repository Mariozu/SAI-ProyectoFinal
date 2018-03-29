<?php
session_start();
require '../../conexion.php';
$idus= $_POST["id"]; 
$cn=md5($_POST["contn"]);
$cn2=md5($_POST["contn2"]);
    if($cn==$cn2){
        $cambio="UPDATE usuarios SET contrasena='$cn', clave_check='".$_POST["contn"]."'  WHERE id_emp = '$idus'";
        $sqlcambio=  mysqli_query($con, $cambio);
        if($sqlcambio){
           
             echo 1;
        }else{
         echo 0;

        }
            
  } else {
     // header("location: ../menu.php?opc=11");
         echo 2;
         }

