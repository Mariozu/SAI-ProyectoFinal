<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>SAI</title>
		<link rel="shortcut icon" href="images/logoChecador.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="css/lines.css" rel='stylesheet' type='text/css' />
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!---//webfonts--->  
		<!-- Nav CSS -->
		<link href="css/custom.css" rel="stylesheet">
		<!-- Metis Menu Plugin JavaScript -->
		<script src="js/metisMenu.min.js"></script>
		<script src="js/custom.js"></script>
		<!-- Graph JavaScript -->
		<script src="js/d3.v3.js"></script>
		<script src="js/rickshaw.js"></script>
		<link type="text/css" rel="stylesheet" href="css/toastr/toastr.css?1425466569" />
		<script src="js/checar.js"></script>
		<script src="js/contacto.js"></script>
		<?php
			require('conexion.php');
			$empleados=mysqli_query($con,"SELECT * FROM usuarios WHERE puesto != 'administrador'");
		?>
		
	</head>
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" onclick="loggi()" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a href="index.php">
						<img src="images/logosai.png" alt="Logo">
					</a>
					
					
					
				</div>
				<!-- /.navbar-header -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" style="display:none">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-header" >
								<strong>Messages</strong>
								<div class="progress thin">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							</li>
							<li class="avatar">
								<a href="#">
									<img src="images/1.png" alt=""/>
									<div>New message</div>
									<small>1 minute ago</small>
									<span class="label label-info">NEW</span>
								</a>
							</li>
							
							
							
							<li class="dropdown-menu-footer text-center">
								<a href="#">View all messages</a>
							</li>	
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"></a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-header text-center">
								
								<li class="dropdown-menu-header text-center">
									<strong>Configuración</strong>
								</li>
								
								
								<li class="m_2"><a href="loggi/index.html"><i class="fa fa-shield"></i> Iniciar administrador</a></li>
								<li style="display:none" class="m_2"><a href="acerca/historia.php"><i class="fa fa-wrench" ></i> Acerca de SAI </a></li>	
							</ul>
						</li>
					</ul>
					
					<div class="navbar-default sidebar" role="navigation" style="display:none">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a href="index.html"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-laptop nav_icon"></i>Layouts<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="grids.html">Grid System</a>
										</li>
									</ul>
									<!-- /.nav-second-level -->
								</li>
								<li>
									<a href="#"><i class="fa fa-indent nav_icon"></i>Menu Levels<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="graphs.html">Graphs</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>
									<!-- /.nav-second-level -->
								</li>	
							</ul>
						</div>
						<!-- /.sidebar-collapse -->
					</div>
					<!-- /.navbar-static-side -->
				</nav>
				<div id="page-wrapper">
					<div class="graphs">
						<div class="col_3" style="margin-left: 23%;">
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i href="#checador"  data-toggle='modal' class="pull-left fa fa-clock-o icon-rounded"></i>
									<div class="stats">
										<h5 id="liveclock2"><strong></strong></h5>
										<span > Entrada/salida</span>
										<input type="hidden"  id="liveclock3"> 
									</div>
								</div>
							</div>
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i class="pull-left fa fa-users user1 icon-rounded"></i>
									<div class="stats">
										<h5><strong><?php echo mysqli_num_rows($empleados); ?></strong></h5>
										<span>Empleados</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i href="#modal-mensaje"  data-toggle='modal' class="pull-left fa fa-comment user2 icon-rounded"></i>
									<div class="stats">
										<h5><strong>TIM</strong></h5>
										<span>Mensajeria</span>
									</div>
								</div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						<div class="col_1">
							<div class="col-md-4 span_7">	
								<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
							</div>
							<div class="col-md-4 span_8">
								<div class="activity_box">
									<div class="scrollbar" id="style-2">
										<?php 
											
											
											$consulta="SELECT * FROM eventos JOIN usuarios WHERE usuarios.id_emp=id_usuario";
											$resultado=mysqli_query($con,$consulta);
											$i=1;
											while($lista=mysqli_fetch_array($resultado))
											{
												
												$fecha=$lista['start'];	
												$nombre_admin=$lista['nombre'];
												$titulo=$lista['title'];
												$desc=$lista['descripcion'];
											?>
											<div onclick="show_event('<?php echo $lista['title'] ?>','<?php echo $lista['nombre'] ?>','<?php echo $lista['descripcion'] ?>','<?php echo $lista['start'] ?>')"  class='activity-row'>
												<div class='col-xs-1'><i class='fa fa-thumbs-up text-info icon_13'> </i>  </div>
												<div class='col-xs-3 activity-img'><img src='images/5.png' class='img-responsive' alt=''/></div>
												<div class='col-xs-8 activity-desc'>
													
													<h5><a href='#'><?php echo $nombre_admin; ?></a> a agregado un evento</h5>
													<p><?php echo $titulo; ?></p>
													<h6><?php echo $fecha; ?></h6>	
												</div>
												<div class='clearfix'> </div>
											</div>
										<?php $i++;}?>
									</div>
								</div>
							</div>
							
							<div class="col-md-4 stats-info">
								
								<div class="panel-heading">
									<h4 class="panel-title">Control de empleados</h4>
								</div>
								
								<div class="panel-body">
									<div class="scrollbar" id="style-2"> 
										<ul class="list-unstyled">
											<?php 	
												$consulta="SELECT nombre,apellido_mat,apellido_pat,departamento,entro 
												FROM usuarios WHERE puesto !='administrador'";
												$resultado=mysqli_query($con,$consulta);
												$i=1;
												while($lista=mysqli_fetch_array($resultado))
												{											
													
													$nombre_completo=$lista['nombre']." ".$lista['apellido_pat']." ".$lista['apellido_mat'];
													$departamento=$lista['departamento'];
													$status=$lista['entro'];
												?>
												
												
												<li><?php echo $nombre_completo ?><?php if($lista['entro']=='1'){ echo "<div class='text-success pull-right'>Trabajando <i class='fa fa-level-up'></i></div>"; }else { echo "<div class='text-danger pull-right'>En casa <i class='fa fa-level-down'></i></div>";} ?></li>
												
											<?php $i++;}?>
										</ul>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="span_11">
							<div class="col-md-6 col_4">
								
								<!----Calender -------->
								<link rel="stylesheet" href="css/clndr.css" type="text/css" />
								<script src="js/underscore-min.js" type="text/javascript"></script>
								<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
								<script src="js/clndr.js" type="text/javascript"></script>
								<script src="js/site.js" type="text/javascript"></script>
								<!----End Calender -------->
							</div>
							
							
							<script>
								
								var seriesData = [ [], [], [], [], [] ];
								var random = new Rickshaw.Fixtures.RandomData(50);
								
								for (var i = 0; i < 75; i++) {
									random.addData(seriesData);
								}
								
								var graph = new Rickshaw.Graph( {
									element: document.getElementById("chart"),
									renderer: 'multi',
									
									dotSize: 5,
									series: [
									{
										name: 'temperature',
										data: seriesData.shift(),
										color: '#AFE9FF',
										renderer: 'stack'
										}, {
										name: 'heat index',
										data: seriesData.shift(),
										color: '#FFCAC0',
										renderer: 'stack'
										}, {
										name: 'dewpoint',
										data: seriesData.shift(),
										color: '#555',
										renderer: 'scatterplot'
										}, {
										name: 'pop',
										data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y / 4 } }),
										color: '#555',
										renderer: 'bar'
										}, {
										name: 'humidity',
										data: seriesData.shift().map(function(d) { return { x: d.x, y: d.y * 1.5 } }),
										renderer: 'line',
										color: '#ef553a'
									}
									]
								} );
								
								
								graph.render();
								
								var detail = new Rickshaw.Graph.HoverDetail({
									graph: graph
								});
							</script>
							
							
							
						</div>
						
						
						<div class="copy">
							<p>Copyright &copy; 2016 Tecnologia Informatica Movil </p>
						</div>
					</div>
				</div>
				<!-- /#page-wrapper -->
			</div>
			<div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content" style="border:1px solid #242a31;">
						<div class="modal-header" style="background-color: #242a31;">
							<button type="button" class="close" data-dismiss="modal" style="color: rgb(255, 255, 255);" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="simpleModalLabel" align="center" style="color: white;">
								<center>
									<h3>Dejanos tu mensaje</h3>
								</center>
							</h4>
						</div>
						<div class="modal-body">
							
							
							<span align="left"><b>Asunto: </b></span>    <span align="center" id="asunto_span_index"></span><input type="text" style="border: 1px solid #000 !important;" class="form-control" id="asunto_mensaje" name="asunto_mensaje" value="">  <br>	
							<span align="left"><b>Mensaje: </b></span> 
							<textarea class="form-control"style="border: 1px solid #000 !important;" id="mensaje_sai"></textarea><br>
							<div class="form-group" align="center">
								<label>
									<input type="checkbox" id="si_enviar" name="terms1" required>
									<span>Si enviar el mensaje</span>
								</label>
							</div>
						</div>
						
						<div class="modal-footer">
							
							<button type="button" class="btn ink-reaction btn-raised btn-default" onclick="send_mail()"  style="margin-bottom: 0px;">Responder</button>
							<button type="button" class="btn ink-reaction btn-raised btn-default" data-dismiss="modal" style="margin-bottom: 0px;">Cerrar</button>
							
						</div>
					</div>
				</div>
			</div>
			
			<div id="checador" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm">
					<!-- Modal content-->
					<div class="modal-content" >
						<div class="modal-header" align="center" style="background-color:#06D995">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color:#fff">Marcar Entrada</h4>
						</div>
						<div class="modal-body" align = "center">
							<!-- Modal Body -->
							<!-- Add datos -->
							<div class="form-horizontal">
								<div>
									<span id="liveclock"  ></span>
								</div>
								<div class = "row" align = "center">
									
									<div class="col-sm-8" >
										
										<input type="password" style="border: 1px solid #06D995 !important;;" class="form-control" id="contra" name="contra" value="">
									</div>
									<button type="button" class="btn btn-primary" onclick="checador();" data-dismiss="modal">aceptar</button>                              
								</div>
							</div>
							<!-- Modal Body -->
							<script type="text/javascript">
								//Bind keypress event to document
								$(document).keypress(function(event)
								{
									var keycode = (event.keyCode ? event.keyCode : event.which);
									if(keycode == '13')
									{
										checador();
									}
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="modal-evento" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content" style="border:1px solid rgb(6, 217, 149);">
						<div class="modal-header" style="background-color: rgb(6, 217, 149);">
							<button type="button" class="close" data-dismiss="modal" style="color: rgb(255, 255, 255);" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="simpleModalLabel" align="center" style="color: white;">
								<center>
									<h3>Evento</h3>
								</center>
							</h4>
						</div>
						<div class="modal-body">
							
							<div class="col-md-12 widget_1_box2">
								<div class="wid_blog">
									<h1 id="event_title" ></h1>
								</div>
								<div class="wid_blog-desc">
									<div class="wid_blog-left">
										<img src="images/1.png" class="img-responsive" alt="">
									</div>
									<div class="wid_blog-right">
										<h2 id="adm-event"></h2>
										<p id="event_desc"></p>
										<ul class="list-unstyled list-inline">
											<li><a  class="text-muted"><strong> Fecha para el evento : </strong></a><a href="#" class="text-muted" id="event-fecha"></a></li>
											
										</ul>
									</div>											
								</div>
							</div>									
						</div>								
						<div class="modal-footer">
							
							<button type="button" class="btn ink-reaction btn-raised btn-default" data-dismiss="modal" style="margin-bottom: 0px;">Cerrar</button>
							
						</div>
					</div>
				</div>
			</div>
			
			<!-- /#wrapper -->
			<!-- Bootstrap Core JavaScript -->
			<script src="js/toastr/toastr.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
<script type="text/javascript" src = "js/reloj.js"></script>																																																																																																																																																											