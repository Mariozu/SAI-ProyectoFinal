<?php
	session_start();
	require("../conexion.php");	
	$id_empleado= $_SESSION["id_emp"]; 
	$entrada= $_POST["entrada"]; 
	$salida= $_POST["salida"]; 
	$comer= $_POST["h_e_comer"]; 
	$comer_s= $_POST["h_s_comer"]; 
	
	
	
	$editar_empleado = "UPDATE usuarios SET entrada='".$entrada."',comida='".$comer."',regreso='".$comer_s."',salida='".$salida."' WHERE id_emp='".$id_empleado."'";
	
	if(mysqli_query($con,$editar_empleado)) 
	{
		echo 1;
	}
	else
	{ 
		echo 0;
	} 
	
?>