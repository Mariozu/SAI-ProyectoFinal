<?php // session_start();
    //session_destroy(); 
    if(isset($_SESSION['Activa_server'])){
        echo "";
        header('location: adn/');
    }else{
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>SAI</title>   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="shortcut icon" href="images/reloj.png">-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">        
        <script>
            function login(){
                $.ajax({
                    type: "POST",
                    url: "funcion_validacion.php",
                    data:{
                        aceptar: "",
                        email: $("#email").val(),
                        contrasena: $("#contrasena").val()
                    }
                }).done(function(response){
                    if(response == 0){  
                       
                        $().toastmessage('showErrorToast', "USUARIO O CONTRASEÑA INCORRECTA");
                      
                    }else if(response == 1 ){
                        window.location.replace("adn/");												 
                    }else if(response == 2){
                        window.location.replace("user/");
                    }
                });
            }

        
        </script>
    </head>
    <body>
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <!--<img src="img/logo.png" style="width: 40%;">-->                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Inicia sesión en SAI</h3>
                                    <p>Ingresa tu usuario y contraseña:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
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
                                    <button type="button" class="btn" id="log" name="aceptar" onclick="login();">Entrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
           <!--TOAST MESSAGE -->
                <script type="text/javascript" src = "js/main/javascript/jquery.toastmessage.js"></script>
                <link rel="stylesheet" type="text/css" href="js/main/resources/css/jquery.toastmessage.css">             
    </body>
</html>
<?php
}
?>

<!-- Evento presionar ENTER -->
  <script type="text/javascript">
            //Bind keypress event to document
            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                   login();
                }
            });
        </script>