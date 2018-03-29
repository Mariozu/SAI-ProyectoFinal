<?php 
	
	require("../conexion.php");
	
	$datos_admin="SELECT * FROM usuarios WHERE id_emp='".$_SESSION["id_emp"]."'";
	$resultado=mysqli_query($con,$datos_admin);
	while($reg=mysqli_fetch_array($resultado))
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
<head>
	<script src='js/moment.min.js'></script>
	<script src='js/moment-with-locales.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/> 
</head>
<body>
	<div id="wrapper">
		<div class="graphs">
			<div class="xs">
				<div class="col-md-4 email-list1">
					<ul class="collection">
						<li class="collection-item avatar email-unread"onclick="show_panel(0);" style="cursor:pointer;">
							<i class="fa fa-users icon_1"></i>
							<div class="avatar_left">
								<span class="email-title" id="perfil">Perfil</span>
								<p class="truncate grey-text ultra-small">Configura tus datos personales</p>
							</div>
							
							<div class="clearfix"> </div>
						</li>
						<li class="collection-item avatar email-unread" onclick="show_panel(1);" style="cursor:pointer;">
							<i class="fa fa-clock-o icon_2"></i>
							<div class="avatar_left">
								<span class="email-title" id="hora">Horarios</span>
								<p class="truncate grey-text ultra-small">Configura tus horarios</p>
							</div>
							
							<div class="clearfix"> </div>
						</li>
						<li class="collection-item avatar email-unread" onclick="show_panel(2);" style="cursor:pointer;">
							<i class="fa fa-cogs icon_3"></i>
							<div class="avatar_left">
								<span class="email-title" id="c_h">Creación de horarios </span>
								<p class="truncate grey-text ultra-small">Crea y define grupos de horarios para los empleados .</p>
							</div>
							
							<div class="clearfix"> </div>
						</li>
						<li class="collection-item avatar email-unread" onclick="show_panel(3);" style="cursor:pointer;">
							<i class="fa fa-wrench icon_2"></i>
							<div class="avatar_left">
								<span class="email-title" id="config_hrs">Configuración de horarios</span>
								<p class="truncate grey-text ultra-small">Configura los grupos de horarios existentes.</p>
							</div>
							
							<div class="clearfix"> </div>
						</li>
						
					</ul>	
				</div>
				<div class="col-md-8 inbox_right" style="max-heigth:30px;" >
					
					<div class="mailbox-content" id="panel_personal" >
						<div class="mail-toolbar clearfix">							
							<div align="center" >		
								<h3> CONFIGURACIÓN PERSONAL </h3>
							</div>
						</div>
						<div class="table-responsive"style="max-height: 290px;">
							<table class="table" >
								<tbody>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Nombre
										</td>
										<td>
											<input type="text" class="form-control1 input-sm" id="nombre" value="<?php echo $nombre; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Apellido paterno
										</td>
										<td>
											<input type="text" class="form-control1 input-sm" id="ap_pat" value="<?php echo $apellido_p; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Apellido materno
										</td>
										<td>
											<input type="text" class="form-control1 input-sm" id="ap_mat" value="<?php echo $apellido_m; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Telefono celular
										</td>
										<td>
											<input type="text" class="form-control1 input-sm" id="cel" value="<?php echo $cel; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>	
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Correo electronico
										</td>
										<td>
											<input type="text" class="form-control1 input-sm" id="email"value="<?php echo $email; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Clave
										</td>
										<td>
											<input type="password" class="form-control1 input-sm" id="pass1" value="<?php echo $clave; ?>">
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											
										</td>
										<td align="center">
											<button class="btn btn-block btn-warning" onclick="save_changes('personal');"> Guardar Cambios</button>
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- COMIENZA PANEL DE HORARIOS -->
					<div class="mailbox-content" id="panel_horario">
						<div class="mail-toolbar clearfix">							
							<div align="center" >		
								<h3> MIS HORARIOS </h3>
							</div>
						</div>
						<div class="table-responsive"style="max-height: 290px;">
							<table class="table" >
								<tbody>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Entrada
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_entrada" value="<?php echo $h_entrada; ?>">
											</div> 
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_salida" value="<?php echo $h_salida; ?>">
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida a comer
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_s_comer" value="<?php echo $h_s_comer; ?>">
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Regreso despues de comer
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_e_comer"value="<?php echo $h_e_comer; ?>">
											</div>
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											
										</td>
										<td align="center">
											<button class="btn btn-block btn-warning" onclick="save_changes('horario_personal');"> Guardar Cambios</button>
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					
					<!-- COMIENZA PANEL DE GRUPO HORARIOS -->
					<div class="mailbox-content" id="panel_grupo_horario">
						<div class="mail-toolbar clearfix">							
							<div align="center" >		
								<h3> GRUPOS DE HORARIOS </h3>
							</div>
						</div>
						<div class="table-responsive"style="max-height: 290px;">
							<table class="table" >
								<tbody>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Etiqueta de horario
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="etiqueta" >
											</div> 
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Entrada
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_g_entrada" >
											</div> 
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_g_salida" >
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida a comer
										</td>
										<td>
											<div style="position: relative">
												<input  type="text" class="form-control1 input-sm" id="h_s_g_comer" >
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Regreso despues de comer
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="h_e_g_comer">
											</div>
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											
										</td>
										<td align="center">
											<button class="btn btn-block btn-warning" onclick="save_changes('grupo_horario');"> Guardar Cambios</button>
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- COMIENZA PANEL CONF GPO HORARIOS -->
					<div class="mailbox-content" id="panel_configuracion_horario">
						<div class="mail-toolbar clearfix">							
							<div align="center" >		
								<h3> CONFIGURACION DE HORARIOS </h3>
							</div>
						</div>
						<div class="table-responsive"style="max-height: 290px;">
							<table class="table" >
								<tbody>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Etiqueta de horario
										</td>
										<td>
											<div style="position: relative">
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
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Entrada
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="gpo_entrada" >
											</div> 
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="gpo_salida" >
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Salida a comer
										</td>
										<td>
											<div style="position: relative">
												<input  type="text" class="form-control1 input-sm" id="gpo_comer" >
											</div>
										</td>
										<td>
										</td>
										<td>											
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											Regreso despues de comer
										</td>
										<td>
											<div style="position: relative">
												<input type="text" class="form-control1 input-sm" id="gpo_s_comer">
											</div>
										</td>
										<td>
										</td>
										<td>												
										</td>
										
									</tr>
									
									<tr class="unread checked">
										
										<td class="hidden-xs">
											<i class="fa fa-star icon-state-warning"></i>
										</td>
										<td class="hidden-xs">
											
										</td>
										<td align="center">
											<button class="btn btn-block btn-warning" onclick="save_changes('editar_horario');"> Guardar Cambios</button>
										</td>
										<td>
										</td>
										<td>
											
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>	
</body>
<script type="text/javascript" src='js/configuracion.js'></script> 