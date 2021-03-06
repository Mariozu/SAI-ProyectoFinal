<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Basic_tables :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
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
	<body>
		<div id="wrapper">
		<div class="col-sm-12" style="background: url(images/9.jpg) no-repeat center center fixed;height: 500px ;">
		
		</div>
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static=""style="display: none;">
				<div class="panel-heading" align="center">
					<h2>Empleados</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<div class="panel-body no-padding table"  style="display: block;">
					<table class="table table-striped" id="t_hist">
						<thead>
							<tr class="warning">
								<th>#</th>  
								<th>Nombre</th>
								<th>Departamento</th>
								<th>turno</th>
								<th>Fecha</th>
								<th>Hora de entrada</th>
								<th>Hora de Salida</th>
								
								
							</tr>
						</thead>
						<tbody>
							<?php 
								$consulta = "SELECT turno,hora_entrada,hora_salida,fecha,nombre,apellido_mat,apellido_pat,departamento 
								FROM checador JOIN usuarios WHERE usuarios.id_emp=checador.id_user";
								$result=mysqli_query($con,$consulta);
								
								$i=1;
								while($reg=mysqli_fetch_array($result)){
									$nombre=$reg["nombre"];
									$apellido_p=$reg["apellido_pat"];
									$apellido_m=$reg["apellido_mat"];
									$turno=$reg["turno"];
									$entrada=$reg["hora_entrada"]; 
									$salida=$reg["hora_salida"]; 
									$fecha=$reg["fecha"]; 
									$departamento=$reg["departamento"]; 
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $nombre." ".$apellido_p." ".$apellido_m;?></td>
									<td><?php echo $departamento;?></td>
									<td><?php echo $turno;?></td>
									<td><?php echo $fecha;?></td>
									<td><?php echo $entrada;?></td>
									<td><?php echo $salida;?></td>
								</tr>
							<?php $i++;}?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
		<!-- Nav CSS -->
		<link href="css/custom.css" rel="stylesheet">
		<!-- Metis Menu Plugin JavaScript -->
		<script src="js/metisMenu.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	<script>
		$(document).ready(function() {
			$('#t_hist').DataTable();
		} );
	</script>
</html>
