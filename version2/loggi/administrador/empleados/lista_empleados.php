

<body>

		
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-heading" align="center">
					<h2>Empleados</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<div class="panel-body no-padding" style="display: block;">
					<table class="table table-striped" id="t_hist">
						<thead>
							<tr class="warning">
								<th>#</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Telefono celular</th>
								<th>Clave</th>
								<th>Departamento</th>
								<th>editar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$consulta = "SELECT DISTINCT id_emp,nombre,apellido_pat,
								apellido_mat,num_celular,clave_check,departamento 
								FROM usuarios WHERE puesto != 'administrador'";
								$result=mysqli_query($con,$consulta);
								
								$i=1;
								while($reg=mysqli_fetch_array($result)){
									$id_emp=$reg["id_emp"];
									$nombre=$reg["nombre"];
									$apellido_p=$reg["apellido_pat"];
									$apellido_m=$reg["apellido_mat"];
									$celular=$reg["num_celular"];
									$clave=$reg["clave_check"]; 
									$dep=$reg["departamento"]; 
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $nombre;?></td>
									<td><?php echo $apellido_p;?></td>
									<td><?php echo $apellido_m;?></td>
									<td><?php echo $celular;?></td>
									<td><?php echo $clave;?></td>
									<td><?php echo $dep;?></td>
									<td class="col-sm-1 text-center" id="Visualizar" style="cursor: pointer;"><a onclick="editar(<?php echo $id_emp;?>);" title="editar "><i class="fa fa-pencil-square"></i></a></td>
								</tr>
							<?php $i++;}?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /#page-wrapper -->
	
		<!-- /#wrapper -->
		<!-- Nav CSS -->
	
</body>
	<script>
	$(document).ready(function() {
	$('#t_hist').DataTable();
	} );
	</script>

		