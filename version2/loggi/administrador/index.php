<?php 
	
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
	header("Content-Type: text/html;charset=utf-8");
	if(isset($_SESSION['Activa_server'])){ 
		require("../conexion.php");
		$nombre_administrador=$_SESSION['nombre'];
		$Ids = $_SESSION['id_emp'];
	?> 
	<!DOCTYPE HTML>
	<html>
		<head>
			<title>SAI</title>
			<link rel="shortcut icon" href="images/logoChecador.ico">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="keywords" content="TIM" />
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
			<link type="text/css" rel="stylesheet" href="css/DataTables/jquery.dataTables.css?1423553989" />
			<link type="text/css" rel="stylesheet" href="css/DataTables/extensions/dataTables.colVis.css?1423553990" />
			<link type="text/css" rel="stylesheet" href="css/DataTables/extensions/dataTables.tableTools.css?1423553990" />
			<script src='js/moment.min.js'></script>
			<script src='js/moment-with-locales.min.js'></script>
			<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"/>  
			<script type="text/javascript" src='js/bootstrap-datetimepicker.min.js'></script> 
			
			
			<script src="https://use.fontawesome.com/5ea650e6dc.js"></script>
			
			<script src="js/d3.v3.js"></script>
			<script src="js/rickshaw.js"></script>
			
			<link type="text/css" rel="stylesheet" href="css/toastr/toastr.css?1425466569" />
		</head>
		<body>
			
			<?php include("../conexion.php");
				$empleados=mysqli_query($con,"SELECT * FROM usuarios WHERE puesto != 'administrador'"); 
			?>
			<div id="wrapper">
				<!-- Navigation -->
			<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">SAI</a>
			</div>
			<!-- /.navbar-header -->
			<ul class="nav navbar-nav navbar-right">
			<li class="dropdown"style="display:none">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
			<ul class="dropdown-menu" >
			
			<li class="dropdown-menu-header">
			<strong>Messages</strong>
			<div class="progress thin">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			<span class="sr-only">40% Complete (success)</span>
			</div>
			</div>
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
			<strong><p><?php echo $nombre_administrador; ?></p></strong>
			</li>
			<li class="m_2" style="display:none"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
			<li class="m_2" onclick="logout()" ><a href="#"><i class="fa fa-lock"></i> Cerrar sesion</a></li>	
			</ul>
			</li>
			</ul>
			
			<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
			<li>
			<a href="index.php"><i class="fa fa-hourglass-half nav_icon"></i>Inicio</a>
			
			<!-- /.nav-second-level -->
			</li>
			<li>
			<a href="#"><i class="fa fa-user nav_icon"></i>Empleados<span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
			<li>
			<a href="?opc=2">Lista de empleados</a>
			</li>
			<li>
			<a href="?opc=3">Registrar empleados</a>
			</li>
			</ul>
			<!-- /.nav-second-level -->
			</li>
			
			<li>
			<a href="#"><i class="fa fa-laptop nav_icon"></i>Checador<span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
			<li>
			<a href="?opc=4">Entradas y Salidas</a>
			</li>
			<li>
			<a href="?opc=5" style="display:none;">Listado de Retardos</a>
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
			<div id="page-wrapper" style="background: rgb(242, 244, 248) none repeat scroll 0% 0%;">
			<div class="graphs">
			<?php
			if (isset($_GET['opc']))
			{
			$llamar = $_GET['opc'];
			switch ($llamar)
			{				
			case 2:include("empleados/lista_empleados.php");break;
			case 3:include("empleados/agregar_empleado.php");break;
			case 4:include("checador/historial.php");break;
			case 5:include("checador/retardos.php");break;
			case 6:include("empleados/editar.php");break;
			case 7:include("configuracion/configuracion.php");break;
			case 8:include("empleados/perfil_empleado.php");break;
			default:include("404.php");break;
			}
			}
			else
			{
			?>
			<div class="col_3"  >
			<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
			<i href="#checador"  data-toggle='modal' class="pull-left fa fa-clock-o icon-rounded"></i>
			<div class="stats">
			<h5 id="liveclock2"><strong></strong></h5>
			<span>Entrada/salida</span>
			<input type="hidden"  id="liveclock3"> 
			</div>
			</div>
			</div>
			<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
			<i class="pull-left fa fa-users user1 icon-rounded"></i>
			<div class="stats">
			<h5><strong><?php echo mysqli_num_rows($empleados); ?></strong></h5>
			<span>Disponibles</span>
			</div>
			</div>
			</div>
			<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
			<i href="#anuncia-evento"  data-toggle='modal' class="pull-left fa fa-pencil user2 icon-rounded"></i>
			<div class="stats">
			<h5><strong><?php echo $_SESSION['empresa']; ?></strong></h5>
			<span>Anuncia un evento</span>
			</div>
			</div>
			</div>
			<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
			<i  onclick="config();" class="pull-left fa fa-cogs user3 icon-rounded"></i>
			<div class="stats">
			<h5><strong>Configuración</strong></h5>
			<span>Configura tu perfil</span>
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
			<div class="col-md-4 stats-info3">
			
			<div class="scrollbar" id="style-2">
			<div class="col-sm-12" align="center">
			<h4 class="panel-title">Control de empleados</h4>
			</div>
			<br>
			<div class="online">
			<?php 
			$consulta = "SELECT * FROM usuarios WHERE puesto != 'administrador';";
			$result=mysqli_query($con,$consulta);
			
			$i=1;
			while($reg=mysqli_fetch_array($result)){
			$nombre=$reg["nombre"];
			$apellido_p=$reg["apellido_pat"];
			$apellido_m=$reg["apellido_mat"];
			$id_emp=$reg["id_emp"];													
			$dep=$reg["departamento"]; 
			?>
			<a onclick="perfil_empleado('<?php echo $id_emp; ?>')"><div class="online-top">
			<div class="top-at">
			<img class="img-responsive" src="images/2.png" alt="">
			</div>
			<div class="top-on">
			<div class="top-on1">
			<p><?php echo $dep; ?></p>
			<span><?php echo $nombre." ".$apellido_p." ".$apellido_m; ?></span>
			</div>
			<!--<label class="round"> </label>-->
			<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			</div></a>
			
			<?php $i++;}?>
			
			</div>
			</div>
			<div class="clearfix"> </div>
			</div>
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
			
			<div class="clearfix"> </div>
			</div>
			
			<div class="copy">
			<p>Copyright &copy; 2016 Tecnologia Informatica Movil </p>
			</div>
			
			
			<div class="modal fade" id="modal-evento" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content" style="border:1px solid rgb(239, 95, 89);">
			<div class="modal-header" style="background-color: rgb(239, 95, 89);">
			<button type="button" class="close" data-dismiss="modal" style="color: rgb(255, 255, 255);" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="simpleModalLabel" align="center" style="color: white;">
			<center>
			<h3>Evento</h3>
			</center>
			</h4>
			</div>
			<div class="modal-body">
			
			<div class="col-md-12 widget_1_box2">
			<div class="wid_blog"style="background-color: rgb(239, 95, 89);">
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
			
			
			<div class="modal fade" id="anuncia-evento" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content" style="border:1px solid rgb(239, 95, 89);">
			<div class="modal-header" style="background-color: rgb(239, 95, 89);">
			<button type="button" class="close" data-dismiss="modal" style="color: rgb(255, 255, 255);" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="simpleModalLabel" align="center" style="color: white;">
			<center>
			<h3>Evento</h3>
			</center>
			</h4>
			</div>
			<div class="modal-body" class="col-md-12 widget_1_box2">									
			
			<div class="wid_blog"style="background:rgb(239, 95, 89) !important;">
			<h1>Titulo del evento</h1>
			<input type="text" id="titulo_publicasion"  class="form-control" style="color:white;border: 1px solid rgb(255, 255, 255) !important;"/> 
			</div>
			<div class="wid_blog-desc">
			<div class="wid_blog-left">
			<img src="images/1.png" class="img-responsive" alt="">
			</div>
			
			<div class="wid_blog-right" >
			<ul class="list-unstyled list-inline">
			<li><a onclick="show_calendar();" class="text-muted"><strong> Fecha : </strong></a><a id="fecha_encabezado" onclick="show_calendar();" style="cursor:pointer" class="text-muted"><?php $dt = new DateTime(); echo $dt->format('Y-m-d H:i:s');?></a></li>
			<div class="form-group">
			<input id="fech2" class="form-control" onclick="pass_date()" style="border: 1px solid rgb(239, 95, 89) !important;" />
			</div>
			</ul>
			<h2><?php echo $nombre_administrador; ?></h2>
			<textarea type="text" id="desc_publicasion" class="form-control" style="border: 1px solid rgb(239, 95, 89) !important; resize:none;"> </textarea> 
			
			</div>
			<div class="clearfix"> <br> <br></div>
			</div>
			
			</div>								
			<div class="modal-footer">	
			<button type="button" class="btn ink-reaction btn-raised btn-default" style="margin-bottom: 0px;" onclick="subir_evento()" >Publicar</button>	
			<button type="button" class="btn ink-reaction btn-raised btn-default" data-dismiss="modal" style="margin-bottom: 0px;">Cerrar</button>										
			</div>
			</div>
			</div>
			</div>
			
			
			
			<?php 
			}
			?>
			</div>
			</div>
			<!-- /#page-wrapper -->
			</div>
			<!-- /#wrapper -->
			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>
			<script src="js/toastr/toastr.js"></script>
			<script src="js/checar.js"></script>
			<script src="js/funciones_agregar.js"></script>
			<script type="text/javascript" src = "js/reloj.js"></script>
			<script src="js/DataTables/jquery.dataTables.min.js"></script>
			<script src="js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
			<script src="js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
			
			<script type="text/javascript">
			$(document).ready(function(){$("#fech2").hide();});
			
			$(function () {
			$('#fech2').datetimepicker({
			format: 'DD-MM-YYYY'
			});
			});
			
			function show_calendar()
			{
			$( "#fech2" ).fadeIn( "slow" );
			
			}
			function pass_date()
			{
			console.log($("#fech2").val());
			$("#fecha_encabezado").text($("#fech2").val());
			
			}
			</script>
			</body>
			<div id="checador" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content" >
			<div class="modal-header" align="center" style="background-color:rgb(239, 95, 89)">
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
			
			<input type="password" style="border: 1px solid rgb(239, 95, 89) !important;" class="form-control" id="contra" name="contra" value="">
			</div>
			<button type="button" class="btn btn-danger" onclick="checador();" data-dismiss="modal">aceptar</button>                              
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
			
			<div id="logout" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content" >
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">¿Esta seguro de cerrar sesión?</h4>
			</div>
			<div class="modal-body" align = "center">
			<!-- Modal Body -->
			<!-- Add datos -->
			<div class="form-horizontal">
			<div class = "row" align = "center">
			<a href = "logout.php"><button type="button" class="btn btn-primary">Aceptar</button></a>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>                              
			</div>
			</div>
			<!-- Modal Body -->
			</div>
			</div>
			</div>
			</div>
			
			</html>
			<?php
			}else{
			header('location: ../index.php');
			}
			?>																																									