
<?php
$id=$_POST["id"];
include ("../../conexion.php");	
$query="DELETE FROM eventos WHERE id='$id'"; 
$exito=mysqli_query($con,$query);
if($exito){
    echo 1;
}else{
    echo 0;
}
?>
