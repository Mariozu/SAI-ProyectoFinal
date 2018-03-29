<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 02/05/16.
 * 
*Descripcion: Funcion para revisar si el correro ya 
 * fue usado con anterioridad.
 * 
*Variables Globales: 
 * 
*Metodos: Verificar_existencia(), sirve para validar los 
 * campos de telefono y correo en la bd
*
*******************************************************************/
	sleep(1); /*es para relentizar un poco el scrip y dar una aparencia mas suave*/

	if( !empty($_REQUEST['email']) && filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL)){/*funcion para validar  la correcta sintaxis de un email*/
		$email 	= $_REQUEST['email']; /*se renombra la variable para su facil manejo*/	
		
			function verificar_email_usuario($e){
					include('../../conexion.php');/* mediante la consulta busca si concuerda algun usuario */
					$sql = "SELECT email from usuarios WHERE status=1 AND BINARY email ='".$e."'";
					$rec = mysqli_query($con,$sql)or die("valio sombrilla'".$sql."'"); 
					$count = 0;/* si la consulta es un exito aumenta un contador y como resultado retorna un valor */
					while($row = mysqli_fetch_array($rec)){ $count++;}	
					if($count == 1){return 1;}
					else{return 0; }
			}
			
                if(verificar_email_usuario($email) == 1 ){
/*si la funcion verificar_email_usuario retorna un 1 quiere decir que la consulta fue un exito por lo tanto el correo sumistrado existe y no se encuentra disponible par su uso  */			
						echo "<div id='Error'><h4 style = 'color:red;'>Correo No Disponible</h4></div>";
					
		}else{
/*esta es la opcion por defecto si ninguna de anteriores funciones retorna 1 por lo tanto el correo sumistrado esta disponible*/
						echo '<div id="Success"><h4 style = "color:green;">Correo Disponible</h4></div>';
						
		}
		
	}else{	echo "<div id='Error'><h4 style = 'color:red;'>Correo no valido </h4></div>";	}
	/*esta actua cuando la variable sumistrada no se esta en el formato esperado*/

?>