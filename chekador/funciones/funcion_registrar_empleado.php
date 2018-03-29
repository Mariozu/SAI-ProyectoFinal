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
    $user       = $_REQUEST["user"];
    $cargo      = $_REQUEST["cargo"];
    $dep        = $_REQUEST["dep"];
    $calle  	= $_REQUEST["calle"]; 
    $estado 	= $_REQUEST['estado'];
    $municipio	= $_REQUEST['municipio'];
    $colonia	= $_REQUEST['colonia'];
    $passwd     = $_REQUEST['contrasena'];  
    $clave2      = $_REQUEST["clave"];
    $cp 	= trim(mysqli_real_escape_string($con,$_REQUEST['cp']));
    $telcelu 	= trim(mysqli_real_escape_string($con,$_REQUEST['cel']));
    $correo 	= trim(mysqli_real_escape_string($con,$_REQUEST['email']));
    $telefono 	= trim(mysqli_real_escape_string($con,$_REQUEST['tel']));

        $clave=''.md5($passwd).'';
 
                    require("../../conexion.php");
                    $status=1;
                    $sql = "INSERT INTO usuarios (nombre,apellido_pat,apellido_mat,num_celular,email,puesto,calle_num,colonia,cp,telefono_casa,municipio,estado,status,contrasena,user  ,departamento,clave_check)"
                            . "VALUES ('$us','$app','$apm','$telcelu','$correo','$cargo','$calle','$colonia','$cp','$telefono','$municipio','$estado','1','$clave','$user','$dep','$clave2')";
                    $r=mysqli_query($con,$sql);   
                    if($r){
                        echo 1;
                    }  else {
                        echo 0;
                    }
                    mysqli_close($con);




?>