<?php
	session_start();
	require("../conexion.php");	
	
	$nombre= $_POST["nombre"];
	$apellido_p= $_POST["apellidop"]; 
	$apellido_m= $_POST["apellidom"]; 
	$email= $_POST["email"]; 
	$cel= $_POST["cel"];
	$clave= $_POST["clave"]; 
	$clave_cript=md5($clave);
	
	$editar_empleado = "UPDATE usuarios SET nombre='".$nombre."',clave_check='".$clave."',contrasena='".$clave_cript."', apellido_pat='".$apellido_p."', apellido_mat='".$apellido_m."', num_celular='".$cel."',email='".$email."' WHERE id_emp='".$_SESSION["id_emp"]."'";
	
	if(mysqli_query($con,$editar_empleado)) 
	{
		echo 1;
	}
	else
	{ 
		echo 0;
	} 
	
?>