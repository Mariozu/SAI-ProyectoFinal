<head>
	<title>Agregar Empleado</title>
	
	<!-- Bootstrap Core CSS -->
	<link href="css/add_empleado.css" rel="stylesheet"> 
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!----webfonts--->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<!---//webfonts--->  
	<!-- Bootstrap Core JavaScript -->
	
	
</head>


<h1>Registro</h1>


<form class="form-group">
	<h1>Ingresa los datos correctamente:</h1>
	
	<div class="contentform">
		
		
		
		<div class="leftcontact">
			<div class="form-group">
				<div class="form-group">
					<p>Correo electronico <span>*</span></p>	
					<span class="icon-case"><i class="fa fa-envelope-o"></i></span>
					<input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
					<div class="validation"></div>
				</div>	
				<p>Nombre (s)<span> *</span></p>
				<span class="icon-case"><i class="fa fa-male"></i></span>
				<input type="text" name="nom" id="nombre" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
				<div class="validation"></div>
			</div> 
			<div class="form-group">
				<p>Apellido paterno <span>*</span></p>
				<span class="icon-case"><i class="fa fa-user"></i></span>
				<input type="text" name="prenom" id="ap_pat" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			
			<div class="form-group">
				<p>Apellido Materno <span>*</span></p>
				<span class="icon-case"><i class="fa fa-user"></i></span>
				<input type="text" name="prenom" id="ap_mat" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			
			
			
			<div class="form-group">
				<p>Telefono Celular <span>*</span></p>	
				<span class="icon-case"><i class="fa fa-phone"></i></span>
				<input type="text" name="phone" id="cel" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
				<div class="validation"></div>
			</div>
			
			<div class="form-group">
				<p>Calle y numero <span>*</span></p>
				<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
				<input type="text" name="adresse" id="calle" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Adresse' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			<div class="form-group">
				<p>Colonia <span>*</span></p>
				<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
				<input type="text" name="adresse" id="colonia" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Adresse' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			<div class="form-group">
				<p>Codigo Postal <span>*</span></p>
				<span class="icon-case"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="postal" id="cp" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné."/>
				<div class="validation"></div>
			</div>	
			
			
			
		</div>
		
		<div class="rightcontact">	
			<div class="form-group">
				<p>Empresa <span>*</span></p>
				<span class="icon-case"><i class="fa fa-building-o"></i></span>
				<input type="text" name="society" id="empresa" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			<div class="form-group">
				<p>Departamento <span>*</span></p>
				<span class="icon-case"><i class="fa fa-home"></i></span>
				<input type="text" name="society" id="dep" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			<div class="form-group">
				<p>Cargo <span>*</span></p>
				<span class="icon-case"><i class="fa fa-info"></i></span>
				<input type="text" name="fonction" id="cargo" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Fonction' doit être renseigné."/>
				<div class="validation"></div>
			</div>
			
			<div class="form-group">
				<p>Turno <span>*</span></p>
				<span class="icon-case"><i class="fa fa-moon-o"></i></span>
				<input type="text" name="ville" id="turno" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné."/>
				<div class="validation"></div>
			</div>	
			
			<div class="form-group">
				<p>Generar Contraseña <span>*</span></p>
				<input type="button" class="btn btn-block btn-warning" onclick="generate_random()" value="generar"/> <br>
				<h3 class="col-sm-12" id="demo" align="center"></h3><br>
				<br><span class="icon-case"><i class="fa fa-key"></i></span>
				<input type="text" id="pass1" name="message" rows="14" data-rule="required"  />
				<div class="validation"></div>
			</div>	
		</div>
	</div>
	<input type="button" class="btn btn-block btn-warning" onclick="alta_empleado()" value="Registrar"/>
	
</form>	
<script src="js/registro_empleados.js"></script>


