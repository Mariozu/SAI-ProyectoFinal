<?php
session_start();
function verificar_admin($user,$password,&$result){
    require "conexion.php";
    $u = mysqli_real_escape_string($con,$user);/*aqui se limpian las variables de los caracteres especiales*/
    $p = mysqli_real_escape_string($con,$password); 

    $sql = "SELECT * FROM usuarios WHERE BINARY email = '$u' OR user = '$u' AND BINARY contrasena = '$p' AND status = 1  AND puesto='administrador'";

    $rec = mysqli_query($con,$sql); /*en la consulta de arriba <$sql> la palabra BINARY es la que distingue minusculas de MAYUSCULAS */

    $count = 0;
    while($row = mysqli_fetch_object($rec)){/*inicia el bucle con la consulta anterior*/
        $count++;
        $result = $row;/*todo el resultado queda guardado en la variable $result*/
    }
    if($count == 1){
        return 1;
    }else{
        return 0; }	
}
function verificar_check($user,$password,&$result){
    require "conexion.php";
    $u = mysqli_real_escape_string($con,$user);/*aqui se limpian las variables de los caracteres especiales*/
    $p = mysqli_real_escape_string($con,$password); 

    $sql = "SELECT * FROM usuarios WHERE BINARY email = '$u' OR user = '$u' AND BINARY contrasena = '$p' AND status = 1  AND puesto='check'";

    $rec = mysqli_query($con,$sql); /*en la consulta de arriba <$sql> la palabra BINARY es la que distingue minusculas de MAYUSCULAS */

    $count = 0;
    while($row = mysqli_fetch_object($rec)){/*inicia el bucle con la consulta anterior*/
        $count++;
        $result = $row;/*todo el resultado queda guardado en la variable $result*/
    }
    if($count == 1){
        return 1;
    }else{
        return 0; }	
}
function verificar_user($user,$password,&$result){
    require "conexion.php";
    $u = mysqli_real_escape_string($con,$user);/*aqui se limpian las variables de los caracteres especiales*/
    $p = mysqli_real_escape_string($con,$password); 

    $sql = "SELECT * FROM usuarios WHERE BINARY email = '$u' OR user = '$u' AND BINARY contrasena = '$p' AND status = 1 AND puesto!='administrador' AND puesto!='check'";

    $rec = mysqli_query($con,$sql); /*en la consulta de arriba <$sql> la palabra BINARY es la que distingue minusculas de MAYUSCULAS */

    $count = 0;
    while($row = mysqli_fetch_object($rec)){/*inicia el bucle con la consulta anterior*/
        $count++;
        $result = $row;/*todo el resultado queda guardado en la variable $result*/
    }
    if($count == 1){
        return 1;
    }else{
        return 0; 
    }	
}	
if(isset($_POST['aceptar'])){/*si se a precionado el boton de login entra al ciclo*/
    if(verificar_admin($_POST['email'],md5($_POST['contrasena']),$result) == 1){ /*llama a la funcion se le envia como parametros las variables del formulario del login*/
        $_SESSION['id_emp'] = $result->id_emp;
        $_SESSION['nombre']       = $result ->nombre;
        $_SESSION['Activa_server'] = "sai_server";
        echo 1;
    }
    else if(verificar_user($_POST['email'],md5($_POST['contrasena']),$result) == 1){ /*llama a la funcion se le envia como parametros las variables del formulario del login*/                            
        $_SESSION['email']   = $result->email;
        $_SESSION['id_user'] = $result->id_emp;
        $_SESSION['name']       = $result ->nombre;
        $_SESSION['apellidop']        = $result ->apellido_pat;
        $_SESSION['apellidom']        = $result ->apellido_mat;
        $_SESSION['puesto'] = $result ->puesto;
        $_SESSION['dep'] = $result ->departamento;
        $_SESSION['Activa_user'] = "sai_user";
        echo 2;
    }else if(verificar_check($_POST['email'],md5($_POST['contrasena']),$result) == 1){ /*llama a la funcion se le envia como parametros las variables del formulario del login*/
        $_SESSION['id_emp'] = $result->id_emp;
        $_SESSION['nombre']       = $result ->nombre;
        $_SESSION['Activa_check'] = "sai_check";
        echo 1;
    }
    else {echo 0;}				  
}  
?>