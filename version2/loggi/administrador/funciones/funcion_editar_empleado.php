<?php
require("../conexion.php");	
$id_empleado= $_POST["id_empleado"]; 
$nombre= $_POST["nombre"];
$apellido_p= $_POST["apellidop"]; 
$apellido_m= $_POST["apellidom"]; 
$cargo= $_POST["cargo"]; 
$dep= $_POST["dep"]; 
$turno= $_POST["turno"]; 
$calle= $_POST["calle"]; 
$colonia= $_POST["colonia"]; 
$cp= $_POST["cp"];
$email= $_POST["email"]; 
$cel= $_POST["cel"];
$clave= $_POST["clave"]; 
$entrada= $_POST["entrada"]; 
$salida= $_POST["salida"]; 
$comer= $_POST["h_e_comer"]; 
$comer_s= $_POST["h_s_comer"]; 
$empresa= $_POST["empresa"]; 
$clave_cript=md5($clave);

$editar_empleado = "UPDATE usuarios SET nombre='".$nombre."',calle_num='".$calle."',clave_check='".$clave."',contrasena='".$clave_cript."',turno='".$turno."', colonia='".$colonia."',departamento='".$dep."',empresa='".$empresa."', apellido_pat='".$apellido_p."', apellido_mat='".$apellido_m."', num_celular='".$cel."', puesto = '".$cargo."' ,email='".$email."',entrada='".$entrada."',comida='".$comer."',regreso='".$comer_s."',salida='".$salida."' WHERE id_emp='".$id_empleado."'";

if(mysqli_query($con,$editar_empleado)) 
{
    echo 1;
}else{ 
    echo 0;
} 

?>