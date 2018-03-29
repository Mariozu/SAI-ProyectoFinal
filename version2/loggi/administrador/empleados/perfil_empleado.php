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
		<script src="js/Chart.js"></script>
		
	</head>
	<body>
		<div id="wrapper">
			
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				
				<div class="panel-heading" align="center">
					<h2>Empleados</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<br>
				
				<div class="col-md-4 widget_1_box1"style="">
					<div class="coffee">
						<div class="coffee-top">
							<a href="#"><img class="img-responsive" src="images/pic4.jpg" alt="">
								<div class="doe">
									<h6>Miguel Martinez</h6>
									<p>Desarrollador Web</p>
								</div>
							<i></i></a>
						</div>
						<div class="follow">
							<div class="col-xs-4 two">
								<p>Nacionalidad</p>
								<span>Mexicano</span>
							</div>
							<div class="col-xs-4 two">
								<p>Edad</p>
								<span>23 años</span>
							</div>
							<div class="col-xs-4 two">
								<p>Estudios</p>
								<span>UAS</span>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div><br>
				</div>					
				<div class="col-md-4 grid_2" style="margin-left:20%;"><div class="grid_1">
					<h3>Line</h3>
					<canvas id="line" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
				</div></div>
				<div class="panel-body no-padding table"  style="display: block;">
					<table class="table table-striped" id="t_hist">
						<thead>
							<tr class="warning">
								<th>#</th>  
								<th>Nombre</th>
								<th>Departamento</th>
								<th>Turno</th>
								<th>Fecha</th>
								<th>Hora de entrada</th>
								<th>Hora de Salida</th>
								<th>Horas trabajadas</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
								$id_empleado=$_GET["ver"];
								$consulta = "SELECT turno,hora_entrada,hora_salida,fecha,nombre,apellido_mat,apellido_pat,departamento 
								FROM checador JOIN usuarios WHERE usuarios.id_emp='".$id_empleado."' AND checador.id_user='".$id_empleado."' ";
								$result=mysqli_query($con,$consulta);
								$horastr = [];
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
									$hr_entrada= explode(":", $entrada);
									$hr_salida= explode(":", $salida);
									$horas_trabajadas= $hr_salida[0] - $hr_entrada[0];
									$horastr=[$horas_trabajadas];
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $nombre." ".$apellido_p." ".$apellido_m;?></td>
									<td><?php echo $departamento;?></td>
									<td><?php echo $turno;?></td>
									<td><?php echo $fecha;?></td>
									<td><?php echo $entrada;?></td>
									<td><?php echo $salida;?></td>
									<td align="center"><?php echo $horas_trabajadas;?></td>
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
	<script>
	//var horas = <?php echo $horastr ?>;
	var hr=[6,7,8,9];
	console.log(horas);
		var lineChartData = {
			labels : ["","","","","","",""],
			datasets : [
			{
				fillColor : "#00aced",
				strokeColor : "#00aced",
				pointColor : "#00aced",
				pointStrokeColor : "#fff",
				data : hr
			}
			]
			
		};				
		new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
				
	</script>
</html>
