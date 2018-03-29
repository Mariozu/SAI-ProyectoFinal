<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 02/05/16.
 * 
*Descripcion: Seccion para perfil del usuario
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/modalbox.css" type='text/css'/>



<script type="text/javascript">



var clic = 1;
function mostrarReferencia(){
//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada

      if(clic == 1){
      //muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
      document.getElementById('desdeotro').style.display='block';

       clic = clic + 1;
      //por el contrario, si no esta seleccionada
      }else{

      //oculta el div con id 'desdeotro'
      document.getElementById('desdeotro').style.display='none';
         clic = 1;
      }

  }



</script>


<script type="text/javascript">
    $(document).ready(function() {  
        $('#email').blur(function(){ /*mediante este evento se sabe si el email  ya se encuentra registrado*/
            
            $('#Info').html('<img src="loading.gif" alt="" />').fadeOut(1000); /* */

            var email = $(this).val();      
            var dataString = 'email='+email;
            var changue = $("#email").val();


            $.ajax({
                type: "POST",
                url: "funciones/check_email.php",
                data: dataString,
                success: function(data) {
                    $('#Info').fadeIn(1).html(data);

                         if(data == "<div id='Error'><h4 style = 'color:red;'>Correo no valido </h4></div>"){
                               $("#email").val("");
                               $("#email").attr("placeholder", changue).placeholder();
                          }

                }
            });
        });              
    });    
</script>



	   <script type="text/javascript">
        var miPopup 
        function ventanaSecundaria(pagina){ 
            miPopup = window.open(pagina,"miwin","width=350,height=133") 
            miPopup.focus() 
        } 
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
    var nombre = $("#nombre").val();
    var paterno =$("#apellidop").val();
    var materno = $("#apellidom").val();
    var emial=$("#email").val();
    var id_trabajador=$("#id").val();
    var telefono = $("#inputNumero2").val();
    console.log(nombre+" "+paterno+" "+materno+" "+ celular+" "+emial+" "+id_trabajador);
    console.log($("#id").val());

    var celular = $("#lada").val() + "-" + $("#inputNumero").val();


var telto = $("#inputNumero2").val().length;
var celtotal = $("#inputNumero").val().length;


if(emial == "" || nombre == "" || paterno == "" || materno == ""){

  $().toastmessage('showErrorToast', "SE REQUIERE NO DEJAR NINGUN CAMPO VACIO!"); 

            }else{


                    $.ajax({
                            type: "POST",
                            url: "funciones/funcion_editar_perfilus.php",
                            data: {
                                    
                                    nombre: nombre,
                                    apellidop:paterno,
                                    apellidom: materno,
                                    email: emial,
                                    cel:celular,
                                    id: id_trabajador,
                                    tel: telefono,
                            }
                    }).done(function(response){
                            switch(response){
                                    case "0": error(); break;
                                    case "1": ok(); break;
                                    case "2": notificacion(); break;
                            }
                    });

        }

}
function cambio(){
         
           var pass1 =  $("#pass1").val();
           var pass2 =  $("#pass2").val();
      

if(pass1 ==  "" || pass2 == ""){

  $().toastmessage('showErrorToast', "SE REQUIERE NO DEJAR NINGUN CAMPO VACIO!"); 

}else{

            $.ajax({
                    type: "POST",
                    url: "funciones/funcion_cambiar_contrasenaus.php",
                    data: {
                           
                  
                    contn: $("#pass1").val(),
                    contn2: $("#pass2").val(),
                    id: $("#id").val(),

                    }
            }).done(function(response){
                    switch(response){
                    case "0": exito(); break;
                    case "1": mal(); break;
                    case "2": equivocado(); break;
                    }
            });
    
   }


}




function ok(){
  $().toastmessage('showSuccessToast', "DATOS ACTUALIZADOS CON EXITO CON EXITO!");
        return false;
}
function error(){

  $().toastmessage('showErrorToast',"ALGUN VALOR NO ESTA PERMITIDO"); 
        return false; 
}
function exito(){
                  $("#passA").val("");
                  $("#pass1").val("");
                  $("#pass2").val("");
                   $().toastmessage('showSuccessToast',"¡LA CONTRASEÑA SE CAMBIO CORRECTAMENTE!");
//                location.href = "menu.php?ZA1SJ8XWR=7"
  return false;  
}
function mal(){
    $("#passA").val("");
                  $("#pass1").val("");
                  $("#pass2").val("");
                  $().toastmessage('showErrorToast', "¡SU CONTRASEÑA ACTUAL ES INCORRECTA!");
                  return false; 
}
function equivocado(){
                  $("#passA").val("");
                  $("#pass1").val("");
                  $("#pass2").val("");
                  $().toastmessage('showErrorToast', "¡LAS CONTRASEÑAS NO CONCUERDAN!");
   return false;
}
    </script> 
<?php 
           $id_user = $_GET["id"];

    include("../conexion.php");
            $consulta = "SELECT  id_emp, nombre, apellido_pat, apellido_mat, num_celular, email, telefono_casa FROM usuarios where id_emp='".$id_user."'";
        $rs = mysqli_query($con,$consulta);
        
        while ($reg = mysqli_fetch_array($rs)) {
            
         
            $id=$reg["id_emp"];
            $nombre=$reg["nombre"];
            $app=$reg["apellido_pat"];
            $apm=$reg["apellido_mat"];     
            $email=$reg["email"];  
            $celular=$reg["num_celular"];
            $telefono = $reg["telefono_casa"];
            
}


			
//-- Lada fhc[0] + Telefono fhc[1]
$cel=$celular;
$fch=explode("-",$cel);
		

?>	
<div class="box">
    <form action=""  name="customForm" id="customForm" method="POST">
        <div >
            <div class="form-group">
                <h2 class="heading">Datos personales del Empleado:</h2>           
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre">Nombre(s):</label>
                    <input type="text" style = "display:none;" name="id" id="id" class="form-control"  value="<?php echo $id_user;?>" maxlength="30" required >
                    <div class="col-sm-8">
                        <input type="text" name="nombre" id="nombre" class="form-control"  value="<?php echo $nombre; ?>" maxlength="30" required >
                    </div>    
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="apellidop">Apellido Paterno:</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellidop" id="apellidop" class="form-control" value="<?php echo $app; ?>" maxlength="20" required >
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="apellidom">Apellido Materno:</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellidom" class="form-control" id="apellidom"  value="<?php echo $apm; ?>" maxlength="20" required >
                    </div>        
                </div>
                <br><br>
                     <div class="form-group" >

                      <label class="col-sm-2 control-label" for="cel">Telefono Celular:</label>
                                  <div class="col-sm-2">
                                        <input type="text" name="car" class="form-control"  value="<?php echo $fch[0]; ?>" maxlength="3"  required  id="lada" onkeypress="return valida(event)"/>
                                     </div>    
                                  <div class="col-sm-1">
                                       <i class="fa fa-plus"></i>
                                  </div>  
                                  <div class="col-xs-5"> 
                                    <input type="text" name="cel" class="form-control"  value="<?php echo $fch[1]; ?>" maxlength="7"  required  id="inputNumero" onkeypress="return valida(event)" />            
                                  </div>
                  </div>
              <br><br>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="cel">Telefono:</label>
                    <div class="col-sm-8">
                        <input type="text" name="tel" class="form-control"  value="<?php echo $telefono; ?>" maxlength="10"  required  id="inputNumero2" onkeypress="return valida(event)">
                    </div>                
                </div>
<br><br>
                <div class="form-group">	
                    <label class="col-sm-2 control-label" for="email">Correo Electr&oacute;nico:</label>
                    <div class="col-sm-8">
                        <input type="text" id="email" name="email"  class="form-control" value="<?php echo $email; ?>"  required>
                    </div> 
                        <div id="Info"></div>
                   
                <div id="Info"></div>
              </div>
<br><br>
                <div class="form-group">    
                   <input style = "margin-left:18%;" type="button"  class="btn btn-default" onclick ="mostrarReferencia();" value = "Cambiar contraseña" />
                </div>
               <br><br>
               <!-- Cambiar Contraseña div deplegable-->
                     <div  id="desdeotro" style = "display:none; margin-left: 17%;">


                             <div class="form-group">
                                <div class="col-sm-8">
                                <input type="password" id = "pass1" class="form-control"  name="contn" placeholder="Nueva contraseña" required value=""/>               
                                </div>
                             </div>
                                   <br><br>
                              <div class="form-group">
                                  <div class="col-sm-8">
                                    <input type="password" id = "pass2" class="form-control"  name="contn2" placeholder="Confirmar nueva contraseña" value=""/>
                                  </div>
                                  <br><br>
                                <input type="text" style = "display:none;"  id="id" class="form-control"  value="<?php echo $id_user;?>" maxlength="30" required >                               
                              </div>
                            
                             <input style = "margin-left:1%;"  type="button" name="btnE"  class="btn btn-default"  onclick="cambio();" value="Cambiar"/>



                     </div>


                <div class="form-group" style = "margin-top:-3.5%;">  
                    <input type="button" id="guardar" name="guardar" onclick="registrame();"  class="btn btn-info btn-lg" value="Guardar" />
                </div>      
            </div>
        </div>
    </form>
   


   <div id="pss" class="modal fade" role="dialog">
  <div class="modal-dialog">


            <div class="modal-content">


  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cambiar contraseña</h4>
      </div>


         <div class="modal-body">

<form action = "funciones/funcion_cambiar_contrasenaus.php"  name="customForm" id="customForm" method="POST">
                      
           
<div class="form-group">
                    
                   
                </div>

         <div class="form-group">
                    <input type="password" class="form-control"  name="contn" placeholder="Nueva contraseña" required value=""  autofocus/>                
          </div>
               
          <div class="form-group">
                    <input type="password"  class="form-control"  name="contn2" placeholder="Confirmar nueva contraseña" value=""/>                               
            </div>




        <div class="modal-footer">                   
            <tr>
                <td width="100%" border="1" align="right" style="text-align: right;">
                
                                   <input type="submit" id="guardar" name="guardar" onclick="cambio();"  class="btn btn-success" value="Guardar">
                                   <input type="button" class="btn btn-default" data-dismiss="modal" name="btnC" onclick="location.href='#close'"value="Cancelar"/>
                </td>
            </tr>
        
        <div>



    </form>                     


         </div>
            </div>

    </div>
    </div> 
</div>
 