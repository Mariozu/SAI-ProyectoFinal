<?php
	session_start();
	require("../conexion.php");
	$fecha	= $_REQUEST["fecha"]; 
	$titulo	= $_REQUEST["titulo"]; 
	$desc	= $_REQUEST["descripcion"]; 
	
	$sql = "INSERT INTO eventos (start,title,descripcion,id_usuario) "
	. "VALUES ('$fecha','$titulo','$desc','$_SESSION[id_emp]')"; 
	$resultado=mysqli_query($con,$sql);
	if($resultado)
	{           
		echo 1;
	}
	else
	{ 
		echo 0;
	} 
	
?>