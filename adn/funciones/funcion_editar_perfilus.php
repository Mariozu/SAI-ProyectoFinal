<?php
/*******************************************************************
	*Proyecto: SAST.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 23/11/15.
 * 
*Descripcion: Funcion para modificar el perfil.
 * 
*Variables Globales: 
 * 
*Metodos: Verificar_existencia(), sirve para validar los 
 * campos de telefono y correo en la bd
*
*******************************************************************/
require '../../conexion.php';
session_start();
$idus= $_POST["id"]; 
$usuario= $_POST["nombre"]; 
$app 	= $_POST["apellidop"]; 
$apm 	= $_POST["apellidom"];  
$comida=$_POST["comida"];
$entrada=$_POST["entrada"];
$regreso=$_POST["regreso"];
$salida=$_POST["salida"];
$telcelu 	= trim(mysqli_real_escape_string($con,$_POST['cel']));
$tel 	= trim(mysqli_real_escape_string($con,$_POST['tel']));
$correo 	= trim(mysqli_real_escape_string($con,$_POST['email']));
$sql = "UPDATE usuarios SET nombre='".$usuario."', apellido_pat='".$app."', apellido_mat='".$apm."', num_celular='".$telcelu."', telefono_casa = '".$tel."' ,email='".$correo."',entrada='".$entrada."',comida='".$comida."',regreso='".$regreso."',salida='".$salida."' WHERE id_emp='".$idus."'";
if(mysqli_query($con,$sql)) 
{
    echo 1;
}else{ 
    echo 0;
} 
?>