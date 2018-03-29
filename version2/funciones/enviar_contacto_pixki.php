<?php


	$correo="winnienalli@gmail.com";
	$asunto=$_POST['asunto'];
	$mensaje=$_POST['mensaje'];
	$correo_tim="mflorezuniga@gmail.com";
	if (email_usuario($correo,$correo_tim,$asunto,$mensaje))
	{
		echo 1;
	}
	else 
	{
		echo 0;
	}
	function email_usuario($correo,$correo_tim,$asunto,$mensaje)
{
			$html_email_container='<!DOCTYPE html> 
										<html>
											<head>
											<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rokkitt">
											<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
											<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
											<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

											<meta charset="utf-8">
											</head>
										<div class="col-sm-12"style="background:#5189ef;width:100%;height:7%"  align="center">
											<a><img src="http://pixki.com.mx/usuarios/images/pixkilogo.png" style="width:20%" align="center"/></a>
										</div>
											<body style="border:2px solid #b5b5b5;">
											
											<strong><h3 style="margin-left:5%;"> CONTACTO : </h3> <h4 style="margin-left:5%;"> Sistema de asistencia inteligente </h4></strong>
											<header style ="  margin-left: 3%; background: #FFF; height:20%; " >
											<h4 style="color:#000; text-align: center; font-size: 20px;" >'.$mensaje.'</h4>	
												
											</header>
										
										</body>
									</html>';
	
	require('../../BD-Config/email_config.php');
	$email_container=sgHelper::initializeEmail();
	$email_send=sgHelper::initializeSender();
	$email_container -> addTo($correo_tim)
					 -> setFrom($correo)
					 -> setFromName('Sistema de asistencia inteligente')
					 -> setSubject($asunto)
					 -> setText($mensaje)
					 -> setHtml($html_email_container);
	
	$response=	$email_send ->send($email_container);
		if($response -> getCode()==200)
		{
		return true;
		}else 
			return false;
}
?>