<?php
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
    var $cargo_usuario=0;
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
            
                eventLimit: true,
                eventClick: function(event){alertify.alert('Descripción', event.descripcion);}, 
                events: 
                <?php echo $jsoncal;?> 
        });
    });


</script>

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
                                 <td class='success' style='text-align: center;'>".$fecha."</td>"; 
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div> 
            <div class = "row" align = "center">
                <!--<a href="#new"  data-toggle='modal' class = "btn btn-primary">Agregar evento</a>-->
            
            </div>            
        </div>
    </div>

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