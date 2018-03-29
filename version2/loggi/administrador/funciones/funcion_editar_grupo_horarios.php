<?php 
	require("../conexion.php");	
	$id_grupo= $_POST["id_grupo"]; 
	$entrada= $_POST["entrada"]; 
	$salida= $_POST["salida"]; 
	$comer= $_POST["h_e_comer"]; 
	$comer_s= $_POST["h_s_comer"]; 
	
	$update_grupos="UPDATE grupo_horarios SET entrada='$entrada',salida='$salida',entrada_comer='comer',regreso_comer='$comer_s' WHERE id_grupo='".$id_grupo."'";
	$resultado=mysqli_query($con,$update_grupos);
	if($resultado)
	{
		echo 1;
	}  else 
	{
		echo 0;
	}
?>