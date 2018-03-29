<?php 

/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 29/04/16.
 * 
*Descripcion: Seccion para menu del Gerente
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
header("Content-Type: text/html;charset=utf-8");
session_start();
require("conexion.php");
if(isset($_SESSION['Activa_server'])){
    header('location: ../');
}else{
?>  
    <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>SAI</title>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!---NUEVO--->
                <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.css" rel="stylesheet" media="screen">
                <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
                <link href="bootstrap-3.3.6/dist/css/bootstrap.css" rel="stylesheet" media="screen">
                <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link href="bootstrap-3.3.6/dist/fonts/glyphicons-halflings-regular.svg" rel="stylesheet" type="text/css">
                <script src='bootstrap-3.3.6/dist/js/bootstrap.js'></script>
                <script src='bootstrap-3.3.6/dist/js/bootstrap.min.js'></script>
                <script src='bootstrap-3.3.6/dist/js/npm.js'></script>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"script>></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>                
                <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
                <!---/NUEVO--->  
                <link href="css/table-responsive.css" rel="stylesheet" type="text/css">
                
                <script type="text/javascript" src='js/update.js'></script>
                
                <link rel="shortcut icon" href="../img/calendario.ico">

                <!-- JQUERY y extenciones de JQUERY -->
                <script src='../js/js2/jquery.min.js'></script>
                <script src='../js/moment.min.js'></script>
                <script src='../js/moment-with-locales.min.js'></script>
             
                <script type="text/javascript" src='../js/tabs.js'></script>

                <!-- Esto es para las graficas no da diseño -->
                <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
                <!-- CSS Libs -->

                <link href='../dist/fullcalendar.css' rel='stylesheet' />
                <link href='../dist/fullcalendar.print.css' rel='stylesheet' media='print' />
                <link href='../dist/fullcalendar.css' rel='stylesheet' />
                <script src='../dist/fullcalendar.min.js'></script>
                <script src='../dist/lang/es.js'></script>
                <!-- Data Picker -->  
                <!-- Para agarrar tiempo en el calendario -->
                <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min.css"/>  
                <script type="text/javascript" src='../js/bootstrap-datetimepicker.min.js'></script>                
                
                <!-- Alertify css esto da las alertas -->
                <!--ESTE NO---<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
                <link rel="stylesheet" type="text/css" href="../css/alertify.css">
                <link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
                <script type="text/javascript" src="../js/alertify.js"></script>
                <script type="text/javascript" src="../js/alertify.min.js"></script>

                <!-- Para las graficas-->
                <script src="../js/highcharts.js"></script>
                <script src="../js/modules/exporting.js"></script>
                <script src="../js/highcharts-3d.js"></script>
                
                <script type="text/javascript" src = "js/evento_calendario.js"></script>
                <script type="text/javascript" src = "Imprimir.js"></script>
                <script type="text/javascript" src = "checar.js"></script>
                
                <!--TOAST MESSAGE -->
                <script type="text/javascript" src = "../js/main/javascript/jquery.toastmessage.js"></script>
                <link rel="stylesheet" type="text/css" href="../js/main/resources/css/jquery.toastmessage.css">

<script>
            function login(){
                $.ajax({
                    type: "POST",
                    url: "../funcion_validacion.php",
                    data:{
                        aceptar: "",
                        email: $("#email").val(),
                        contrasena: $("#contrasena").val()
                    }
                }).done(function(response){
                    if(response == 0){  
                       
                        $().toastmessage('showErrorToast', "USUARIO O CONTRASEÑA INCORRECTA");
                      
                    }else if(response == 1 ){
                        window.location.replace("../adn/");												 
                    }
                });
            }

        
        </script>
<style>
                    #navbar-darkblue.navbar-default { /* #003399 - #0033cc */
    font-size: 14px;
    background-color: rgba(24, 162, 199, 1);
    background: -webkit-linear-gradient(top, rgba(24, 162, 199, 1) 0%, rgba(24, 162, 199, 1) 100%);
    background: linear-gradient(to bottom, rgba(24, 162, 199, 1) 0%, rgba(24, 162, 199, 1) 100%);
    border: 0px;
	border-radius: 0;
}
#navbar-darkblue.navbar-default .navbar-nav>li>a:hover,
#navbar-darkblue.navbar-default .navbar-nav>li>a:focus,
#navbar-darkblue.navbar-default .navbar-nav>li>ul>li>a:hover, 
#navbar-darkblue.navbar-default .navbar-nav>li>ul>li>a:focus, 
#navbar-darkblue.navbar-default .navbar-nav>.active>a,
#navbar-darkblue.navbar-default .navbar-nav>.active>a:hover,
#navbar-darkblue.navbar-default .navbar-nav>.active>a:focus {  
	color: rgba(51, 51, 51, 1);
    background-color: rgba(255, 255, 255, 1);
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
}
#sidebar-darkblue, #column-darkblue {
	background-color: #333399;
}
#navbar-darkblue.navbar-default .navbar-toggle {
    border-color: #333399;
}
#navbar-darkblue.navbar-default .navbar-toggle:hover,
#navbar-darkblue.navbar-default .navbar-toggle:focus {
    background-color: #158DAD;
}
#navbar-darkblue.navbar-default .navbar-nav>li>a,
#navbar-darkblue.navbar-default .navbar-nav>li>ul>li>a, 
#navbar-darkblue.navbar-default .navbar-brand {
    color: #000; 
}
#navbar-darkblue.navbar-default .navbar-toggle .icon-bar,
#navbar-darkblue.navbar-default .navbar-toggle:hover .icon-bar,
#navbar-darkblue.navbar-default .navbar-toggle:focus .icon-bar {
    background-color: #000; 
}
                </style>
            </head>
            <body style="background-color: #EBF7FA;">
                
                <nav id="navbar-darkblue" class="navbar navbar-default navbar-fixed-top">                    
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                            <a class="navbar-brand" href="index.php"><img alt="Brand" src="../img/sai.png" style="width: 110px; height:25px; margin-top:-4px;"></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                           <ul class="nav navbar-nav">
                                            
                            <li class="dropdown">
                              <a href="#checador" class="dropdown-toggle" data-toggle='modal'><i class="fa fa-clock-o" aria-hidden="true"></i> Marcar entrada </a>
             
                            </li>
                            <li class="dropdown">
                              <a href="#checador" class="dropdown-toggle" data-toggle='modal'><span id="liveclock2" style="margin-left: 20%;" ></span>  </a>
                              <input type="hidden"  id="liveclock3"> 
                            </li>
                            
                          </ul>           
                          <ul class="nav navbar-nav navbar-right">
                            <li>
                                
                            </li>                            
                            
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                  <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                 <li><a href="#logout" data-toggle='modal'><i class="fa fa-power-off"></i> Iniciar Sesion</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>                   
                
                <!--<div class = "container" >-->
                <div class="container-fluid" style="margin-top: 77px;">
                    <?php
                        if (isset($_REQUEST['opc'])){//la funcion llamar que obtiene de la redireccion del menu lateral carga una pagina de las opciones
                            $llamar = $_REQUEST['opc'];
                            switch ($llamar){
                                
                                case 10 : include("logout.php");break;   
                                
                            }
                        }else{include("herramientas/calendario.php");} 
                    ?>      
                    <div id="logout" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Iniciar Sesion</h4>
                                </div>
                                <div class="modal-body" align = "center">
                                    <!-- Modal Body -->
                                    <!-- Add datos -->
                                    <div class="form-bottom">
                                        <form role="form" action="" method="post" class="login-form">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-username">Usuario</label>
                                                <input type="text" name="email" placeholder="Usuario" class="form-username form-control" id="email" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="form-password">Contraseña</label>
                                                <input type="password" name="contrasena" placeholder="Contraseña" class="form-password form-control" id="contrasena" required="">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-horizontal">
                                        
                                        <div class = "row" align = "center">
                                            <button type="button" class="btn btn-primary" id="log" name="aceptar" onclick="login();">Entrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>                              
                                        </div>
                                    </div>
                                <!-- Modal Body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->
                    <!-- MODAL -->
                    <div id="checador" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Marcar Entrada</h4>
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
                                                <input type="text" class="form-control" id="contra" name="contra" value="">
                                            </div>
                                            <button type="button" class="btn btn-danger" onclick="checador();" data-dismiss="modal">aceptar</button>                              
                                        </div>
                                    </div>
                                <!-- Modal Body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#Fecha_inicial').datetimepicker({format: 'DD-MM-YYYY'});
                        $('#Fecha_final').datetimepicker({format: 'DD-MM-YYYY'});
                    });
                </script>  
                <script type="text/javascript" src = "js/reloj.js"></script>
                
            </body>
        </html>            
<?php
    }