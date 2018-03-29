
<head>
	<title>Editar Empleado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/add_empleado.css" rel="stylesheet"> 
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	
	<!----webfonts--->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<!---//webfonts--->  
	<!-- Bootstrap Core JavaScript -->
	<script src='js/moment.min.js'></script>
	<script src='js/moment-with-locales.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/>  
	
	
	
</head>

<?php
	require('../conexion.php');
	$id_empleado=$_GET["ver"];
	$cadena= "SELECT * FROM usuarios WHERE id_emp = $id_empleado";
	$result= mysqli_query($con,$cadena);
	while($reg=mysqli_fetch_array($result))
	{
		$email=$reg["email"];
		$nombre=$reg["nombre"];
		$apellido_p=$reg["apellido_pat"];
		$apellido_m=$reg["apellido_mat"];
		$cel=$reg["num_celular"];
		$calle=$reg["calle_num"];
		$colonia=$reg["colonia"];
		$cp=$reg["cp"];
		$empresa=$reg["empresa"];
		$cargo=$reg["puesto"];
		$depto=$reg["departamento"];
		$clave=$reg["clave_check"];
		$turno=$reg["turno"];
		$h_entrada=$reg["entrada"];
		$h_salida=$reg["salida"];
		$h_e_comer=$reg["comida"];
		$h_s_comer=$reg["regreso"];
	}
?>
<div id="wrapper">
	<h1>Editor</h1>
	
	
	<form class="form-group">
		<h1>Reingresa los datos correctamente:</h1>
		
		<div class="contentform">
			
			
			
			<div class="leftcontact">
				<div class="form-group">
					<div class="form-group">
						<p>Correo electronico <span>*</span></p>	
						<span class="icon-case"><i class="fa fa-envelope-o"></i></span>
						<input type="email" name="email" id="email" data-rule="email" value="<?php echo $email;?> "/>
						<div class="validation"></div>
					</div>	
					<p>Nombre (s)<span> *</span></p>
					<span class="icon-case"><i class="fa fa-male"></i></span>
					<input type="text" name="nom" id="nombre" data-rule="required" value="<?php echo $nombre;?> "/>
					<div class="validation"></div>
				</div> 
				<div class="form-group">
					<p>Apellido paterno <span>*</span></p>
					<span class="icon-case"><i class="fa fa-user"></i></span>
					<input type="text" name="prenom" id="ap_pat" data-rule="required" value="<?php echo $apellido_p;?> "/>
					<div class="validation"></div>
				</div>
				
				<div class="form-group">
					<p>Apellido Materno <span>*</span></p>
					<span class="icon-case"><i class="fa fa-user"></i></span>
					<input type="text" name="prenom" id="ap_mat" data-rule="required" value="<?php echo $apellido_m;?> "/>
					<div class="validation"></div>
				</div>
				
				
				
				<div class="form-group">
					<p>Telefono Celular <span>*</span></p>	
					<span class="icon-case"><i class="fa fa-phone"></i></span>
					<input type="text" name="phone" id="cel" data-rule="maxlen:10" value="<?php echo $cel;?>"/>
					<div class="validation"></div>
				</div>
				
				<div class="form-group">
					<p>Calle y numero <span></span></p>
					<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
					<input type="text" name="adresse" id="calle" data-rule="required" value="<?php echo $calle;?>"/>
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<p>Colonia <span></span></p>
					<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
					<input type="text" name="adresse" id="colonia" data-rule="required" value="<?php echo $colonia;?>"/>
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<p>Codigo Postal <span></span></p>
					<span class="icon-case"><i class="fa fa-map-marker"></i></span>
					<input type="text" name="postal" id="cp" data-rule="required" value="<?php echo $cp;?>"/>
					<div class="validation"></div>
				</div>	
				
				
				
			</div>
			
			<div class="rightcontact">	
				<div class="form-group">
					<p>Empresa <span>*</span></p>
					<span class="icon-case"><i class="fa fa-building-o"></i></span>
					<input type="text" name="society" id="empresa" data-rule="required" value="<?php echo $empresa;?>"/>
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<p>Departamento <span>*</span></p>
					<span class="icon-case"><i class="fa fa-home"></i></span>
					<input type="text" name="society" id="dep" data-rule="required" value="<?php echo $depto;?>"/>
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<p>Cargo <span>*</span></p>
					<span class="icon-case"><i class="fa fa-info"></i></span>
					<input type="text" name="fonction" id="cargo" data-rule="required" value="<?php echo $cargo;?>"/>
					<div class="validation"></div>
				</div>
				
				<div class="form-group">
					<p>Turno <span>*</span></p>
					<span class="icon-case"><i class="fa fa-moon-o"></i></span>
					<input type="text" name="ville" id="turno" data-rule="required" value="<?php echo $turno;?>"/>
					<div class="validation"></div>
				</div>
				<div class="form-group">
					
					<fieldset class="form-group">
						<legend>Horario</legend>
						<div class="form-label">
							<label >
								<input type="radio"  id="optionsmanual" onclick="changemode('0')" >
								Registrar horario manualmente
							</label>
						</div>
						<div class="form-label">
							<label >
								<input type="radio"  id="optionsgruop" onclick="changemode('1')">
								Utilizar grupo de horario
							</label>
						</div>
					</fieldset>
					
				</div>
				<div style="position: relative" id="hourcontainer" >
					<div style="position: relative">
						
						<div class="form-group" >
							<p>Salida a comer <span>*</span></p>
							<span class="icon-case"><i class="fa fa-cutlery"></i></span>
							<input type="text" name="ville" id="h_e_comer" data-rule="required" value="<?php echo $h_e_comer;?>"/>
							<div class="validation"></div>
						</div>	
					</div>	
					<div style="position: relative">
						<div class="form-group" >
							<p>Regreso de Comida <span>*</span></p>
							<span class="icon-case"><i class="fa fa-sign-language"></i></span>
							<input type="text" name="ville" id="h_s_comer" data-rule="required" value="<?php echo $h_s_comer;?>"/>
							<div class="validation"></div>
						</div>	
					</div>
					<div style="position: relative">
						<div class="form-group" >
							<p>Hora de entrada <span>*</span></p>
							<span class="icon-case"><i class="fa fa-clock-o"></i></span>
							<input type="text" name="ville" id="h_entrada" data-rule="required" value="<?php echo $h_entrada;?>"/>
							<div class="validation"></div>
						</div>	
					</div>
					<div style="position: relative">
						<div class="form-group" >
							<p>Hora de Salida <span>*</span></p>
							<span class="icon-case"><i class="fa fa-clock-o"></i></span>
							<input type="text" name="ville" id="h_salida" data-rule="required" value="<?php echo $h_salida;?>"/>
							<div class="validation"></div>
						</div>	
					</div>
				</div>
				
				<div class="form-group" id="gpo_hr" >
					<p>Grupos de horarios <span></span></p>					
					<select id="grupo" class="form-control" onchange="select_gpo()">
						<option disabled selected>Selecciona un horario</option>
						<?php
							$cadena="SELECT * FROM grupo_horarios";
							$result = mysqli_query($con,$cadena);
							while($reg=mysqli_fetch_assoc($result))
							{
								echo "<option value='".$reg["id_grupo"]."'>".$reg["etiqueta"]."</option>";
							} 
						?> 
					</select>
				</div>
				
				<div style="position: relative" id="hoursongroup" >
					<div style="position: relative">
						
						<div class="form-group" >
							<p>Salida a comer <span>*</span></p>
							<span class="icon-case"><i class="fa fa-cutlery"></i></span>
							<input type="text" name="ville" id="gpo_comer" data-rule="required" readonly />
							<div class="validation"></div>
						</div>	
					</div>	
					<div style="position: relative">
						<div class="form-group" >
							<p>Regreso de Comida <span>*</span></p>
							<span class="icon-case"><i class="fa fa-sign-language"></i></span>
							<input type="text" name="ville" id="gpo_s_comer" data-rule="required" readonly />
							<div class="validation"></div>
						</div>	
					</div>
					<div style="position: relative">
						<div class="form-group" >
							<p>Hora de entrada <span>*</span></p>
							<span class="icon-case"><i class="fa fa-clock-o"></i></span>
							<input type="text" name="ville" id="gpo_entrada" data-rule="required" readonly />
							<div class="validation"></div>
						</div>	
					</div>
					<div style="position: relative">
						<div class="form-group" >
							<p>Hora de Salida <span>*</span></p>
							<span class="icon-case"><i class="fa fa-clock-o"></i></span>
							<input type="text" name="ville" id="gpo_salida" data-rule="required" readonly />
							<div class="validation"></div>
						</div>	
					</div>
				</div>
				
				<div class="form-group" >
					<p>Editar Contraseña <span>*</span></p>					
					<br><span class="icon-case"><i class="fa fa-key"></i></span>
					<input type="text" id="pass1" name="message" rows="14" data-rule="required" value="<?php echo $clave;?>"  />
					<div class="validation"></div>
				</div>
				<div class="form-group" hidden >
					<p>Editar Contraseña <span>*</span></p>					
					<br><span class="icon-case"><i class="fa fa-key"></i></span>
					<input type="text" id="empleado" name="message" rows="14" data-rule="required" value="<?php echo $id_empleado;?>"  />
					<div class="validation"></div>
				</div>
			</div>
		</div>
		<input type="button" class="btn btn-block btn-warning" onclick="edita_empleado()" value="Editar"/>
		
	</form>	
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Nav CSS -->

<script src="js/registro_empleados.js"></script>

<script type="text/javascript">
	
	
	$(function () {
		$('#h_e_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_s_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_entrada').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_salida').datetimepicker({
			format: 'HH:mm:ss'
		});
	});
	
	
</script>


