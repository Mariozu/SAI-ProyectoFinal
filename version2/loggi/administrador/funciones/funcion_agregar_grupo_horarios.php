<?php
	session_start();
	require("../conexion.php");
	$etiqueta= $_POST["etiqueta"];
	$entrada= $_POST["entrada"]; 
	$salida= $_POST["salida"]; 
	$comer= $_POST["h_e_comer"]; 
	$comer_s= $_POST["h_s_comer"]; 
	
	
	$status=1;
	$sql = "INSERT INTO grupo_horarios (etiqueta,entrada,salida,entrada_comer,regreso_comer)  VALUES ('$etiqueta','$entrada','$salida','$comer','$comer_s')";
	
	$r=mysqli_query($con,$sql);   
	if($r)
	{
		echo 1;
	}  else 
	{
		echo 0;
	}
	mysqli_close($con);
?>