<?php
	/*******************************************************************
		*Proyecto: SAI.
		* 
		*Desarrollador: Miguel Martinez.
		* 
		*Fecha: 02/05/16.
		* 
		*Descripcion: Funcion para el resgitro de desarrolladores
		* 
		*Variables Globales: 
		* 
		*Metodos: Verificar_existencia(), sirve para validar los 
		* campos de telefono y correo en la bd
		*
	*******************************************************************/
	/*aqui limpiamos las variable que provienen del formulario*/
    session_start();
    require("../../conexion.php");
    $us         = $_REQUEST["nombre"]; 
    $app 	= $_REQUEST["apellidop"]; 
    $apm 	= $_REQUEST["apellidom"];
    $cargo      = $_REQUEST["cargo"];
    $turno      = $_REQUEST["turno"];
    $dep        = $_REQUEST["dep"];
    $calle  	= $_REQUEST["calle"]; 
    $colonia	= $_REQUEST['colonia'];  
    $clave2      = $_REQUEST["clave"];
    $cp 	= $_REQUEST['cp'];
    $telcelu 	= $_REQUEST['cel'];
	$correo =  $_REQUEST['email'];
	$clave=''.md5($clave2).'';
	$empresa = $_REQUEST["empresa"];
	
	require("../conexion.php");
	$status=1;
	$sql = "INSERT INTO usuarios (nombre,apellido_pat,apellido_mat,num_celular,email,puesto,turno,calle_num,colonia,cp,status,contrasena,departamento,clave_check,empresa)"
	. "VALUES ('$us','$app','$apm','$telcelu','$correo','$cargo','$turno','$calle','$colonia','$cp','1','$clave','$dep','$clave2','$empresa')";
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