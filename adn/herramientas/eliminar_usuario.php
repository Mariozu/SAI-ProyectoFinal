<?php
//    require ("conexion.php");
//    $idsolicitudo=$_GET["varID"];	
//    $query="DELETE FROM solicitudes WHERE id_solicitud=$idsolicitudo; "; 
//    mysqli_query($con,$query);
//    mysqli_close($con);
?>

<?php
$id=$_POST["id"];
include ("../../conexion.php");	
$query="DELETE FROM usuarios WHERE id='$id'"; 
$exito=mysqli_query($con,$query) or die(mysqli_error($con));
//$conn=conectar();
//mysql_query( $consulta, $conn );
//desconectar($conn);
?>
