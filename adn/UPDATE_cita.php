<?php
require('../conexion.php');
session_start();
$cita=$_POST['fecha'];
$evento=$_POST['evento'];
$hh = "";
$sql = "SELECT DISTINCT * FROM eventos WHERE title = '".$evento."'  AND id_control = '".$_SESSION['id_emp']."' ";
$r = mysqli_query($con, $sql);
       if(mysqli_num_rows($r) > 0){
while($row = mysqli_fetch_assoc($r)){
        $hh=$row["hora"];
    }
$cambiar_cita="UPDATE eventos SET start='".$cita.$hh."' WHERE title='".$evento."'";
$result=mysqli_query($con,$cambiar_cita);
			echo '1';
           }else{
            echo '2';
           } 
			mysqli_close($con);
?>