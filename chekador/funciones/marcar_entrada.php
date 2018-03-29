<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 03/05/16.
 * 
*Descripcion: funcion para marcar entrada en el checador
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
require '../../conexion.php';
$clave=$_REQUEST["contra"];
$hora=$_REQUEST["hora"];
$hora_comida= "14:00:00";//tomamos una hora fija definida para la salida a comer y la convertimos a unidad de tiempo para poder hacer un comparacion
$hora_regreso= "15:00:00";// hacemos los mismo que con la variable anterior para el regreso de la hora de comida
$hora_salida= "17:00:00";// hacemos los mismo que con la variable anterior para el horario de salida
//$time= strtotime($hora);//convertimos a unidad de tiempo la variable que mandamos por ajax
date_default_timezone_set('UTC');
$fecha_actual=date("y-m-d");//definimos la fecha actual para insertar a la base de datos
$verif="SELECT id_emp FROM usuarios WHERE clave_check='$clave'";
$querryv=  mysqli_query($con, $verif);
if(mysqli_num_rows($querryv)!=0){//verificamos que exista la clave que se ingreso antes de pasar arevisar si puede insertar
    $check="SELECT id_emp,id_entrada FROM usuarios JOIN checador WHERE id_emp=id_user AND clave_check='$clave' AND fecha='$fecha_actual'";
    $querry=  mysqli_query($con, $check);
    if(mysqli_num_rows($querry)!=0){//una vez verificadoq ue si existe la clave si exite un registro de entrada de este dia hecho por el usuario pasa a revisar el tipo de entra a seguir
        while ($re=  mysqli_fetch_array($querry)){
            $id=$re["id_entrada"];
        
            $upquer="SELECT hora_entrada,hora_comida,hora_regreso,hora_salida FROM checador WHERE id_entrada='$id'";
            $querupeer=  mysqli_query($con, $upquer);
            while ($res= mysqli_fetch_array($querupeer))
            {
//                $entra=  strtotime($res["hora_entrada"]);
//                $comida= strtotime($res["hora_comida"]);
//                $regreso=  strtotime($res["hora_regreso"]);
//                $salida=  strtotime($res["hora_salida"]);
                $entra=  $res["hora_entrada"];
                $comida= $res["hora_comida"];
                $regreso= $res["hora_regreso"];
                $salida=  $res["hora_salida"];
            
                if($entra!=""){
                    if($hora>$entra AND $hora>=$hora_comida AND $hora<$hora_regreso AND $comida =="00:00:00" ){// verificamos que la hora a registrar este dentro del rango correcto para el horario de comida de lo contrario pasara a la siguiente condicional
                        $upcomida="UPDATE checador SET hora_comida='$hora' WHERE id_entrada='$id'";
                        $quercomida=  mysqli_query($con, $upcomida);
                        if($quercomida){
                            echo 3;
                        }  else {
                            echo 10;
                        }    
                    }else if($hora<$hora_comida){// si la condicion anterior no aplica revisamos si es antes de la hora de comida
                        echo 9;
                    }else if($hora>$comida AND $hora>=$hora_regreso AND $hora<$hora_salida AND $regreso=="00:00:00" ){//verificamos que es hora de regresar de la hora de comida
                        $upregreso="UPDATE checador SET hora_regreso='$hora' WHERE id_entrada='$id'";
                        $querregreso=  mysqli_query($con, $upregreso);
                        if($querregreso){
                            echo 4;
                        }  else {
                            echo 10;
                        }    
                    }else if($hora>$regreso AND $hora <$hora_salida){
                        echo 7;
                    }else if($hora>= $hora_salida AND $salida=="00:00:00" ) {
                         $upsalida="UPDATE checador SET hora_salida='$hora' WHERE id_entrada='$id'";
                        $quesalida=  mysqli_query($con, $upsalida);
                        $marcarS="UPDATE usuarios SET entro='0' WHERE id_emp='$id2'";
                        $qmarS=mysqli_query($con, $marcarS);
                        if($quesalida AND $qmarS){
                            echo 2;
                        }  else {
                            echo 10;
                        }    
                    }else{
                        echo 8;
                    }
                }
            }
        }
    }else{//de lo contrario hace el primer registro de entrada del dia para ese usuario
        
         while ($re=  mysqli_fetch_array($querryv)){
            $id2=$re["id_emp"];
        
            $checkinse="INSERT INTO checador(id_user,fecha,hora_entrada) VALUES('$id2','$fecha_actual','$hora')";
            $quericheker=  mysqli_query($con, $checkinse);
            $marcarE="UPDATE usuarios SET entro='1' WHERE id_emp='$id2'";
            $qmarE=mysqli_query($con, $marcarE);
            if($quericheker AND $qmarE){// devolvemos valor 1 para activar la alerta si se realizo correctamente la insercion
                echo 1;
            }  else {
                echo 10;
            }
        }
    }
}   else 
    {
    echo 0;
    }
