<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 04/05/16.
 * 
*Descripcion: Seccion para ver los registros del checador por usuario
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
if(!isset($_SESSION)){ session_start();} 
require("../conexion.php");
?>
<link rel="stylesheet" href="css/modalbox.css" type='text/css'/>
<script type="text/javascript">
function mostrarReferencia(){
    var hi = confirm("¿Estas seguro de Eliminar este desarrollador?");
    if (hi== true){
        window.location.replace("menu.php");       
    }else{
        var href = $("#delete").attr('href');
        alert(""+href);
    }
}
</script>
<!--<div style = "">
         <a href= "dompdf/users.php" ><i class="fa fa-file-pdf-o fa-3x"></i>&nbsp;&nbsp;Pasar a PDF</a>
</div>-->
<form action=""  name="customForm" id="customForm" method="POST">
    <div class="form-group">
        <div class="form-group">
            <label for="fecha1" class="col-sm-2 control-label">Inicio del Periodo</label>
            <div class="col-sm-2">
                <input type="text" value="" class="form-control" name="fecha1" id="fecha1">
            </div>

            <label for="fecha2" class="col-sm-2 control-label">final del periodo</label>
            <div class="col-sm-2">
                <input type="text" value="" class="form-control" name="fecha2" id="fecha2">
            </div>
            <input type="submit" value="Buscar" name="buscar" id="buscar" class="btn btn-default">
        </div>
    </div>
</form>
<div style = "width:900px; heigth:500px; margin-top:50px; margin-left:300px;" >
    <div  id="desdeotro" style = "display:none; margin-top:-45px; margin-left:20px;" >
        <input type = "button" style = "margin-top:20px;" onclick="EliminarUser();" class = "btn-style" value = "Eliminar"> 
    </div>
    <div   class = "row" style = "margin-left:-100px;">
        <table class = "table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Turno</th>
                    <th>Fecha</th>
                    <th>Horario Entrada</th>
                    <th>Marco entrada</th>
                    <th>Horario Salida a comer</th>
                    <th>Marco salida a comer</th>
                    <th>Horario Entrada de comer</th>
                    <th>Marco regreso</th>
                    <th>Horario Salida</th>
                    <th>Marco Salida</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $id=$_REQUEST["id"];
                    include("PHPPaging/PHPPaging.lib.CHECK_user.php");
                   
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div style = "margin-left:350px;">
    <?php
    echo "".$text1." ";
    echo "".$text2."";
    echo "<div class = 'pagination_controls' >".$paginationCtrls."</div>";
    ?>
</div>



 <script>
            function confirmar2(esto){
          

alertify.confirm("Eliminar","¿Esta seguro de eliminar este empleado?", function(){
  
$.ajax({
        data:  {id: esto.id},
        type: "POST",
        url: 'herramientas/eliminar_usuario.php',
        success:  function(data) {
        //console.log(data);
        $().toastmessage('showSuccessToast','USUARIO ELIMINADO!');
        setTimeout('location.reload(true)',2000); 
        }
    });


//console.log('entre aqui');

  },
  function(){


//console.log('entre a cancelar');
  });

          }
        </script>   
<script type="text/javascript">
                    $(function () {
                        $('#fecha1').datetimepicker({format: 'YYYY-MM-DD'});
                        $('#fecha2').datetimepicker({format: 'YYYY-MM-DD'});
                    });
                </script>  