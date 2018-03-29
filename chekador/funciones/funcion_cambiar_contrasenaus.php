<?php
session_start();
require '../conexion.php';
$idus= $_POST["id"]; 

$cn=md5($_POST["contn"]);
$cn2=md5($_POST["contn2"]);
$sqlcon="SELECT contrasena FROM usuarios WHERE id_emp = '$idus' ";
$querrycon=  mysqli_query($con, $sqlcon);
while ($reg=  mysqli_fetch_array($querrycon)){
    $contra=$reg["contrasena"];
   //cifrado md5
    $contraMD5 = md5($contra);
   
}



    if($cn==$cn2){
        $cambio="UPDATE usuarios SET contrasena='$cn' WHERE id_emp = '$idus'";
        $sqlcambio=  mysqli_query($con, $cambio);
        if($sqlcambio){
           // header("location:../menu.php?opc=11");
             echo 0;
        }else{
          // header("location:../menu.php?opc=11");

        }
            
  } else {
     // header("location: ../menu.php?opc=11");
         echo 2;
         }

