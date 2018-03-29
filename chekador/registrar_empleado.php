<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 29/04/16.
 * 
*Descripcion: Formulario para el resgitro de nuevos desarrolladores.
 * 
*Variables Globales: 
 * 
*Metodos: Valida(), sirve para validar el contenido de los campos 
 * y no permitir los caracteres rentringidos en los campos 
 * numericos.
 * 
*
*******************************************************************/
?>
<script type="text/javascript">
		$(window).load(function(){
			$('#es').change(function(){
				var nom_estado=$('#es').val();
				$('#mu').load('funcion_estado.php?nom_estado='+nom_estado);
				$('#mu').focus();
			});    
		}); 
	</script>
<script>
function myFunction() {
    var x = document.getElementById("demo")
    x.innerHTML = Math.floor((Math.random() * 1000000) + 1);

$("#pass1").val(x.innerHTML); $("#pass2").val(x.innerHTML);


}
function myUser(email) {
    var separador = email.split('@');
    var y=separador[0];
    
    $("#user").val(y);
}

function enfoco(){

   var x = document.getElementById("demo")
   x.innerHTML = ""; 
  $("#pass1").val(x.innerHTML); $("#pass2").val(x.innerHTML);
}

            //Bind keypress event to document
            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                   registrame();
                }
            });
    
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		$('#email').blur(function(){ /*mediante este evento se sabe si el email  ya se encuentra registrado*/
			
			$('#Info').html('<img src="loading.gif" alt="" />').fadeOut(1000); /* */

			var email = $(this).val();		
			var dataString = 'email='+email;
			var changue = $("#email").val();
                        myUser(email);
			$.ajax({
				type: "POST",
				url: "funciones/check_email.php",
				data: dataString,
				success: function(data) {
					$('#Info').fadeIn(1).html(data);
					
                   

                    if(data == "<div id='Error'><h4 style = 'color:red;'>CORREO NO DISPONIBLE!</h4></div>"){
                     $("#email").val("");
                     $("#email").attr("placeholder", changue).placeholder();
                    }else if(data == "<div id='Error'><h4 style = 'color:red;'>CORREO NO VALIDO! </h4></div>"){
                     $("#email").val("");
                      $("#email").attr("placeholder", changue).placeholder();
                    }


				}
			});
		});              
	});    
</script>

<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8 ){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function registrame(){

var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
var celular = $("#lada").val() + "-" + $("#inputNumero").val();
var telto = $("#lada2").val() + "-" + $("#inputNumero2").val();
if($.trim(pass1).length && $.trim(pass2).length && $.trim(celular).length && $.trim(telto).length){
  if(pass1 == pass2 ){



                            $.ajax({
                                    type: "POST",
                                    url: "funciones/funcion_registrar_empleado.php",
                                    data: {
                                            nombre: $("#nombre").val(),
                                            apellidop: $("#apellidop").val(),
                                            apellidom: $("#apellidom").val(),
                                            user: $("#user").val(),
                                            cargo: $("#cargo").val(),
                                            dep: $("#dep").val(),
                                            calle: $("#ca").val(),
                                            estado: $("#es").val(),
                                            municipio: $("#mu").val(),
                                            colonia: $("#co").val(),
                                            cp: $("#inputNumero1").val(),
                                            email: $("#email").val(),
                                            cel: celular,
                                            tel: telto,
                                            contrasena: $("#pass1").val(),
                                            clave:$("#pass2").val(),
                                    }
                            }).done(function(response){
                                    if(response==1){
                                        $().toastmessage('showSuccessToast', "EMPLEADO AGREGADO CON EXITO!"); 
                                        setTimeout('location.reload(true)',1500);
                                    }else{
                                        console.log(response);
                                    }
        
                            });

          

    }else{

$().toastmessage('showErrorToast', "¡LAS CONTRASEÑAS NO COINCIDEN!.");
 }

}else{

   $().toastmessage('showErrorToast', "HAY CAMPOS VACIOS!");

}



}
</script>


    
<!--  General -->
<form action=""  name="customForm" id="customForm" method="POST">
    <div class="box">
        <div class="form-group">
            <h2 class="heading" >Registro de Empleado:</h2>

            <br><br><br>

            <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Nombre(s):</label>
                <div class="col-sm-8">
                    <input type="text" name="nombre" id="nombre" class="form-control"  value="" maxlength="30" required >               
                </div>
            </div>    
            <br><br>
            <div class="form-group">
                <label for="apellidop" class="col-sm-2 control-label">Apellido Paterno:</label>
                <div class="col-sm-8">
                <input type="text" name="apellidop" id="apellidop" class="form-control" value="" maxlength="20" required >    
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="apellidom" class="col-sm-2 control-label">Apellido Materno:</label>
                <div class="col-sm-8">
                <input type="text" name="apellidom" class="form-control" id="apellidom"  value="" maxlength="20" required >        
                </div>
            </div>
            <br><br>
                    <div class="form-group" >

                      <label for="cel" class="col-sm-2 control-label">Telefono Celular:</label>
                                  <div class="col-sm-2">
                                        <input type="text" name="car" class="form-control" placeholder="lada" maxlength="2"  required  id="lada" onkeypress="return valida(event)"/>
                                  </div>    
                                  <div class="col-sm-1">
                                       <i class="fa fa-plus"></i>
                                  </div>  
                                  <div class="col-sm-5"> 
                                    <input type="text" name="cel" class="form-control"  placeholder="celular" maxlength="11"  required  id="inputNumero" onkeypress="return valida(event)" />            
                                  </div>
                    </div>
            <br><br>
            <div class="form-group">
                <label for="tel" class="col-sm-2 control-label">Telefono Fijo:</label>
                
                            
                                  <div class="col-sm-2">
                                        <input type="text" name="car" class="form-control"  placeholder="lada" maxlength="3"  required  id="lada2" onkeypress="return valida(event)"/>
                                  </div>    
                                  <div class="col-sm-1">
                                       <i class="fa fa-plus"></i>
                                  </div>   
                                  <div class="col-sm-5"> 
                                    <input type="text" name="tel" class="form-control"  placeholder="telefono" maxlength="8"  required  id="inputNumero2" onkeypress="return valida(event)" />            
                                  </div>
                       
                    </div>            
            </div>
            <br><br>
            <div class="form-group" >	
                 <label for="email" class="col-sm-2 control-label">Correo Electr&oacute;nico:</label>
                 <div class="col-sm-8">
                <input type="text" id="email" name="email"  class="form-control" value=""  required>     
                 </div>
                 <br><br>
                 <div id="Info" style="margin-left: 20%;"></div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-2 control-label">Usuario:</label>
               <div class="col-sm-8"> 
                   <input type="text" name = "user"  id = "user" class= 'form-control' value="" required=""/>
               </div>
            </div>
            <br><br><br>
            
        <!-- Details -->
            <div class="form-group">
                <label for="cargo" class="col-sm-2 control-label">Cargo:</label>
               <div class="col-sm-8"> 
                   <input type="text" name = "cargo"  id = "cargo" class= 'form-control' value="" required=""/>
               </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="dep" class="col-sm-2 control-label">Departamento:</label>
               <div class="col-sm-8"> 
                   <input type="text" name = "dep"  id = "dep" class= 'form-control' value="" required=""/>
               </div>
            </div>
            <br><br>
            <div class="form-group" >
                <label for="calle" class="col-sm-2 control-label">Calle y Numero:</label>
                <div class="col-sm-8">
                <input type="text" name="calle" id="ca" class="form-control"value="" maxlength="50" required >
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="colonia" class="col-sm-2 control-label">Colonia:</label>
                <div class="col-sm-8">
                <input type="text" name="colonia" id="co" class="form-control" value="" maxlength="50" required >  
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="cp" class="col-sm-2 control-label">Codigo Postal:</label>
                <div class="col-sm-8">
                <input type="text" name="cp" class="form-control" maxlength="5" value=""  required  id="inputNumero1" onkeypress="return valida(event)"> 
                </div>
            </div>
            <br><br>
          
            <div class="controls">
              	<meta charset="UTF-8"/>
                <label class="col-sm-2 control-label" for="estado">Estado:</label>
                <div class="col-sm-3">
                    <?php //select que muestra los estados
                            include("conexion_pixki.php");
                            $consulta=mysqli_query($con,"select id,nombre from estados");
                            echo "<select class='form-control' name='estado' id='es' required >";
                            echo "<option>".str_replace("-"," ",$esta)."</option>";
                            while ($fila=mysqli_fetch_array($consulta)){ //str_replace reemplasa los espacios por guiones
                                    echo '<option value="'.str_replace(" ","-",$fila['nombre']).'">'.$fila['nombre'].'</option>';                                                         
                            }                                                                              
                            echo "</select>";
                    ?>    
                </div>
                <label class="col-sm-2 control-label" for="municipio">Municipio:</label>
                <div class="col-sm-3">
                    <select id="mu" class="form-control" name="municipio" required>
                        <option id="mu"><?php echo @$muni;?></option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="ggen" class="col-sm-2">Generar Contraseñas:</label>

                <h3 id="demo"></h3>
                <input class="btn btn-info" type="button"  name="ggen" onclick="myFunction();" value="Generar" >     
            </div>
            <br><br>
          
            <div class="form-group">
                <label for="pass1" class="col-sm-2" >Contraseña:</label>
                <div class="col-sm-8">
                <input type="password" name="pass1" id="pass1" class="form-control" value="" maxlength="20" readonly="" > 
                </div>
            </div>
            <br><br>
          
            <div class="form-group">
                <label for="pass2" class="col-sm-2">Contraseña chekador:</label>
                 <div class="col-sm-8">
                     <input type="password" name="pass2"  id="pass2" class="form-control" value=""  maxlength="20" onfocus = "" readonly="" >   
                 </div>
            </div>
        </div>  
    <br><br>
          
        <input class="btn btn-default" type="button"  name="guardar" onclick="registrame();" value="Guardar" >                         

    </div>
</form>