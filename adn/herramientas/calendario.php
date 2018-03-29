<?php
if(!isset($_SESSION)){ session_start(); } 
$fecha = date("Y-n-j");
require("../conexion.php");
$sqll = "SELECT DISTINCT * FROM eventos";
$result1 = mysqli_query($con, $sqll);
if(mysqli_num_rows($result1) != 0){
    while($row = mysqli_fetch_assoc($result1)){
        $id=$row["id_usuario"];
        $eventos[] = $row;
        $emparra = $eventos;
    }
}else{
    $emparra="";
}
$json_emparra = json_encode($emparra);
$jsoncal = str_replace('"', '\'', $json_emparra); 
mysqli_free_result($result1);
mysqli_close($con);
?>


<script>
    var d = new Date();
    var $cargo_usuario="<?php echo $_SESSION['id_emp'];?>";
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;
    var fecha = "<?php echo $fecha;?>";
    $(document).ready(function() {
        hide();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: output+"",
            editable: true,
            eventDrop: function(event,delta,revertFunc) 
            { if(event.id_usuario == $cargo_usuario){alertify.confirm('Calendario' ,"SU EVENTO "+event.title+" SE MOVERA PARA EL DIA "+event.start.format("DD-MM-YYYY"), 
                function() {$.ajax({
                    url:"UPDATE_cita.php",
                    type:"POST",
                    data:{
                        fecha :event.start.format("YYYY-MM-DD"),
                        evento:event.title,
                    }
                }).done(function(data){
                    console.log(data);
                    if(data=="1")
                    {
                    $().toastmessage('showSuccessToast',  " EL EVENTO "+event.title + " FUE CAMBIADO PARA EL DIA " +event.start.format("DD-MM-YYYY"));
            
                        setTimeout('location.reload(true)',2000); 
                    }else{
                          
                          $().toastmessage('showErrorToast', "NO TIENES EL CARGO PARA MOVER ESTE EVENTO");
                  
                               setTimeout('location.reload(true)',2000); 
                        }
                }) }, revertFunc );}  else {
               
                  $().toastmessage('showErrorToast', "NO TIENES EL CARGO PARA MOVER ESTE EVENTO");} },
                eventLimit: true,
                eventClick: function(event){alertify.alert('Descripción', event.descripcion);}, 
                events: 
                <?php echo $jsoncal;?> 
        });
    });


</script>
<script src="js/funcionesss_calendario.js" ></script>
<script type="text/javascript">
    function descripcion(){
        var x = document.getElementById("descripcion").htmlFor;
        alertify.alert(x+"");
       
    }


</script>
<style>
    #principalCal{
     /*margin-left:375px;*/ 
    }
    #calendar {
    /*margin-top:-250px ;*/
            /*height:600px; width:750px;*/
            /*margin: 0 150px;*/
    }
</style>


    <div class="row">
        <div class="col-sm-9 col-md-6 col-lg-8">
            <div class = "principalCal">
                <div id='calendar' class = "calendar" style="width: 100%; background-color: #F7F7F7">
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-6 col-lg-4">
            <div class="table-responsive"> 
                <div class = "addwork">
                    <table class = "table table-condensed">
                        <tr class='active'>
                            <th class='active'>Nota</th>
                            <th class='active' style="text-align: center;">Fecha</th>
                            <th class='active' style="text-align: center;">Editar</th>
                            <th class='active' style="text-align: center;">Eliminar</th>
                        </tr>
                        <?php 

                        require('../conexion.php');
                        $consulta="SELECT * FROM eventos";
                        $resultado=mysqli_query($con,$consulta);
                        while($lista=mysqli_fetch_array($resultado)){

                                $fecha=$lista['start'];
                                $fch=explode("-",$fecha);
                                $timel = $fch[2];
                                $time=explode("T",$timel);
                                $fecha=$time[1]." ".$time[0]."-".$fch[1]."-".$fch[0];
                                echo "<tr class='success'>"; 
                                 echo "<td class='success'><a href = '#' id = \"descripcion\" onclick = \"alertify.alert('Descripción' ,'".$lista['descripcion']."');\">".$lista['title']."</a></td>
                                 <td class='success' style='text-align: center;'>".$fecha."</td>
                                 <td class='success' style ='text-align: center;'><a href='#editar' id='".$lista['title']."^".$lista['start']."^".$lista['descripcion']."' data-toggle='modal' onclick='editar(this)'><i class=\"fa fa-pencil fa-2x\"></i></a></td>
                                 <td class='success' style='text-align: center;'><a href='#' name='eliminar' id='".$lista['id']."' onclick='confirmar2(this)'><i class=\"fa fa-trash-o fa-2x\" id=\"Conocido_0\" ></i></a></td>"; 
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div> 
            <div class = "row" align = "center">
                <a href="#new"  data-toggle='modal' class = "btn btn-primary">Agregar evento</a>
            
            </div>            
        </div>
    </div>

<!--</div>-->

<!-- END -->
<!-- MODAL -->
<!-- Actualizar Tarea -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar evento</h4>
            </div>
            <div class="modal-body">
                <!-- Modal Body -->
                <!-- Add datos -->
                <div class="form-horizontal">
                    
                   
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Nota:</label>
                        <div class="col-lg-10">
                            <input type='text' id = "evento" class="form-control"  name="evento" placeholder="Nombre del evento" required/>
                            <br>
                        </div>
                    </div>
                       <div class="form-group">
                        <label  class="col-lg-2 control-label">Fecha: </label>
                        <div class="col-lg-10">
                            <input class = "form-control" type = "text" id = "fecha" value = "<?php echo date("j-m-Y");?>" /><br>
                        </div>
                    </div>
                   <div class="form-group">
                        <label  class="col-lg-2 control-label">Hora: </label>
                        <div class="col-lg-10">
                            <input class = "form-control" type = "text" id = "hora" value = "12:00:00" /><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Descripción: </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="des" name = "descripcion"></textarea><br>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="modal-footer">
                <input type = "button" id = "priv" value = "Agregar" class="btn btn-primary" onclick = "Eventpriv()" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
            </div>                
            <!-- Modal Body -->
        </div>
    </div>
</div>
<!-- END -->




<!-- Modal -->
  <div class="modal fade" id="editar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Evento</h4>
        </div>
        <div class="modal-body">

                  <div class="form-group">
                        <label  class="col-lg-2 control-label">Nota:</label>
                        <div class="col-lg-10">
                            <input type='text' id = "nota" class="form-control"  name="evento" placeholder="Nombre del evento" readonly/>                           
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Fecha: </label>
                         <div class="col-lg-10">
                            <input class = "form-control" type = "text" id = "fecha2" value = "<?php echo date("j-m-Y");?>" /><br>
                        </div>
                    </div>
                   <div class="form-group">
                        <label  class="col-lg-2 control-label">Hora: </label>
                        <div class="col-lg-10">
                            <input class = "form-control" type = "text" id = "hora2" value = "12:00:00" /><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Descripción: </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="des2" name = "descripcion"></textarea><br>
                        </div>
                    </div>

        </div>
        <div class="modal-footer">
         <input type = "button" id = "hh" value = "Editar Evento" class="btn btn-primary" onclick = "editarAJAX()"/>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>


<link rel="stylesheet" href="../css/bootstrap-multiselect.css" />
<script src="../js/bootstrap-multiselect.js"></script>

  <script type="text/javascript">
         $(function () {
                $('#hora').datetimepicker({
                    format: 'HH:mm:ss'
                });
                $('#hora2').datetimepicker({
                    format: 'HH:mm:ss'
                });
                 $('#fecha').datetimepicker({format: 'DD-MM-YYYY'});
                  $('#fecha2').datetimepicker({format: 'DD-MM-YYYY'});
            });
           

    </script>